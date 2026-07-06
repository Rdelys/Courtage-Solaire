<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AnthropicChatService
{
    protected string $apiKey;
    protected string $model;
    protected string $endpoint = 'https://api.anthropic.com/v1/messages';

    public function __construct()
    {
        $this->apiKey = config('services.anthropic.api_key');
        $this->model  = config('services.anthropic.model', 'claude-sonnet-4-6');
    }

    /**
     * Contexte injecté dans le system prompt : décrit l'entreprise,
     * ses solutions, et la procédure de demande de devis.
     */
    protected function systemPrompt(): string
    {
        return <<<PROMPT
Tu es l'assistant virtuel de "Courtage Solaire", un courtier indépendant en solutions solaires basé à Paris.

À PROPOS :
Courtage Solaire accompagne particuliers et professionnels dans leurs projets d'énergie solaire, grâce à un réseau de partenaires certifiés et une expertise indépendante du marché.

NOS SOLUTIONS :
- Résidentiel : installation de panneaux solaires pour réduire les factures d'énergie.
- Professionnel : optimisation des coûts énergétiques et autonomie pour les entreprises.
- Sites isolés : alimentation autonome, même hors réseau électrique.
- Stockage : solutions de batteries pour consommer l'énergie produite quand on en a besoin.

NOS ENGAGEMENTS :
- Accompagnement personnalisé avec un interlocuteur unique.
- Expertise indépendante et conseils objectifs.
- Économies durables sur les factures d'énergie.
- Engagement écologique.

CONTACT :
- Téléphone standard : 01 23 45 67 89
- Conseiller commercial : 06 12 34 56 78
- E-mail : contact@courtage-solaire.fr
- Adresse : 123 Rue de l'Énergie, 75000 Paris

TON RÔLE :
- Réponds en français, de façon claire, chaleureuse et professionnelle, aux questions sur l'énergie solaire, les solutions proposées et l'entreprise.
- Si un visiteur souhaite un devis ou être rappelé, récupère progressivement au fil de la conversation : nom complet, e-mail, téléphone, profil (Particulier/Professionnel), et éventuellement code postal et description du projet.
- Dès que tu disposes au minimum du nom, de l'e-mail, du téléphone et du profil, utilise l'outil "submit_quote_request" pour transmettre la demande. Une seule fois par demande complète, et uniquement avec des informations réellement fournies par le visiteur — n'invente jamais de données.
- Ne donne jamais de prix précis (cela dépend d'une étude personnalisée) ; propose la mise en relation avec un conseiller.
- Reste concis (quelques phrases par réponse).
PROMPT;
    }

    protected function tools(): array
    {
        return [[
            'name' => 'submit_quote_request',
            'description' => 'Envoie une demande de devis aux conseillers de Courtage Solaire par e-mail, à partir des informations fournies par le visiteur.',
            'input_schema' => [
                'type' => 'object',
                'properties' => [
                    'nom'         => ['type' => 'string', 'description' => 'Nom complet du visiteur'],
                    'email'       => ['type' => 'string', 'description' => 'Adresse e-mail du visiteur'],
                    'telephone'   => ['type' => 'string', 'description' => 'Numéro de téléphone du visiteur'],
                    'type'        => ['type' => 'string', 'enum' => ['Particulier', 'Professionnel']],
                    'code_postal' => ['type' => 'string', 'description' => 'Code postal (optionnel)'],
                    'message'     => ['type' => 'string', 'description' => 'Description du projet (optionnel)'],
                ],
                'required' => ['nom', 'email', 'telephone', 'type'],
            ],
        ]];
    }

    /**
     * Envoie l'historique de conversation à l'API Anthropic et gère
     * l'éventuel appel d'outil (envoi de devis) en boucle jusqu'à
     * obtenir une réponse texte finale.
     *
     * @param array $messages format [['role' => 'user'|'assistant', 'content' => string|array], ...]
     * @param callable $onQuoteRequest appelé avec les données brutes fournies par le modèle
     */
    public function reply(array $messages, callable $onQuoteRequest): string
    {
        $messages = $this->callApi($messages);
        $lastMessage = end($messages);

        while (($lastMessage['role'] ?? null) === 'assistant' && $this->containsToolUse($lastMessage)) {
            $toolResults = [];

            foreach ($lastMessage['content'] as $block) {
                if (($block['type'] ?? null) !== 'tool_use') {
                    continue;
                }

                $result = 'Une erreur est survenue lors de l\'envoi de la demande.';

                if ($block['name'] === 'submit_quote_request') {
                    try {
                        $onQuoteRequest($block['input']);
                        $result = 'Demande envoyée avec succès aux conseillers.';
                    } catch (\Throwable $e) {
                        Log::error('Chatbot : échec envoi devis - ' . $e->getMessage());
                    }
                }

                $toolResults[] = [
                    'type' => 'tool_result',
                    'tool_use_id' => $block['id'],
                    'content' => $result,
                ];
            }

            $messages[] = ['role' => 'user', 'content' => $toolResults];
            $messages = $this->callApi($messages);
            $lastMessage = end($messages);
        }

        return $this->extractText($lastMessage);
    }

    protected function containsToolUse(array $message): bool
    {
        foreach ($message['content'] as $block) {
            if (($block['type'] ?? null) === 'tool_use') {
                return true;
            }
        }
        return false;
    }

    protected function extractText(array $message): string
    {
        $text = '';
        foreach ($message['content'] as $block) {
            if (($block['type'] ?? null) === 'text') {
                $text .= $block['text'];
            }
        }
        return trim($text) ?: 'Désolé, je n\'ai pas pu générer de réponse.';
    }

    protected function callApi(array $messages): array
    {
        $response = Http::withHeaders([
            'x-api-key' => $this->apiKey,
            'anthropic-version' => '2023-06-01',
            'content-type' => 'application/json',
        ])->timeout(30)->post($this->endpoint, [
            'model' => $this->model,
            'max_tokens' => 1024,
            'system' => $this->systemPrompt(),
            'tools' => $this->tools(),
            'messages' => $messages,
        ]);

        if ($response->failed()) {
            Log::error('Anthropic API error: ' . $response->body());
            throw new \RuntimeException('Erreur lors de la communication avec l\'assistant.');
        }

        $messages[] = [
            'role' => 'assistant',
            'content' => $response->json('content'),
        ];

        return $messages;
    }
}