<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PracticasController;

use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('fetch');
});


// API Routes de Alumnos
Route::post('/api/alumnos', [AlumnoController::class, 'apiStore']);
Route::put('/api/alumnos/{alumno}', [AlumnoController::class, 'apiUpdate']);
Route::delete('/api/alumnos/{alumno}', [AlumnoController::class, 'apiDestroy']);
Route::get('/api/alumnos', [AlumnoController::class, 'apiIndex']);
Route::get('/api/alumnos/{alumno}', [AlumnoController::class, 'apiShow']);

// API Routes de Practicas
Route::post('/api/practicas', [PracticasController::class, 'apiStore']);
Route::put('/api/practicas/{practica}', [PracticasController::class, 'apiUpdate']);
Route::delete('/api/practicas/{practica}', [PracticasController::class, 'apiDestroy']);
Route::get('/api/practicas', [PracticasController::class, 'apiIndex']);
Route::get('/api/practicas/{practica}', [PracticasController::class, 'apiShow']);