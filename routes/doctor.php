<?php

use App\Http\Controllers\Auth\DoctorAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('doctor')->as('doctor.')->group(function () {
    Route::get('login', [DoctorAuthController::class, 'login'])->name('login');
    Route::post('login', [DoctorAuthController::class, 'save_login'])->name('save_login');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [DoctorAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [DoctorAuthController::class, 'logout'])->name('logout');
    });
});