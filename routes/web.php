<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//ACCESSABLE ROUTES
Route::get("/", [HomeController::class, "index"]);
Route::get('/doctors', [DoctorController::class, 'getAllDoctorCards'])->name('doctors.getAllDoctorCards');

//AUTH ROUTES
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
