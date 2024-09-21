<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SchedulesCreateForm extends Component
{
    #[Layout('layouts.app')]


    public $daysOfWeek = [
        '0' => 'Sunday',
            '1' => 'Monday',
            '2' => 'Tuesday',
            '3' => 'Wednesday',
            '4' => 'Thursday',
            '5' => 'Friday',
            '6' => 'Saturday',
    ];

    #[Validate('required', message: 'Please select an available day for the schedule.')]
    public $available_day;

    #[Validate('required', message: 'Please specify the start time for the schedule.')]
    public $from;

    #[Validate('required', message: 'Please specify the end time for the schedule.')]
    public $to;


    // public function save() {
    //     $this->validate();
    //     $doctor_details = Doctor::where('user_id', auth()->id())->with('doctorUser')->first();

    //     DoctorSchedule::create([
    //         'doctor_id'         => $doctor_details->id,
    //         'available_day'    => $this->available_day,
    //         'from'             => $this->from,
    //         'to'             => $this->to
    //     ]);

    //     session()->flash('message', 'Schedule created successfully!');
        
    //     return $this->redirect(route('doctor-schedules'), navigate: true);

    // }
    


    public function messages() 
    {
        return [
            'from.unique' => 'The selected appointment time has already taken',
            'to.unique' => 'The selected appointment time has already taken',
        ];
    }

    public function save() {
        $this->validate([
            'available_day' => 'required',
            'from' => [
                'required',
                'date_format:H:i',
                'unique:doctor_schedules,from,NULL,id,doctor_id,' . Doctor::where('user_id', auth()->id())->first()->id . ',available_day,' . $this->available_day,
            ],
            'to' => [
                'required',
                'date_format:H:i',
                'after:from',
                'unique:doctor_schedules,to,NULL,id,doctor_id,' . Doctor::where('user_id', auth()->id())->first()->id . ',available_day,' . $this->available_day,
            ],
        ]);
    
        $doctor_details = Doctor::where('user_id', auth()->id())->with('doctorUser')->first();
    
        // Create the schedule
        DoctorSchedule::create([
            'doctor_id'      => $doctor_details->id,
            'available_day'  => $this->available_day,
            'from'           => $this->from,
            'to'             => $this->to
        ]);
    
        session()->flash('message', 'Schedule created successfully!');
    
        return $this->redirect(route('doctor-schedules'), navigate: true);
    }

    
    public function render()
    {
        return view('livewire.schedules-create-form');
    }
}
