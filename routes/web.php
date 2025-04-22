<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BakmieController;

Route::view('/', 'welcome'); // Halaman welcome

// Rute untuk dashboard menggunakan controller
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard'); // tanpa auth

Route::resource('bakmie', BakmieController::class)->middleware(['auth']);


// Rute untuk profile (misalnya menggunakan view langsung)
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
