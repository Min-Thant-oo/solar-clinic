<?php

namespace App\Mail\Update;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentUpdatedEmailPatient extends Mailable
{
    use Queueable, SerializesModels;

    public $patientEmailData;

    /**
     * Create a new message instance.
     */
    public function __construct($patientEmailData)
    {
        $this->patientEmailData = $patientEmailData;
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
            markdown: 'emails.update.appointment_updated_email_patient',
            with: [
                'patientEmailData' => $this->patientEmailData,
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
