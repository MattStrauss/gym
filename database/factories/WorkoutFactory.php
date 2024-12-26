<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkoutFactory extends Factory
{
    /**
     * @throws \DateMalformedStringException
     */
    public function definition(): array
    {
        $startedAt = $this->faker->dateTime();
        $carbonStartedAt = new Carbon($startedAt);
        $wasCompleted = $this->faker->boolean(93);
        $completedAt = null;
        if ($wasCompleted) $completedAt = $carbonStartedAt->addMinutes($this->faker->numberBetween(30, 150));

        return [
            'user_id' => User::factory()->create()->id,
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            'image_url' => $this->faker->optional()->imageUrl(),
            'started_at' => $startedAt,
            'completed_at' => $completedAt,
        ];
    }
}
