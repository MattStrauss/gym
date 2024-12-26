<?php

namespace App\Livewire;

use Carbon\Carbon;
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
                'exercise_workout.weight')
            ->where('user_id', auth()->id())
            ->whereNotNull('completed_at')
            ->orderBy('completed_at', 'desc')
            ->join('exercise_workout', 'workouts.id', '=', 'exercise_workout.workout_id')
            ->get()->groupBy('id')->map(function ($workout) {
                $duration = 'in progress';
                if ($workout->first()->completed_at) {
                    $duration = Carbon::parse($workout->first()->completed_at)
                        ->diffForHumans(Carbon::parse($workout->first()->started_at), true);
                }

                $workoutArray = [
                    'id' => $workout->first()->id,
                    'name' => $workout->first()->name,
                    'duration' => $duration,
                    'completed_at' => Carbon::parse($workout->first()->completed_at),
                    'reps' => $workout->sum('reps'),
                    'total_weight' => $workout->sum('weight'),
                ];

                return (object) $workoutArray;
            });

        $this->workouts = $workouts->sortBy('completed_at');
    }
}
