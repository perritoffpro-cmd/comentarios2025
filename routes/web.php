<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Estudiantes\EstudiantesController;
use App\Http\Controllers\Jugador\JugadorController; // ✅ corregido namespace

// ---------------------
// 🔹 Rutas generales
// ---------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludos', fn() => 'Hello World')->name('saluditos');
Route::get('/bienvenido', fn() => view('bienvenidos'))->name('bienvenidos1');
Route::get('/proyecto1', fn() => 'Este es el proyecto 1')->name('proyecto1');
Route::get('/proyecto2', fn() => 'Este es el proyecto 2')->name('proyecto2');

// ---------------------
// 🎓 Rutas para estudiantes
// ---------------------
Route::prefix('estudiantes')->name('estudiantes.')->group(function () {
    Route::get('/index', [EstudiantesController::class, 'index'])->name('index');
    Route::post('/', [EstudiantesController::class, 'store'])->name('store');
    Route::get('/buscar', [EstudiantesController::class, 'buscar'])->name('buscar');
    Route::get('/{codigo}', [EstudiantesController::class, 'show'])->name('show');
    Route::get('/{codigo}/edit', [EstudiantesController::class, 'edit'])->name('edit');
    Route::put('/{codigo}', [EstudiantesController::class, 'update'])->name('update');
    Route::delete('/{codigo}', [EstudiantesController::class, 'destroy'])->name('destroy');
});

// ---------------------
// ⚽ Rutas para jugadores (login, registro, misiones y recompensas)
// ---------------------
Route::prefix('jugadores')->name('jugadores.')->group(function () {

    // 🟢 Vista principal (login y registro)
    Route::get('/', [JugadorController::class, 'index'])->name('index');

    // 🟢 Registrar nuevo jugador
    Route::post('/register', [JugadorController::class, 'register'])->name('register');

    // 🟢 Iniciar sesión
    Route::post('/login', [JugadorController::class, 'login'])->name('login');

    // 🟢 Cerrar sesión
    Route::post('/logout', [JugadorController::class, 'logout'])->name('logout');

    // 🟡 Página de inicio o menú principal (después del login)
    Route::get('/dashboard', [JugadorController::class, 'dashboard'])
        ->name('dashboard')
        ->middleware('auth');

    // 🔹 Ver misiones disponibles
    Route::get('/misiones', [JugadorController::class, 'misiones'])
        ->name('misiones')
        ->middleware('auth');

    // 🔹 Ver recompensas
    Route::get('/recompensas', [JugadorController::class, 'recompensas'])
        ->name('recompensas')
        ->middleware('auth');
});
