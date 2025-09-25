<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/* ... comentarios ... */

// 1. ESTA ES LA RUTA DE REDIRECCIÓN QUE YA TIENES
Route::get('/', function () {
    return redirect()->route('categories.index');
});

Route::resource('categories', CategoryController::class);

Route::resource('courses', App\Http\Controllers\CourseController::class)->except('show');

Route::resource('lessons', App\Http\Controllers\LessonController::class)->except('show');

Route::resource('enrollments', App\Http\Controllers\EnrollmentController::class)->except('show');
