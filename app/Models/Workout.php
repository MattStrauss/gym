<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    /** @use HasFactory<\Database\Factories\WorkoutFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'image_url'];

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class);
    }
}
