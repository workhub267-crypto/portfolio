<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest:admin')->group(function () {

        Route::get('/login', 'login')->name('login');

        Route::post('/login-action', 'adminLoginAction')
            ->name('login-action');
    });
    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
});
