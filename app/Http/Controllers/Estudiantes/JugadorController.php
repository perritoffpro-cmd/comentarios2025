<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    // Mostrar listado de jugadores
    public function index()
    {
        $jugadores = Jugador::all();
        return view('jugadores.index', compact('jugadores'));
    }

    // Mostrar formulario para crear un jugador (si quieres aparte, si no usas modal)
    public function create()
    {
        return view('jugadores.create');
    }

    // Guardar jugador nuevo
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

    // Mostrar formulario para editar un jugador
    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);
        return view('jugadores.edit', compact('jugador'));
    }

    // Actualizar jugador
    public function update(Request $request, $id)
    {
        $jugador = Jugador::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:120',
            'apellido' => 'nullable|string|max:120',
            'posicion' => 'nullable|string|max:50',
            'numero' => 'nullable|integer',
        ]);

        $jugador->update($request->all());

        return redirect()->route('jugadores.index')->with('success', 'Jugador actualizado correctamente.');
    }

    // Eliminar jugador
    public function destroy($id)
    {
        $jugador = Jugador::findOrFail($id);
        $jugador->delete();

        return redirect()->route('jugadores.index')->with('success', 'Jugador eliminado correctamente.');
    }

    // Mostrar detalles de un jugador
    public function show($id)
    {
        $jugador = Jugador::findOrFail($id);
        return view('jugadores.show', compact('jugador'));
    }
}
