<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ContactController;
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
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/services', 'services')->name('services');
        Route::get('/services/data', 'servicesData')->name('services.data');
        Route::post('/services/store', 'store')->name('services.store');
        Route::get('/services/edit/{id}', 'edit')->name('services.edit');
        Route::post('/services/delete', 'delete')->name('services.delete');
    });
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contacts', 'index')->name('contacts');
        Route::get('/contacts/data', 'contactsData')->name('contacts.data');
        Route::get('/contacts/show/{id}', 'show')->name('contacts.show');
        Route::post('/contacts/delete', 'delete')->name('contacts.delete');
    });
    Route::controller(\App\Http\Controllers\Admin\ProjectController::class)->group(function () {
        Route::get('/projects', 'projects')->name('projects');
        Route::get('/projects/data', 'projectsData')->name('projects.data');
        Route::post('/projects/store', 'store')->name('projects.store');
        Route::get('/projects/edit/{id}', 'edit')->name('projects.edit');
        Route::post('/projects/delete', 'delete')->name('projects.delete');
    });
});
