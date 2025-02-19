<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\TourController;
use App\Http\Controllers\API\V1\TravelController;

Route::get('/travels', [TravelController::class, 'index']);

Route::get('/travels/{travel:slug}/tours', [TourController::class, 'index']);


