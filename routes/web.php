<?php

use App\Http\Controllers\Estudiantes\EstudiantesController;
use App\Http\Controllers\Estudiantes\JugadorController;
use Illuminate\Support\Facades\Route;

// Rutas generales
Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludos', function () {
    return 'Hello World';
})->name('saluditos');

Route::get('/bienvenido', function () {
    return view('bienvenidos');
})->name('bienvenidos1');

Route::get('/proyecto1', function () {
    return 'Este es el proyecto 1';
})->name('proyecto1');

Route::get('/proyecto2', function () {
    return 'Este es el proyecto 2';
})->name('proyecto2');

// Rutas para estudiantes
Route::get('/estudiantes/index', [EstudiantesController::class, 'index'])->name('estudiantes.index');
Route::post('/estudiantes', [EstudiantesController::class, 'store'])->name('estudiantes.store');

Route::get('/estudiantes/{codigo}/edit', [EstudiantesController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{codigo}', [EstudiantesController::class, 'update'])->name('estudiantes.update');
Route::delete('/estudiantes/{codigo}', [EstudiantesController::class, 'destroy'])->name('estudiantes.destroy');

// Ruta para buscar estudiante
Route::get('/estudiantes/buscar', [EstudiantesController::class, 'buscar'])->name('estudiantes.buscar');

// Ruta para mostrar un solo estudiante
Route::get('/estudiantes/{codigo}', [EstudiantesController::class, 'show'])->name('estudiantes.show');

// Rutas para jugadores
Route::get('/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
Route::post('/jugadores', [JugadorController::class, 'store'])->name('jugadores.store');

// Nuevas rutas para jugadores
Route::get('/jugadores/{id}', [JugadorController::class, 'show'])->name('jugadores.show');
Route::get('/jugadores/{id}/edit', [JugadorController::class, 'edit'])->name('jugadores.edit');
Route::put('/jugadores/{id}', [JugadorController::class, 'update'])->name('jugadores.update');
Route::delete('/jugadores/{id}', [JugadorController::class, 'destroy'])->name('jugadores.destroy');
