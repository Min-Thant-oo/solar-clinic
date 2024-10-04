<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Doctor;
use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Url;
use Livewire\WithPagination; 
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendAppointmentCancelledEmail;

class AllAppointments extends Component
{

    use WithPagination;

    #[Layout('layouts.app')]
    
    #[Url()]
    public $perPage = 10;

    #[Url()]
    public $search = '';

    public function updatingSearch() {
        $this->resetPage();
    }

    public function cancel($id) {
        try {
            $appointment = Appointment::findOrFail($id);

            $patient = User::find( $appointment->patient_id);
            $doctor = Doctor::find($appointment->doctor_id);
            $cancelled_by_details = Auth::user();


            $patientEmailData = [
                'date'                  => Carbon::parse($appointment->appointment_date)->format('d M Y D'),
                'time'                  => Carbon::parse($appointment->appointment_time)->format('g:i A'),
                'patient_name'          => $patient->name,
                'patient_email'         => $patient->email,
                'doctor_name'           => $doctor->doctorUser->name,
                'doctor_email'          => $doctor->doctorUser->email,
                'doctor_specialization' => $doctor->speciality->speciality_name,
                'cancelled_by'          => $cancelled_by_details->name,
                'role'                  => $cancelled_by_details->role,
            ];

            $doctorEmailData = [
                'date'                  => Carbon::parse($appointment->appointment_date)->format('d M Y D'),
                'time'                  => Carbon::parse($appointment->appointment_time)->format('g:i A'),
                'patient_name'          => $patient->name,
                'patient_email'         => $patient->email,
                'doctor_name'           => $doctor->doctorUser->name,
                'doctor_email'          => $doctor->doctorUser->email,
                'doctor_specialization' => $doctor->speciality->speciality_name,
                'cancelled_by'          => $cancelled_by_details->name,
                'role'                  => $cancelled_by_details->role,
            ];

            $adminEmailData = [
                'date'                  => Carbon::parse($appointment->appointment_date)->format('d M Y D'),
                'time'                  => Carbon::parse($appointment->appointment_time)->format('g:i A'),
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
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to delete appointment!');
        }
    }

    public function render()
    {
        $user = Auth::user();
    
        $query = Appointment::search($this->search)
            ->with('patient', 'doctor')
            ->latest(); 
    
        if ($user) {
            if ($user->role == 1) {
                // Role 1: Doctor
                $doctor = Doctor::where('user_id', $user->id)->first();
                $query->where('doctor_id', $doctor->id);
            } elseif ($user->role == 0) {
                // Role 0: Patient
                $query->where('patient_id', $user->id);
            }
        }
    
        return view('livewire.all-appointments', [
            'all_appointments' => $query->paginate($this->perPage)
        ]);
    }
    
}
