<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/admin/dashboard', function () {
//    return view('admin.master');
//});

Route::get('about-data', [UserController::class, 'getAboutData'])
    ->name('about.data');

Route::get('download-resume', [UserController::class, 'downloadResume'])->name('download.resume');
Route::get('contact', [UserController::class,'contactPage'])->name('user.contact');

Route::post('contact', [UserController::class,'sendContactData'])->name('user.contact');