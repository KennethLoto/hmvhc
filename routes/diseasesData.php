<?php

use App\Http\Controllers\DiseasesDataController;
use Illuminate\Support\Facades\Route;

Route::resource('diseasesData', DiseasesDataController::class)->middleware(['auth', 'verified']);
