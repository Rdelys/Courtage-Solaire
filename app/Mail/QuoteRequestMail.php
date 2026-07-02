<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Les données du formulaire de demande de devis.
     *
     * @var array
     */
    public array $data;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Nouvelle demande de devis - ' . $this->data['type'])
            ->replyTo($this->data['email'], $this->data['nom'])
            ->view('emails.quote');
    }
}
