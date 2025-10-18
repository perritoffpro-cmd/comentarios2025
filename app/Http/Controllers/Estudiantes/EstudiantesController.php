<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:10|unique:estudiantes,codigo',
            'nombres' => 'required|string|max:50',
            'pri_ape' => 'required|string|max:50',
            'seg_ape' => 'nullable|string|max:50',
            'dni' => 'required|string|max:8',
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante agregado correctamente.');
    }

    public function show($codigo)
{
    $estudiante = Estudiante::where('codigo', $codigo)->firstOrFail();
    return view('estudiantes.show', compact('estudiante'));
}


    public function edit($codigo)
    {
        $estudiante = Estudiante::where('codigo', $codigo)->firstOrFail();
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function buscar(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:50',
        ]);

        $query = $request->input('query');

        $estudiante = Estudiante::where('codigo', $query)
            ->orWhere('nombres', 'LIKE', "%$query%")
            ->orWhere('dni', $query)
            ->first();

        if ($estudiante) {
            return view('estudiantes.resultado', compact('estudiante'));
        } else {
            return redirect()->route('estudiantes.index')->with('error', 'No se encontró ningún estudiante con ese criterio.');
        }
    }

    public function update(Request $request, $codigo)
    {
        $estudiante = Estudiante::where('codigo', $codigo)->firstOrFail();

        $request->validate([
            'codigo' => 'required|string|max:10|unique:estudiantes,codigo,' . $estudiante->id,
            'nombres' => 'required|string|max:50',
            'pri_ape' => 'required|string|max:50',
            'seg_ape' => 'nullable|string|max:50',
            'dni' => 'required|string|max:8',
        ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    public function destroy($codigo)
    {
        $estudiante = Estudiante::where('codigo', $codigo)->firstOrFail();
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
