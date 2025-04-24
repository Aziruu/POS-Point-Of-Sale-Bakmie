<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Rute untuk dashboard menggunakan controller
Route::get('/', [HomeController::class, 'index']);
