<?php

namespace App\Http\Controllers;

use App\Mail\QuoteRequestMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            'nom'          => ['required', 'string', 'max:100'],
            'email'        => ['required', 'email', 'max:150'],
            'telephone'    => ['required', 'string', 'max:20'],
            'type'         => ['required', 'in:Particulier,Professionnel'],
            'code_postal'  => ['nullable', 'string', 'max:10'],
            'message'      => ['nullable', 'string', 'max:2000'],
        ], [
            'nom.required'       => 'Merci d\'indiquer votre nom.',
            'email.required'     => 'Merci d\'indiquer votre e-mail.',
            'email.email'        => 'L\'adresse e-mail n\'est pas valide.',
            'telephone.required' => 'Merci d\'indiquer votre numéro de téléphone.',
            'type.required'      => 'Merci de préciser votre profil.',
        ]);

        // Destinataires : deux adresses définies dans le fichier .env
        $recipients = array_filter([
            env('QUOTE_MAIL_TO_1'),
            env('QUOTE_MAIL_TO_2'),
        ]);

        if (empty($recipients)) {
            // Sécurité : si rien n'est configuré, on évite un plantage silencieux
            $recipients = [config('mail.from.address')];
        }

        Mail::to($recipients)->send(new QuoteRequestMail($data));

        return back()->with('success', 'Votre demande a bien été envoyée ! Un conseiller vous recontactera très rapidement.');
    }
}
