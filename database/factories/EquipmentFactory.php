<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            // need this to be something unique
            'name' => $this->faker->unique()->words,
            'description' => $this->faker->sentence,
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
