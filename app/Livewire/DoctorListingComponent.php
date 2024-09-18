<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DoctorListingComponent extends Component
{
    #[Layout('layouts.app')]

    public $doctors;

    public function mount() {
        $this->doctors = Doctor::with('speciality', 'doctorUser')->get();
    }
    
    public function render()
    {
        return view('livewire.doctor-listing-component');
    }
}
