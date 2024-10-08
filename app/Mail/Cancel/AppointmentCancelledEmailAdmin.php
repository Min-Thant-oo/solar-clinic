<?php

namespace App\Mail\Cancel;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentCancelledEmailAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $adminEmailData;

    /**
     * Create a new message instance.
     */
    public function __construct($adminEmailData)
    {
        $this->adminEmailData = $adminEmailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appointment Cancelled',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.cancel.appointment_cancelled_email_admin',
            with: [
                'adminEmailData' => $this->adminEmailData,
            ]
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
