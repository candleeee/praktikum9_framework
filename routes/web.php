<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman home
Route::get('home', [HomeController::class, 'index'])->name('home');

// Rute untuk halaman profile
Route::get('profile', ProfileController::class)->name('profile');

// Rute untuk resource employees
Route::resource('employees', EmployeeController::class);

// Rute untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
});
