<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\TravelController;

Route::get('/travels', [TravelController::class, 'index']);


