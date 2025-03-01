<?php

use App\Http\Controllers\TypesOfDiseaseController;
use Illuminate\Support\Facades\Route;

Route::resource('typesOfDiseases', TypesOfDiseaseController::class)->middleware(['auth', 'verified']);
