<?php

namespace App\Mail\Update;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentUpdatedEmailDoctor extends Mailable
{
    use Queueable, SerializesModels;

    public $doctorEmailData;

    /**
     * Create a new message instance.
     */
    public function __construct($doctorEmailData)
    {
        $this->doctorEmailData = $doctorEmailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appointment Rescheduled',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.update.appointment_updated_email_doctor',
            with: [
                'doctorEmailData' => $this->doctorEmailData,
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
