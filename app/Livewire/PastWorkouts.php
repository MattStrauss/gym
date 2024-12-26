<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class PastWorkouts extends Component
{
    public Collection $workouts;

    public function render(): View
    {
        $this->getWorkouts();

        return view('livewire.past-workouts');
    }

    private function getWorkouts(): void
    {
        $workouts = DB::table('workouts')
            ->select('name', 'completed_at', 'started_at', 'workouts.id', 'exercise_workout.reps',
                'exercise_workout.sets', 'exercise_workout.weight')
            ->where('user_id', auth()->id())
            ->whereNotNull('completed_at')
            ->orderBy('completed_at', 'desc')
            ->join('exercise_workout', 'workouts.id', '=', 'exercise_workout.workout_id')
            ->get()->groupBy('workouts.id')->map(function ($workout) {
                return [
                    'name' => $workout->first()->name,
                    // the duration is the workout cre
                    'duration' => $workout->first()->duration,
                    'completed_at' => $workout->first()->completed_at,
                    'created_at' => $workout->first()->created_at,
                    'exercises' => $workout->map(function ($exercise) {
                        return [
                            'reps' => $exercise->reps,
                            'sets' => $exercise->sets,
                            'weight' => $exercise->weight,
                        ];
                    }),
                ];
            });
    }
}
