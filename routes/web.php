<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;  // ← import your controller

Route::get('/', [WeatherController::class, 'index']);