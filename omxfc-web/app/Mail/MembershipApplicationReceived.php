<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // Diesen Import hinzufügen!
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MembershipApplicationReceived extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name;

    /**
     * Create a new message instance.
     */
    public function __construct(string $name)
    {
        $this->name = $name; // Initialisiere die Klassenvariable
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Deine Mitgliedschaftsanfrage ist eingegangen',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.membership_application_received',
            with: [
                'name' => $this->name,
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