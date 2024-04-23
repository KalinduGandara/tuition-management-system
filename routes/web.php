<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TuitionClassController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('centers', CenterController::class);
    Route::resource('tuitionClasses', TuitionClassController::class);
    Route::resource('registrations', RegistrationController::class);
    Route::resource('tests', TestController::class);
    Route::resource('students', StudentController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('attendances', AttendanceController::class);
});

require __DIR__ . '/auth.php';