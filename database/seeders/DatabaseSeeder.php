<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Exercise;
use App\Models\MuscleGroup;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Workout;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Matt Tester',
            'email' => 'matt@example.net',
            'password' => bcrypt('password'),
        ]);

        $this->createEquipment();
        $this->createMuscleGroups();
        $this->createExercises();

        foreach (range(1, 10) as $index) {
            Workout::factory()->create([
                'user_id' => 1,
                'name' => "Workout $index",
            ]);
        }

        // add some exercises to the workouts
        $workouts = Workout::all();
        $exercises = Exercise::all();

        foreach ($workouts as $workout) {
            $numberOfExercises = rand(2, 6);
            for ($i = 0; $i < $numberOfExercises; $i++) {
                $exercise = $exercises->random();
                $numberOfSets = rand(3, 5);
                for ($j = 0; $j < $numberOfSets; $j++) {
                    $workout->exercises()->attach($exercise, [
                        'reps' => rand(2, 12),
                        'weight' => rand(20, 100),
                    ]);
                }
            }
            $muscleGroupsWorkedIds = $workout->exercises->pluck('muscle_group_id')->unique();
            $muscleGroupNames = MuscleGroup::whereIn('id', $muscleGroupsWorkedIds)->pluck('name')->implode(', ');
            $workout->update(['name' => "$muscleGroupNames Workout"]);
        }
    }

    private function createEquipment(): void
    {
        $equipment = [
            'Barbell' => 'A barbell is a long metal bar with weights on each end.',
            'Dumbbell' => 'A dumbbell is a short metal bar with weights on each end.',
            'Kettlebell' => 'A kettlebell is a cast iron weight with a handle.',
            'Resistance Band' => 'A resistance band is a rubber band that provides resistance.',
            'Bodyweight' => 'Bodyweight exercises use the weight of the body as resistance.',
        ];

        foreach ($equipment as $name => $description) {
            Equipment::factory()->create([
                'name' => $name,
                'description' => $description,
            ]);
        }
    }

    private function createMuscleGroups(): void
    {
        $muscleGroups = [
            'Chest' => 'The chest muscles are used in pushing movements, such as the bench press.',
            'Back' => 'The back muscles are used in pulling movements, such as the deadlift.',
            'Legs' => 'The leg muscles are used in squatting movements, such as the squat.',
            'Shoulders' => 'The shoulder muscles are used in overhead movements, such as the shoulder press.',
            'Arms' => 'The arm muscles are used in curling movements, such as the bicep curl.',
            'Core' => 'The core muscles are used in stabilizing movements, such as the plank.',
        ];

        foreach ($muscleGroups as $name => $description) {
            MuscleGroup::factory()->create([
                'name' => $name,
                'description' => $description,
            ]);
        }
    }

    private function createExercises(): void
    {
        $exercises = [
            'Bench Press' => 'The bench press is a compound exercise that works the chest muscles.',
            'Deadlift' => 'The deadlift is a compound exercise that works the back muscles.',
            'Squat' => 'The squat is a compound exercise that works the leg muscles.',
            'Shoulder Press' => 'The shoulder press is a compound exercise that works the shoulder muscles.',
            'Bicep Curl' => 'The bicep curl is an isolation exercise that works the bicep muscles.',
            'Plank' => 'The plank is a stabilization exercise that works the core muscles.',
        ];

        $muscleGroupMapping = [
            'Bench Press' => 'Chest',
            'Deadlift' => 'Back',
            'Squat' => 'Legs',
            'Shoulder Press' => 'Shoulders',
            'Bicep Curl' => 'Arms',
            'Plank' => 'Core',
        ];

        $equipmentMapping = [
            'Bench Press' => 'Barbell',
            'Deadlift' => 'Barbell',
            'Squat' => 'Barbell',
            'Shoulder Press' => 'Barbell',
            'Bicep Curl' => 'Dumbbell',
            'Plank' => 'Bodyweight',
        ];

        foreach ($exercises as $name => $description) {
            DB::table('exercises')->insert([
                'name' => $name,
                'description' => $description,
                'muscle_group_id' => MuscleGroup::where('name', $muscleGroupMapping[$name])->first()->id,
                'equipment_id' => Equipment::where('name', $equipmentMapping[$name])->first()->id,
            ]);
        }
    }
}
