<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\Patient\PrescriptionController;
use App\Http\Controllers\PdfController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('patient')->as('patient.')->group(function () {
    Route::get('login', [PatientAuthController::class, 'login'])->name('login');
    Route::post('login', [PatientAuthController::class, 'save_login'])->name('save_login');
    Route::get('register', [PatientAuthController::class, 'register'])->name('register');
    Route::post('register', [PatientAuthController::class, 'save_register'])->name('save_register');

    Route::middleware('auth')->group(function () {
        Route::get('/', [PatientAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [PatientAuthController::class, 'profile'])->name('profile');
        Route::post('/update-profile', [PatientAuthController::class, 'profile_update'])->name('profile.update');
        Route::get('logout', [PatientAuthController::class, 'logout'])->name('logout');

        // prescriptions
        Route::get('prescriptions', [PrescriptionController::class, 'index'])->name('prescriptions.index');
        Route::get('prescription/{id}/view', [PrescriptionController::class, 'show'])->name('prescriptions.show');
    });
});

Route::get('prescription/{id}/print', [PdfController::class, 'prescription_download'])->name('prescription.download');
Route::get('/', function () {
    return view('welcome');
});
