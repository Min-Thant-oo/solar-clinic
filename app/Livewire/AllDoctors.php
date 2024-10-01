<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AllDoctors extends Component
{
    #[Layout('layouts.normal')]
    public function render()
    {
        return view('livewire.all-doctors', [
            'all_doctors' => Doctor::with('speciality', 'doctorUser')->get(),
        ]);
    }
}
