<?php

namespace App\Livewire;

use App\Models\Workout;
use Illuminate\View\View;
use Livewire\Component;

class ViewWorkout extends Component
{
    public Workout $workout;
    public string $title = '';

    public function mount(Workout $workout): void
    {
        $this->workout = $workout;
        $this->title = $workout->name;
    }

    public function render(): View
    {
        return view('livewire.view-workout');
    }
}
