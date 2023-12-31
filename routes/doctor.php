<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Auth\DoctorAuthController;
use App\Http\Controllers\Doctor\MedicineController;
use App\Http\Controllers\Doctor\ScheduleController;
use App\Http\Controllers\Doctor\AppoitmentController;
use App\Http\Controllers\Doctor\PrescriptionController;

Route::prefix('doctor')->as('doctor.')->group(function () {
    Route::get('login', [DoctorAuthController::class, 'login'])->name('login');
    Route::post('login', [DoctorAuthController::class, 'save_login'])->name('save_login');
    Route::get('register', [DoctorAuthController::class, 'register'])->name('register');
    Route::post('register', [DoctorAuthController::class, 'save_register'])->name('save_register');

    Route::middleware('doctor.auth')->group(function () {
        Route::get('/', [DoctorAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/notifications', [DoctorAuthController::class, 'notifications'])->name('notifications');
        Route::get('/notification/{id}', [DoctorAuthController::class, 'notification_delete'])->name('notifications.delete');
        Route::get('/profile', [DoctorAuthController::class, 'profile'])->name('profile');
        Route::post('/update-profile', [DoctorAuthController::class, 'profile_update'])->name('profile.update');
        Route::get('logout', [DoctorAuthController::class, 'logout'])->name('logout');

         // schedules
         Route::resource('schedules', ScheduleController::class)->names('schedules');

         // medicines
         Route::resource('medicines', MedicineController::class)->names('medicines');

         Route::resource('appoitments', AppoitmentController::class)->names('appoitments');

         // prescriptions
         Route::resource('prescriptions', PrescriptionController::class)->names('prescriptions');
         // patients
         Route::resource('patients', PatientController::class)->names('patients');
    });
});