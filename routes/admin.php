<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DesignationController;

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthController::class, 'save_login'])->name('save_login');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

        // designations
        Route::resource('designations', DesignationController::class)->names('designations');

        // doctors
        Route::resource('doctors', DoctorController::class)->names('doctors');

        // patients
        Route::resource('patients', PatientController::class)->names('patients');

        // patients
        // Route::resource('appoitments', AppoitmentController::class)->names('appoitments');
    });
});
