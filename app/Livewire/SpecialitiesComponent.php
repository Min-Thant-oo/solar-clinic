<?php

namespace App\Livewire;

use App\Models\Specialities;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SpecialitiesComponent extends Component
{

    #[Layout('layouts.app')]

    public function delete($id) {
        try {
            Specialities::findOrFail($id)->delete();
            session()->flash('message', 'Speciality deleted successfully!');
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to delete speciality!');
        //     return;
        }
    }

    public function render()
    {
        return view('livewire.specialities-component', [
            'specialities' => Specialities::all(),
        ]);
    }
}
