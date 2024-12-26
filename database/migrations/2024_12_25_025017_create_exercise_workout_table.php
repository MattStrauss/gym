<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exercise_workout', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_id');
            $table->unsignedBigInteger('workout_id');
            $table->integer('reps');
            $table->integer('weight');
            $table->boolean('is_drop_set')->default(false);
            $table->unsignedInteger('super_set_number')->nullable();

            $table->foreign('exercise_id')->references('id')->on('exercises')
                ->onDelete('cascade');
            $table->foreign('workout_id')->references('id')->on('workouts')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_workout');
    }
};
