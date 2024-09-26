<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;


class AppointmentCreatedEmailPatient extends Mailable
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
            from: new Address('no-reply@solarclinic.com', 'Solar Clinic'),
            subject: 'Your Appointment at Solar Clinic',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.appointment_created_email_patient',
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
