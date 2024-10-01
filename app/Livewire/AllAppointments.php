<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Doctor;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use App\Jobs\SendAppointmentCancelledEmail;

class AllAppointments extends Component
{
    #[Layout('layouts.app')]

    // public $all_appointments;
    public $perPage = 15;
    public $search = '';

    // public function mount() {
        // $this->all_appointments = Appointment::with('doctor','patient')->paginate(10);
    // }

    public function cancel($id) {
        // try {
            $appointment = Appointment::findOrFail($id);

            $patient = User::find( $appointment->patient_id);
            $doctor = Doctor::find($appointment->doctor_id);
            $cancelled_by_details = auth()->user();


            $patientEmailData = [
                'date'                  => $appointment->appointment_date,
                'time'                  => Carbon::parse($appointment->appointment_time)->format('H:i A'),
                'patient_name'          => $patient->name,
                'patient_email'         => $patient->email,
                'doctor_name'           => $doctor->doctorUser->name,
                'doctor_email'          => $doctor->doctorUser->email,
                'doctor_specialization' => $doctor->speciality->speciality_name,
                'cancelled_by'          => $cancelled_by_details->name,
                'role'                  => $cancelled_by_details->role,
            ];

            $doctorEmailData = [
                'date'                  => $appointment->appointment_date,
                'time'                  => Carbon::parse($appointment->appointment_time)->format('H:i A'),
                'patient_name'          => $patient->name,
                'patient_email'         => $patient->email,
                'doctor_name'           => $doctor->doctorUser->name,
                'doctor_email'          => $doctor->doctorUser->email,
                'doctor_specialization' => $doctor->speciality->speciality_name,
                'cancelled_by'          => $cancelled_by_details->name,
                'role'                  => $cancelled_by_details->role,
            ];

            $adminEmailData = [
                'date'                  => $appointment->appointment_date,
                'time'                  => Carbon::parse($appointment->appointment_time)->format('H:i A'),
                'patient_name'          => $patient->name,
                'patient_email'         => $patient->email,
                'doctor_name'           => $doctor->doctorUser->name,
                'doctor_email'          => $doctor->doctorUser->email,
                'doctor_specialization' => $doctor->speciality->speciality_name,
                'admin_name'            => User::where('role', 2)->pluck('name')->first(),
                'admin_email'           => User::where('role', 2)->pluck('email')->first(),
                'cancelled_by'          => $cancelled_by_details->name,
                'role'                  => $cancelled_by_details->role,
            ];

            SendAppointmentCancelledEmail::dispatch($patientEmailData, $doctorEmailData, $adminEmailData);

            $appointment->delete();


            session()->flash('message', 'Appointment deleted!');
        // } catch (\Throwable $th) {
        //     session()->flash('error', 'Failed to delete appointment!');
        // }
    }

    public function render()
    {
        return view('livewire.all-appointments', [
            'all_appointments' => Appointment::with('doctor','patient')->paginate(20)
        ]);
    }
}
