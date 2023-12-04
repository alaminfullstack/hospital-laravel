<?php

use App\Http\Controllers\Auth\PatientAuthController;
use Illuminate\Support\Facades\Route;

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

    Route::middleware('auth')->group(function () {
        Route::get('/', [PatientAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [PatientAuthController::class, 'logout'])->name('logout');
    });
});

Route::get('/', function () {
    return view('welcome');
});
