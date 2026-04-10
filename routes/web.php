<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//ACCESSABLE ROUTES
Route::get("/", [HomeController::class, "index"]);

//AUTH ROUTES
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__ . '/settings.php';
