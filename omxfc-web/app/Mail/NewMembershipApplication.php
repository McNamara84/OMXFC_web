<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // Diesen Import hinzufügen!
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewMembershipApplication extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $userData;

    /**
     * Create a new message instance.
     */
    public function __construct(array $userData)
    {
        $this->userData = $userData; // Initialisiere die Klassenvariable
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Neue Mitgliedschaftsanfrage',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.new_membership_application',
            with: [
                'userData' => $this->userData,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}