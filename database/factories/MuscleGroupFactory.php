<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MuscleGroupFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
