<?php

namespace App\Livewire;

use App\Models\DoctorSchedule;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SchedulesEditForm extends Component
{
    #[Layout('layouts.app')]

    public $schedules;
    public $from;
    public $to;
    
    public $daysOfWeek = [
        '0' => 'Monday',
        '1' => 'Tuesday',
        '2' => 'Wednesday',
        '3' => 'Thursday',
        '4' => 'Friday',
        '5' => 'Saturday',
        '6' => 'Sunday',
    ];

    public function mount($id) {
        $this->schedules = DoctorSchedule::find($id);

        // for edit
        $this->from = $this->schedules->from;
        $this->to = $this->schedules->to;
    }

    public function render()
    {
        return view('livewire.schedules-edit-form');
    }
}
