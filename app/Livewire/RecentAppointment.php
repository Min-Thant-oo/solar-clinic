<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Component;
use App\Models\Appointment;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class RecentAppointment extends Component
{
    #[Layout('layouts.app')]

    // public $recent_appointments;

    // public function mount() {
    //     $this->recent_appointments = Appointment::with('doctor','patient')->orderBy('created_at', 'DESC')->limit(5)->get();
    // }
    
    public function render()
    {
        $user = Auth::user();
    
        $query = Appointment::with('patient', 'doctor')
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
        
        return view('livewire.recent-appointment', [
            'recent_appointments' => $query->limit(5)->get()
        ]);
    }
}
