<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;

/* ... comentarios ... */

// Redirige la ruta principal a la lista de cursos, que es más central.
Route::get('/', function () {
    return redirect()->route('courses.index');
});

// Define todas las rutas para el CRUD de Categorías.
Route::resource('categories', CategoryController::class);

// Define todas las rutas para el CRUD de Cursos, excepto la vista de detalle.
Route::resource('courses', CourseController::class)->except('show');

// Define todas las rutas para el CRUD de Lecciones, excepto la vista de detalle.
Route::resource('lessons', LessonController::class)->except('show');

// Define todas las rutas para el CRUD de Matrículas, excepto la vista de detalle.
Route::resource('enrollments', EnrollmentController::class)->except('show');
