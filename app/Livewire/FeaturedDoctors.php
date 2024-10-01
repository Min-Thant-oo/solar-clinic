<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Attributes\Layout;
use Livewire\Component;

class FeaturedDoctors extends Component
{
    // #[Layout('layouts.normal')]

    public $featuredDoctors;

    public function mount() {
        $this->featuredDoctors = Doctor::with('speciality', 'doctorUser')->where('is_featured', 1)->get();
    }
    public function render()
    {
        return view('livewire.featured-doctors');
    }
}
