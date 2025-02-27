<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('users.index');

Route::resource('users', UserController::class)->only(['create', 'edit', 'show', 'update', 'destroy', 'store'])->middleware(['auth', 'verified']);
