<?php

namespace App\Livewire;

use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SchedulesComponent extends Component
{

    #[Layout('layouts.app')]

    // public $schedules = '';
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

        // this won't recall the query again after delete. so i should call query directly under render
        // $this->schedules = DoctorSchedule::whereHas('doctor', function ($query) {
        //     $query->where('user_id', Auth::id());
        // })->with('doctor')->get();

        $this->daysOfWeek = [
            '0' => 'Sunday',
            '1' => 'Monday',
            '2' => 'Tuesday',
            '3' => 'Wednesday',
            '4' => 'Thursday',
            '5' => 'Friday',
            '6' => 'Saturday',
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
        return view('livewire.schedules-component', [
            'schedules' => DoctorSchedule::whereHas('doctor', function ($query) {
                            $query->where('user_id', Auth::id());
                        })->with('doctor')->get(),
        ]
    );
    }
}
