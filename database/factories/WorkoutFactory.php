<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkoutFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            'image_url' => $this->faker->optional()->imageUrl(),
            'completed_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
