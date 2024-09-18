<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\Specialities;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DoctorBySpeciality extends Component
{
    #[Layout('layouts.normal')]

    public $doctors;
    public $speciality;

    public function mount($id) {
        $this->doctors = Doctor::with('doctorUser')->where('speciality_id',$id)->get();
        $this->speciality = Specialities::find($id);
    }    
    
    public function render()
    {
        return view('livewire.doctor-by-speciality');
    }
}
