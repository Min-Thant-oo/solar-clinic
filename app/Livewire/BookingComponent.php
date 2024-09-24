<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class BookingComponent extends Component
{
    #[Title('Appointment Booking')]
    #[Layout('layouts.app')]
    public $doctor_details;
    public $selectedDate;
    public $availableDates = [];
    public $timeSlots = [];

    public function mount($id) {
        $this->doctor_details = Doctor::with('speciality', 'doctorUser')->where('id', $id)->first();
        $this->fetchAvailableDates($this->doctor_details);
    }

    public function bookAppointment($slot) {
        Appointment::create([
            'patient_id'        => auth()->user()->id,
            'doctor_id'         => $this->doctor_details->id,
            // since selectedDate formate is Wed 24 June 19 2024 and appointment date format is June 19 2024
            'appointment_date'  => Carbon::parse($this->selectedDate)->format('Y-m-d'),
            'appointment_time'  => $slot,
        ]);

        session()->flash('message', 'Your appointment with Dr. '.$this->doctor_details->doctorUser->name.' on '.$this->selectedDate. $slot.' has been confirmed successfully!');
        return $this->redirectRoute('patient.appointments.index', navigate:true);
    }

    public function fetchAvailableDates($doctor) {
        $schedules = DoctorSchedule::where('doctor_id', $doctor->id)->get();
        $availability = [];
        foreach($schedules as $schedule) {
            $dayofWeek = $schedule->available_day; // 0-Sunday  1-Monday  6-Friday
            $fromTime = Carbon::createFromFormat('H:i:s', $schedule->from);
            $toTime = Carbon::createFromFormat('H:i:s', $schedule->to);
            $availability[$dayofWeek] = [
                'from' => $fromTime,
                'to'   => $toTime,
            ];
        }

        $dates = [];
        $today = Carbon::today();
        for ($i = 0; $i < 365; $i++) {
            $date = $today->copy()->addDays($i);
            $dayofWeek = $date->dayOfWeek;

            if(isset($availability[$dayofWeek])) {
                $dates[] = $date->format('Y-m-d');
            }
        }
        $this->availableDates = $dates;
    }

    public function selectDate($date) {
        $this->selectedDate = $date;
        $this->fetchTimeSlots($date, $this->doctor_details);
    }

    public function fetchTimeSlots($date, $doctor) {
        $dayofWeek = Carbon::parse($date)->dayOfWeek;
        $carbonDate = Carbon::parse($date)->format('Y-m-d');
        $schedule = DoctorSchedule::where('doctor_id', $doctor->id)
            ->where('available_day', $dayofWeek)
            ->first();

        if($schedule) {
            $fromTime = Carbon::createFromFormat('H:i:s', $schedule->from);
            $toTime = Carbon::createFromFormat('H:i:s', $schedule->to);
        
        $slots = [];
        while($fromTime->lessThan($toTime)) {
            $timeSlot = $fromTime->format('H:i:s');
            $appointmentExists = Appointment::where('doctor_id', $doctor->id)
                ->where('appointment_date', $carbonDate)
                ->where('appointment_time', $timeSlot)
                ->exists();
            if (!$appointmentExists) {
                $slots[] = $timeSlot;
            }

            $fromTime -> addHour(); 
        }

        $this->timeSlots = $slots;

        } else {
            $this->timeSlots = [];
        }
    }
    
    public function render()
    {
        return view('livewire.booking-component', [
            'availableDates' => $this->availableDates,
        ]);
    }
}
