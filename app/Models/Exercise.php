<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image_url', 'equipment_id'];

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    public function muscleGroups(): BelongsTo
    {
        return $this->belongsTo(MuscleGroup::class);
    }

    public function workouts(): HasMany
    {
        return $this->hasMany(Workout::class);
    }
}
