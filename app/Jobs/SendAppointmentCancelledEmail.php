<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\Cancel\AppointmentCancelledEmailAdmin;
use App\Mail\Cancel\AppointmentCancelledEmailDoctor;
use App\Mail\Cancel\AppointmentCancelledEmailPatient;

class SendAppointmentCancelledEmail implements ShouldQueue
{
    use Queueable;

    public $patientEmailData;
    public $doctorEmailData;
    public $adminEmailData;

    /**
     * Create a new job instance.
     */
    public function __construct( $patientEmailData, $doctorEmailData, $adminEmailData )
    {
        // $this->appointmentData = $appointmentData;
        $this->patientEmailData = $patientEmailData;
        $this->doctorEmailData = $doctorEmailData;
        $this->adminEmailData = $adminEmailData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $patient_email = $this->patientEmailData['patient_email'];
        $doctor_email = $this->doctorEmailData['doctor_email'];
        $admin_email = $this->adminEmailData['admin_email'];

        // Send the patient email
        Mail::to($patient_email)->queue(new AppointmentCancelledEmailPatient($this->patientEmailData));
        
        // Send the doctor email
        Mail::to($doctor_email)->queue(new AppointmentCancelledEmailDoctor($this->doctorEmailData));

        // Send the admin email
        Mail::to($admin_email)->queue(new AppointmentCancelledEmailAdmin($this->adminEmailData));

    }
}
