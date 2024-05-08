<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\ClassDayController;
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
    Route::resource('classDays', ClassDayController::class);

    Route::get('/tuitionClasses/{tuitionClass}/attendance', [TuitionClassController::class, 'showClassDays'])->name('tuitionClasses.attendance');
    Route::get('/tuitionClasses/{tuitionClass}/attendance/create', [TuitionClassController::class, 'createClassDay'])->name('tuitionClasses.attendance.create');
    Route::post('/tuitionClasses/{tuitionClass}/attendance/create', [TuitionClassController::class, 'storeClassDay'])->name('tuitionClasses.attendance.store');

    Route::get('/tuitionClasses/{tuitionClass}/payment', [TuitionClassController::class, 'showPayments'])->name('tuitionClasses.payment');


    Route::get('/tuitionClasses/{tuitionClass}/test', [TuitionClassController::class, 'showTests'])->name('tuitionClasses.test');
    Route::get('/tuitionClasses/{tuitionClass}/test/create', [TuitionClassController::class, 'createTest'])->name('tuitionClasses.test.create');
    Route::post('/tuitionClasses/{tuitionClass}/test/create', [TuitionClassController::class, 'storeTest'])->name('tuitionClasses.test.store');
});

require __DIR__ . '/auth.php';
