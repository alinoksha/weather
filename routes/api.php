<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/weather/coords', [WeatherController::class, 'byCoords']);
Route::get('/weather/location', [WeatherController::class, 'byLocation']);
