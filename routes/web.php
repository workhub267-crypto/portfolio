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
Route::get('contact', [UserController::class, 'contactPage'])->name('user.contact');
Route::get('about', [UserController::class, 'aboutPage'])->name('user.about');
Route::get('services', [UserController::class, 'servicesPage'])->name('user.services');
Route::get('skills', [UserController::class, 'skillsPage'])->name('user.skills');
Route::get('works', [UserController::class, 'projectsPage'])->name('user.projects');

Route::post('contact', [UserController::class, 'sendContactData'])->name('user.contact');

Route::get('/testimonials-data', [UserController::class, 'getTestimonials'])->name('testimonials.data');
Route::get('/services-data', [UserController::class, 'getServices'])->name('services.data');
Route::get('/projects-data', [UserController::class, 'getProjects'])->name('projects.data');
Route::get('/skills-data', [UserController::class, 'getSkills'])->name('skills.data');

Route::get('/check-upload', function () {
    dd(ini_get('upload_max_filesize'), ini_get('post_max_size'));
});

Route::get('/phpinfo', function () {
    phpinfo();
});