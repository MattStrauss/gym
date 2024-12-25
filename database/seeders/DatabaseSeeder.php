<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Matt Tester',
            'email' => 'matt@example.net',
            'password' => bcrypt('password'),
        ]);

        Exercise::factory(50)->create();

        Workout::factory(10)->create([
            'user_id' => 1,
        ]);

        Workout::factory(10)->create();
    }
}
