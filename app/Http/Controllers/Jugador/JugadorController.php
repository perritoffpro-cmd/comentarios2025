<?php

namespace App\Http\Controllers\Jugador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class JugadorController extends Controller
{
    // Mostrar vista principal de login/registro
    public function index()
    {
        return view('auth.index');
    }

    // Registrar nuevo usuario
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'genero' => 'required|in:Masculino,Femenino',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'genero' => $request->genero,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($usuario);

        return redirect()->route('jugadores.dashboard')->with('success', '✅ Registro exitoso. Bienvenido!');
    }

    // Iniciar sesión
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'correo' => 'required|email',
            'password' => 'required|string',
        ]);

        $usuario = Usuario::where('correo', $credentials['correo'])->first();

        if (!$usuario || !Hash::check($credentials['password'], $usuario->password)) {
            return back()->withErrors(['correo' => '❌ Credenciales incorrectas.']);
        }

        Auth::login($usuario);

        return redirect()->route('jugadores.dashboard')->with('success', '🔓 Sesión iniciada correctamente.');
    }

    // 🔹 Nueva vista: Dashboard (pantalla principal tras iniciar sesión)
    public function dashboard()
    {
        $usuario = Auth::user();
        return view('jugadores.dashboard', compact('usuario'));
    }

    // 🔹 Nueva vista: Misiones
    public function misiones()
    {
        $usuario = Auth::user();

        // Ejemplo de misiones iniciales
        $misiones = [
            ['titulo' => 'Explora la ciudad', 'descripcion' => 'Visita los lugares turísticos y gana puntos.'],
            ['titulo' => 'Encuentra el tesoro', 'descripcion' => 'Sigue las pistas y descubre el tesoro escondido.'],
            ['titulo' => 'Desafío del viajero', 'descripcion' => 'Completa las pruebas culturales de cada región.'],
        ];

        return view('jugadores.misiones', compact('usuario', 'misiones'));
    }

    // Ver recompensas
    public function recompensas()
    {
        $usuario = Auth::user();
        $data = json_decode($usuario->progreso, true);
        $recompensas = $data['recompensas'] ?? [];

        return view('jugadores.recompensas', compact('recompensas'));
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('jugadores.index')->with('success', '👋 Sesión cerrada.');
    }
}
