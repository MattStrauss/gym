<?php

namespace App\Livewire;

use App\Models\Workout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class ViewWorkout extends Component
{
    public Workout $workout;
    public Collection $exercises;
    public string $title = '';

    public function mount(Workout $workout): void
    {
        $this->workout = $workout;
        $this->exercises = $this->organizeWorkoutIntoSets();
        $this->title = $workout->name;
    }

    private function organizeWorkoutIntoSets(): Collection
    {
        return $this->workout->exercises->groupBy('name')->map(function ($exercise) {
            $sets = [];
            foreach ($exercise as $set) {
                $sets[] = [
                    'reps' => $set->pivot->reps,
                    'weight' => $set->pivot->weight,
                    'is_drop_set' => $set->pivot->is_drop_set,
                    'super_set_number' => $set->pivot->super_set_number,
                ];
            }

            return $sets;
        });
    }

    public function render(): View
    {
        return view('livewire.view-workout');
    }
}
