<?php

namespace App\Livewire;

use App\Models\Specialities;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SpecialityForm extends Component
{
    
    #[Layout('layouts.app')]
    
    #[Validate('required|min:3|unique:specialities,speciality_name')]
    public $name = '';

    protected $messages = [
        'name.unique' => 'This speciality already existed!',
    ];

    public function save() {
        // register so yin validate use pho lo tae. edit/update so yin validate use pho ma lo bu
        $this->validate();

        Specialities::create([
            'speciality_name' => $this->name,
        ]);

        session()->flash('message', 'New speciality successfully created!');
        return $this->redirect('/admin/specialities', navigate: true);
    }





    public function render()
    {
        return view('livewire.speciality-form');
    }
}
