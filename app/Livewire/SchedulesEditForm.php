<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SchedulesEditForm extends Component
{
    #[Layout('layouts.app')]

    #[Validate('required', message: 'Please select an available day for the schedule.')]
    public $available_day;

    #[Validate('required', message: 'Please specify the start time for the schedule.')]
    public $from;

    #[Validate('required', message: 'Please specify the end time for the schedule.')]
    public $to;

    public $schedules;

    public function messages() 
    {
        return [
            'from.unique' => 'The selected appointment time has already taken',
            'to.unique' => 'The selected appointment time has already taken',
        ];
    }

    
    
    public $daysOfWeek = [
        '0' => 'Monday',
        '1' => 'Tuesday',
        '2' => 'Wednesday',
        '3' => 'Thursday',
        '4' => 'Friday',
        '5' => 'Saturday',
        '6' => 'Sunday',
    ];

    public function update() {

        $this->validate([
            'available_day' => 'required',
            'from' => [
                'required',
                // 'unique:doctor_schedules,from,' . $this->schedule_id . ',id,doctor_id,' . Doctor::where('user_id', auth()->id())->first()->id . ',available_day,' . $this->available_day,
            ],
            'to' => [
                'required',
                // 'after:from',
                // 'unique:doctor_schedules,to,' . $this->schedule_id . ',id,doctor_id,' . Doctor::where('user_id', auth()->id())->first()->id . ',available_day,' . $this->available_day,
            ],
        ]);
        

        DoctorSchedule::findOrFail($this->schedules->id)->update([
            'available_day' => $this->available_day,
            'from'          => $this->from,
            'to'            => $this->to,
        ]);
        session()->flash('message', 'Schedule updated successfully!');
        return $this->redirectRoute('doctor-schedules', navigate: true);
    }

    
    
    public function mount($id) {
        $this->schedules = DoctorSchedule::find($id);

        // for edit
        $this->available_day = $this->schedules->available_day; 
        $this->from = $this->schedules->from;
        $this->to = $this->schedules->to;
    }

    public function render()
    {
        return view('livewire.schedules-edit-form');
    }
}
