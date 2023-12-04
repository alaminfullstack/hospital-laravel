<?php

use App\Http\Controllers\Auth\DoctorAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('doctor')->as('doctor.')->group(function () {
    Route::get('login', [DoctorAuthController::class, 'login'])->name('login');
    Route::post('login', [DoctorAuthController::class, 'save_login'])->name('save_login');
    Route::get('register', [DoctorAuthController::class, 'register'])->name('register');
    Route::post('register', [DoctorAuthController::class, 'save_register'])->name('save_register');

    Route::middleware('doctor.auth')->group(function () {
        Route::get('/', [DoctorAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [DoctorAuthController::class, 'logout'])->name('logout');
    });
});