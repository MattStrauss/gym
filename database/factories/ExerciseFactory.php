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
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            'image_url' => $this->faker->optional()->imageUrl(),
            'muscle_group_id' => MuscleGroup::factory()->create()->id,
            'equipment_id' => Equipment::factory()->create()->id,
        ];
    }
}
