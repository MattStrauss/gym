<?php

use App\Livewire\ViewWorkout;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('workouts/{workout}', ViewWorkout::class)
    ->middleware(['auth'])
    ->name('workout');

require __DIR__.'/auth.php';
