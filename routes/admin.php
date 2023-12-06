<?php

use App\Http\Controllers\Admin\BedController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ServiceController;

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthController::class, 'save_login'])->name('save_login');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AdminAuthController::class, 'profile'])->name('profile');
        Route::post('/update-profile', [AdminAuthController::class, 'profile_update'])->name('profile.update');
        Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

        // designations
        Route::resource('designations', DesignationController::class)->names('designations');
        // rooms
        Route::resource('rooms', RoomController::class)->names('rooms');
        // beds
        Route::resource('beds', BedController::class)->names('beds');

        // services
        Route::resource('services', ServiceController::class)->names('services');
        // materials
        Route::resource('materials', MaterialController::class)->names('materials');
        // medicines
        Route::resource('medicines', MedicineController::class)->names('medicines');

        // doctors
        Route::resource('doctors', DoctorController::class)->names('doctors');

        // patients
        Route::resource('patients', PatientController::class)->names('patients');

        // patients
        // Route::resource('appoitments', AppoitmentController::class)->names('appoitments');
    });
});
