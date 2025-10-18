<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>⚽ Lista de Jugadores</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gradient-to-b from-green-100 to-emerald-200 min-h-screen py-10">

  <div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-2xl p-8 border border-green-300">
    <h1 class="text-4xl font-extrabold text-center text-emerald-700 mb-6">
      🏆 Lista de Jugadores
    </h1>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
      <div class="bg-green-100 border border-green-500 text-green-800 px-4 py-3 rounded mb-6 text-center">
        ✅ {{ session('success') }}
      </div>
    @endif

    {{-- Botón para mostrar formulario --}}
    <div class="text-center mb-4">
      <button id="btnMostrarForm" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-5 rounded-full shadow">
        ➕ Agregar Jugador
      </button>
    </div>

    {{-- Formulario oculto --}}
    <div id="formJugador" class="hidden bg-green-50 p-5 rounded-xl mb-6 border border-green-300 shadow-inner">
      <form action="{{ route('jugadores.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label for="nombre" class="block font-semibold text-green-900 mb-1">👤 Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="w-full border border-green-400 rounded p-2 focus:ring focus:ring-green-300" required />
          </div>

          <div>
            <label for="apellido" class="block font-semibold text-green-900 mb-1">🧾 Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="w-full border border-green-400 rounded p-2 focus:ring focus:ring-green-300" />
          </div>

          <div>
            <label for="posicion" class="block font-semibold text-green-900 mb-1">🎯 Posición:</label>
            <input type="text" id="posicion" name="posicion" class="w-full border border-green-400 rounded p-2 focus:ring focus:ring-green-300" />
          </div>

          <div>
            <label for="numero" class="block font-semibold text-green-900 mb-1">🔢 Número:</label>
            <input type="number" id="numero" name="numero" class="w-full border border-green-400 rounded p-2 focus:ring focus:ring-green-300" min="0" />
          </div>
        </div>

        <div class="text-center pt-2">
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full shadow">
            💾 Guardar Jugador
          </button>
        </div>
      </form>
    </div>

    {{-- Tabla de jugadores --}}
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300 rounded-lg shadow-lg">
        <thead class="bg-emerald-500 text-white uppercase tracking-wider">
          <tr>
            <th class="p-3 text-left">👤 Nombre</th>
            <th class="p-3 text-left">🧾 Apellido</th>
            <th class="p-3 text-left">🎯 Posición</th>
            <th class="p-3 text-left">🔢 Número</th>
            <th class="p-3 text-left">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse($jugadores as $jugador)
            <tr class="hover:bg-green-50 transition-colors border-b border-gray-200">
              <td class="p-3 text-gray-800 font-semibold">{{ $jugador->nombre }}</td>
              <td class="p-3 text-gray-700">{{ $jugador->apellido }}</td>
              <td class="p-3 text-gray-700">{{ $jugador->posicion }}</td>
              <td class="p-3 text-gray-700">{{ $jugador->numero }}</td>
              <td class="p-3 space-x-2">
                <a href="{{ route('jugadores.show', $jugador->id) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-1 px-3 rounded-full text-sm">
                  Ver
                </a>
                <a href="{{ route('jugadores.edit', $jugador->id) }}" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded-full text-sm">
                  Editar
                </a>
                <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          onclick="return confirm('¿Seguro que quieres eliminar este jugador?')" 
                          class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded-full text-sm">
                    Eliminar
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center p-4 text-gray-600">📭 No hay jugadores registrados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>

  <script>
    const btnMostrarForm = document.getElementById('btnMostrarForm');
    const formJugador = document.getElementById('formJugador');

    btnMostrarForm.addEventListener('click', () => {
      formJugador.classList.toggle('hidden');
      btnMostrarForm.textContent = formJugador.classList.contains('hidden')
        ? '➕ Agregar Jugador'
        : '❌ Ocultar Formulario';
    });
  </script>

</body>
</html>
