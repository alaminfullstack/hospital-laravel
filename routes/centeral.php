<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CenteralAuthController;


Route::prefix('centeral')->as('centeral.')->group(function () {
    Route::get('login', [CenteralAuthController::class, 'login'])->name('login');
    Route::post('login', [CenteralAuthController::class, 'save_login'])->name('save_login');
    Route::get('register', [CenteralAuthController::class, 'register'])->name('register');
    Route::post('register', [CenteralAuthController::class, 'save_register'])->name('save_register');

    Route::middleware('centeral.auth')->group(function () {
        Route::get('/', [CenteralAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [CenteralAuthController::class, 'profile'])->name('profile');
        Route::post('/update-profile', [CenteralAuthController::class, 'profile_update'])->name('profile.update');
        Route::get('logout', [CenteralAuthController::class, 'logout'])->name('logout');
    });
});