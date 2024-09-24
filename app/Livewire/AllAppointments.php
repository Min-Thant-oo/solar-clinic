<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AllAppointments extends Component
{
    #[Layout('layouts.app')]

    public $all_appointments;

    public function mount() {
        $this->all_appointments = Appointment::with('doctor','patient')->get();
    }
    public function render()
    {
        return view('livewire.all-appointments');
    }
}
