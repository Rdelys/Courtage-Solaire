<?php

namespace App\Http\Controllers;

use App\Mail\QuoteRequestMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    /**
     * Affiche la page d'accueil du site vitrine.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Traite le formulaire de demande de devis et envoie
     * un e-mail vers les deux adresses configurées dans .env
     * (QUOTE_MAIL_TO_1 et QUOTE_MAIL_TO_2).
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nom'         => ['required', 'string', 'max:100'],
            'email'       => ['required', 'email', 'max:150'],
            'telephone'   => ['required', 'string', 'max:20'],
            'type'        => ['required', 'in:Particulier,Professionnel'],
            'code_postal' => ['nullable', 'string', 'max:10'],
            'message'     => ['nullable', 'string', 'max:2000'],
        ], [
            'nom.required'       => 'Merci d\'indiquer votre nom.',
            'email.required'     => 'Merci d\'indiquer votre e-mail.',
            'email.email'        => 'L\'adresse e-mail n\'est pas valide.',
            'telephone.required' => 'Merci d\'indiquer votre numéro de téléphone.',
            'type.required'      => 'Merci de préciser votre profil.',
        ]);

        // Destinataires : deux adresses définies dans le fichier .env
        // (config('quote.mail_to') est alimenté par config/quote.php, ce qui
        // fonctionne correctement même après un `php artisan config:cache`,
        // contrairement à env() appelé directement dans le code).
        $recipients = array_filter([
            config('quote.mail_to_1'),
            config('quote.mail_to_2'),
        ]);

        if (empty($recipients)) {
            $recipients = [config('mail.from.address')];
        }

        try {
            Mail::to($recipients)->send(new QuoteRequestMail($data));
        } catch (\Throwable $e) {
            Log::error('Échec envoi email demande de devis : ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre demande. Merci de réessayer ou de nous contacter par téléphone.');
        }

        return back()->with('success', 'Votre demande a bien été envoyée ! Un conseiller vous recontactera très rapidement.');
    }
}
