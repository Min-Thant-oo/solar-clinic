<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class StatisticComponent extends Component
{
    #[Layout('layouts.app')]

    public $users_count = 0;
    public $doctors_count = 0;
    public $patients_count = 0;
    public $appointments_count = 0;

    // for the logged in doctor dashboard
    public $doctor_appointments_count = 0;
    public $doctor_upcoming_appointment_count = 0;
    public $doctor_completed_appointment_count = 0;

    public $last_week_appointments_count = 0;
    public $last_month_appointments_count = 0;

    public $last_week_users_count = 0;
    public $last_month_users_count = 0;

    public $last_week_doctors_count = 0;
    public $last_month_doctors_count = 0;

    public $last_week_patients_count = 0;
    public $last_month_patients_count = 0;


    public function mount() {
        $this->users_count = User::count();
        $this->doctors_count = Doctor::count();
        $this->patients_count = User::where('role', 0)->count();
        $this->appointments_count = Appointment::count();

        // For doctor
        if(auth()->user()->role == 1) {
            $doctor = Doctor::where('user_id', auth()->user()->id)->first();
            $this->doctor_appointments_count = Appointment::where('doctor_id', $doctor->id)->count();
        
            // upcoming appointments
            $doctors_appointments = Appointment::where('doctor_id', $doctor->id)->get();

            foreach($doctors_appointments as $appointment) {
                // Combine the date and time into a single Carbon instance
                $appointmentDateTime = Carbon::parse($appointment->appointment_date . ' ' . $appointment->appointment_time, 'America/Chicago');

                // Compare with current date and time in the same timezone
                if ($appointmentDateTime->isAfter(Carbon::now('America/Chicago'))) {
                    $this->doctor_upcoming_appointment_count++;
                } else {
                    $this->doctor_completed_appointment_count++;
                }

                if($appointmentDateTime->isBetween(Carbon::today()->subWeek(), Carbon::today())) {
                    $this->last_week_appointments_count++;
                }

                if($appointmentDateTime->isBetween(Carbon::today()->subMonth(), Carbon::today())) {
                    $this->last_month_appointments_count++;
                }
            }
        }
        
        // all users
        $all_users = User::get();
        foreach($all_users as $user) {
            if(Carbon::parse($user->created_at)->isBetween(Carbon::today()->subWeek(), Carbon::today())) {
                $this->last_week_users_count++;
            }

            if(Carbon::parse($user->created_at)->isBetween(Carbon::today()->subMonth(), Carbon::today())) {
                $this->last_month_users_count++;
            }
        }
        
        // all doctors
        $all_doctors = Doctor::get();
        foreach($all_doctors as $doctor) {
            if(Carbon::parse($doctor->created_at)->isBetween(Carbon::today()->subWeek(), Carbon::today())) {
                $this->last_week_doctors_count++;
            }

            if(Carbon::parse($doctor->created_at)->isBetween(Carbon::today()->subMonth(), Carbon::today())) {
                $this->last_month_doctors_count++;
            }
        }
        
        // all patients
        $all_patients = User::where('role', 0)->get();
        foreach($all_patients as $patient) {
            if(Carbon::parse($patient->created_at)->isBetween(Carbon::today()->subWeek(), Carbon::today())) {
                $this->last_week_patients_count++;
            }

            if(Carbon::parse($patient->created_at)->isBetween(Carbon::today()->subMonth(), Carbon::today())) {
                $this->last_month_patients_count++;
            }
        }
        
        // all patients
        $all_patients = User::where('role', 0)->get();
        foreach($all_patients as $patient) {
            if(Carbon::parse($patient->created_at)->isBetween(Carbon::today()->subWeek(), Carbon::today())) {
                $this->last_week_patients_count++;
            }

            if(Carbon::parse($patient->created_at)->isBetween(Carbon::today()->subMonth(), Carbon::today())) {
                $this->last_month_patients_count++;
            }
        }

        // all appointments
        $all_appointments = Appointment::get();
        foreach($all_appointments as $appointment) {
            if(Carbon::parse($appointment->created_at)->isBetween(Carbon::today()->subWeek(), Carbon::today())) {
                $this->last_week_appointments_count++;
            }

            if(Carbon::parse($appointment->created_at)->isBetween(Carbon::today()->subMonth(), Carbon::today())) {
                $this->last_month_appointments_count++;
            }
        }



    }
    public function render()
    {
        return view('livewire.statistic-component');
    }
}
