<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class ViewPastWorkouts extends Component
{
    public Collection $workouts;

    public function render(): View
    {
        $this->getWorkouts();

        return view('livewire.view-past-workouts');
    }

    private function getWorkouts(): void
    {
        $this->workouts = auth()->user()->workouts()->where('completed', true)->get()->sortByDesc('completed_at');
    }
}
