<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\MuscleGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words,
            'description' => $this->faker->sentence,
            'image_url' => $this->faker->optional()->imageUrl(),
            'equipment_id' => 1,
            'muscle_group_id' => 1,
        ];
    }
}
