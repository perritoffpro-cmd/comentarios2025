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
            'codigo' => 'required|string|max:10',
            'nombres' => 'required|string|max:50',
            'pri_ape' => 'required|string|max:50',
            'seg_ape' => 'nullable|string|max:50',
            'dni' => 'required|string|max:15',
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante agregado correctamente.');
    }
}
