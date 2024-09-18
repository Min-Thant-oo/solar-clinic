<?php

namespace App\Livewire;

use App\Models\Specialities;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditSpecialityForm extends Component
{
  
    #[Layout('layouts.app')]

    public $speciality;

    // for edit page
    // #[Validate('required|min:3|unique:specialities,speciality_name,' . '{speciality_id}')]
    // or
    #[Validate('required|min:3|unique:specialities,speciality_name,' . 'speciality_id')]  
    public $name;

    public function mount($id) {
        $this->speciality = Specialities::find($id);

        // for edit page
        $this->name = $this->speciality->speciality_name;
    }

    public function update() {
        // $this->validate(['name']);
        Specialities::findOrFail($this->speciality->id)->update([
            'speciality_name' => $this->name
        ]);
        session()->flash('message', 'Speciality updated successfully!');
        return $this->redirectRoute('admin-specialities', navigate: true);
    }

    public function render()
    {
        return view('livewire.edit-speciality-form');
    }
}
