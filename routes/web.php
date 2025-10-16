<?php

use App\Http\Controllers\Estudiantes\EstudiantesController;
use App\Http\Controllers\Estudiantes\JugadorController;
use Illuminate\Support\Facades\Route;

// Ruta principal que muestra los enlaces a Estudiantes y Jugadores
Route::get('/', function () {
    return view('welcome'); // Vista con los enlaces
});

// Otras rutas fijas
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
    return view('proyecto2');
})->name('proyecto2');

// Ruta para mostrar lista de estudiantes
Route::get('/estudiantes/index', [EstudiantesController::class, 'index'])->name('estudiantes.index');

// Ruta para mostrar lista de jugadores
Route::get('/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
