<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        $jugadores = Jugador::all();
        return view('jugadores.index', compact('jugadores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:120',
            'apellido' => 'nullable|string|max:120',
            'posicion' => 'nullable|string|max:50',
            'numero' => 'nullable|integer',
        ]);

        Jugador::create($request->all());

        return redirect()->route('jugadores.index')->with('success', 'Jugador agregado correctamente.');
    }
}
