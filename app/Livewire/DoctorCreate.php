<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\Specialities;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DoctorCreate extends Component
{
    #[Layout('layouts.app')]
    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $hospital_name = '';
    #[Validate('required|email|unique:users,email')]
    public $email = '';
    #[Validate('required')]
    public $bio = '';
    #[Validate('required', message: 'Please select speciality!')]
    #[Validate('exists:specialities,id', message: 'Please select from the available specialites.')]
    public $speciality_id = '';
    #[Validate('required|min:3')]
    public $password = '';
    #[Validate('string')]
    public $twitter = '';
    #[Validate('string')]
    public $instagram = '';
    #[Validate('required')]
    public $experience = '';

    public $specialities = '';



    public function mount() {
        $this->specialities = Specialities::all();
    }

    public function register() {
         // register so yin validate use pho lo tae. edit/update so yin validate use pho ma lo bu
        $this->validate();

        // save in users table
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => 1,
            'password' => Hash::make($this->password),

        ]);

        // save in doctor table
        Doctor::create([
            'user_id'       => $user->id,
            'hospital_name' => $this->hospital_name,
            'speciality_id' => $this->speciality_id,
            'bio'           => $this->bio,
            'experience'    => $this->experience,
            'twitter'       => $this->twitter,
            'instagram'    => $this->instagram, 
        ]);
        
        session()->flash('message', 'Doctor added successfully!');
        return $this->redirectRoute('admin-doctors', navigate:true);
    }

    public function render()
    {
        return view('livewire.doctor-create');
    }
}
