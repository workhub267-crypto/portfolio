<?php

use App\Http\Controllers\Admin\AboutController;
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

        Route::get('/logout', 'logout')
            ->name('logout');

    });
});
Route::middleware('auth:admin')->group(function () {

    Route::controller(AboutController::class)->group(function () {
                Route::get('/about', 'about')->name('about');
                Route::post('/update', 'update')->name('about.update');
    });
});
