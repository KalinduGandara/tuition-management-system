<?php

use App\Http\Controllers\CenterController;
use App\Http\Controllers\TuitionClassController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('centers', CenterController::class);
Route::resource('tuitionClasses', TuitionClassController::class);
