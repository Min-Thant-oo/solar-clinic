<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\withFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;


class ProfileImageUpload extends Component
{
    use withFileUploads;
    
    public $image;

    public function save() {

        $this->validate([
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:1024'], // Add mimes to be more specific
        ]);        
        
        if($this->image) {
            $path = $this->image->store('profiles');

            $user = User::find(auth()->user()->id);

            $user->update([
                'profile_image' => $path,
            ]);

            $this->image = $path; 

            $this->dispatch('profile-updated', name: $user->name);

            $this->image = null;

            return $this->redirect('/profile', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.profile-image-upload');
    }
}
