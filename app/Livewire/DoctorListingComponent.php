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

    public function featured($id) {
        $doctor = Doctor::find($id);
    
        $doctor->update([
            'is_featured' => !$doctor->is_featured
        ]);
    }    
    
    public function render()
    {
        return view('livewire.doctor-listing-component');
    }
}
