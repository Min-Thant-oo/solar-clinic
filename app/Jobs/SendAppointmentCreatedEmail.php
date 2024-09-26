<?php

namespace App\Jobs;

use App\Mail\AppointmentCreatedEmail;
use App\Mail\AppointmentCreatedEmailAdmin;
use App\Mail\AppointmentCreatedEmailDoctor;
use App\Mail\AppointmentCreatedEmailPatient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAppointmentCreatedEmail implements ShouldQueue
{
    use Queueable;

    // public $appointmentData;
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
    public function handle(): void{
        $patient_email = $this->patientEmailData['patient_email'];
        $doctor_email = $this->doctorEmailData['doctor_email'];
        $admin_email = $this->adminEmailData['admin_email'];


        // Send the patient email
        Mail::to($patient_email)->queue(new AppointmentCreatedEmailPatient($this->patientEmailData));
        
        // Send the doctor email
        Mail::to($doctor_email)->queue(new AppointmentCreatedEmailDoctor($this->doctorEmailData));

        // Send the admin email
        Mail::to($admin_email)->queue(new AppointmentCreatedEmailAdmin($this->adminEmailData));
}

}
