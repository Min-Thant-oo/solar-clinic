<?php

namespace App\Livewire;

use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SchedulesComponent extends Component
{

    #[Layout('layouts.app')]

    public $schedules;
    public $daysOfWeek;

    // public function mount() {
    //     $user_id = auth()->id();
    //     $this->schedules = DoctorSchedule::with('doctor')
    //         ->whereHas('doctor', function ($query) use ($user_id) {
    //             $query->where('doctors.user_id', $user_id);
    //         })->get();

    //         dd($this->schedules);
    // }

    public function mount() {
        $this->schedules = DoctorSchedule::whereHas('doctor', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('doctor')->get();
        // dd($this->schedules);

        $this->daysOfWeek = [
            '0' => 'Monday',
            '1' => 'Tuesday',
            '2' => 'Wednesday',
            '3' => 'Thursday',
            '4' => 'Friday',
            '5' => 'Saturday',
            '6' => 'Sunday',
        ];
    }

    public function delete($id) {
        try {
            DoctorSchedule::findOrFail($id)->delete();
            session()->flash('message', 'This schedule has been deleted successfully!');
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to delete schedule!');
        //     return;
        }
    }

    
    public function render()
    {
        return view('livewire.schedules-component');
    }
}
