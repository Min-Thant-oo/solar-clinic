<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Attributes\Layout;
use Livewire\Component;

class RecentAppointment extends Component
{
    #[Layout('layouts.app')]

    public $recent_appointments;

    public function mount() {
        $this->recent_appointments = Appointment::with('doctor','patient')->orderBy('created_at', 'DESC')->limit(10)->get();
    }
    
    public function render()
    {
        return view('livewire.recent-appointment');
    }
}
