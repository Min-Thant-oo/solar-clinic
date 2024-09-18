<?php

namespace App\Livewire;

use App\Models\Specialities;
use Livewire\Component;

class SpecialistCard extends Component
{
    public $specialities;

    public function mount() {
        $this->specialities = Specialities::with('doctors')->get();
    }
    public function render()
    {
        return view('livewire.specialist-card');
    }
}
