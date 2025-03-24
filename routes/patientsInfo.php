<?php

use App\Http\Controllers\PatientsInfoController;
use Illuminate\Support\Facades\Route;

Route::resource('patientsInfo', PatientsInfoController::class)->middleware(['auth', 'verified']);
