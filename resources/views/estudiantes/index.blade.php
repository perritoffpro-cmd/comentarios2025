<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>🎓 Estudiantes</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gradient-to-b from-blue-100 to-indigo-200 min-h-screen py-10">

  <div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-2xl p-8 border border-blue-300">
    <h1 class="text-4xl font-extrabold text-center text-indigo-700 mb-6">
      🎓 Lista de Estudiantes
    </h1>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
      <div class="bg-green-100 border border-green-500 text-green-800 px-4 py-3 rounded mb-6 text-center">
        ✅ {{ session('success') }}
      </div>
    @endif

    {{-- Mensaje de error --}}
    @if(session('error'))
      <div class="bg-red-100 border border-red-500 text-red-800 px-4 py-3 rounded mb-6 text-center">
        ❌ {{ session('error') }}
      </div>
    @endif

    {{-- Formulario de búsqueda --}}
    <form action="{{ route('estudiantes.index') }}" method="GET" class="mb-6">
      <input type="text" name="search" placeholder="Buscar por código, nombre o DNI..." value="{{ request('search') }}"
        class="w-full p-2 border border-blue-400 rounded" />
    </form>

    {{-- Botón para mostrar formulario --}}
    <div class="text-center mb-4">
      <button id="btnMostrarForm" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-full shadow">
        ➕ Agregar Estudiante
      </button>
    </div>

    {{-- Formulario oculto --}}
    <div id="formEstudiante" class="hidden bg-blue-50 p-5 rounded-xl mb-6 border border-blue-300 shadow-inner">
      <form action="{{ route('estudiantes.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label for="codigo" class="block font-semibold text-blue-900 mb-1">🆔 Código:</label>
            <input type="text" id="codigo" name="codigo" class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300" />
          </div>

          <div>
            <label for="nombres" class="block font-semibold text-blue-900 mb-1">👤 Nombres:</label>
            <input type="text" id="nombres" name="nombres" class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300" required />
          </div>

          <div>
            <label for="pri_ape" class="block font-semibold text-blue-900 mb-1">🧾 Primer Apellido:</label>
            <input type="text" id="pri_ape" name="pri_ape" class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300" required />
          </div>

          <div>
            <label for="seg_ape" class="block font-semibold text-blue-900 mb-1">🧾 Segundo Apellido:</label>
            <input type="text" id="seg_ape" name="seg_ape" class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300" />
          </div>

          <div>
            <label for="dni" class="block font-semibold text-blue-900 mb-1">🪪 DNI:</label>
            <input type="text" id="dni" name="dni" maxlength="8" class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300" required />
          </div>
        </div>

        <div class="text-center pt-2">
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full shadow">
            💾 Guardar Estudiante
          </button>
        </div>
      </form>
    </div>

    {{-- Tabla de estudiantes --}}
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300 rounded-lg shadow-lg">
        <thead class="bg-indigo-500 text-white uppercase tracking-wider">
          <tr>
            <th class="p-3 text-left">🆔 Código</th>
            <th class="p-3 text-left">👤 Nombres</th>
            <th class="p-3 text-left">🧾 Primer Apellido</th>
            <th class="p-3 text-left">🧾 Segundo Apellido</th>
            <th class="p-3 text-left">🪪 DNI</th>
            <th class="p-3 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($estudiantes as $estudiante)
            <tr class="hover:bg-blue-50 transition-colors border-b border-gray-200">
              <td class="p-3 text-gray-700">{{ $estudiante->codigo }}</td>
              <td class="p-3 font-semibold text-gray-900">{{ $estudiante->nombres }}</td>
              <td class="p-3 text-gray-700">{{ $estudiante->pri_ape }}</td>
              <td class="p-3 text-gray-700">{{ $estudiante->seg_ape }}</td>
              <td class="p-3 text-gray-700">{{ $estudiante->dni }}</td>
              <td class="p-3 text-center space-x-2">
                <a href="{{ route('estudiantes.show', $estudiante->codigo) }}" 
                   class="bg-blue-500 px-3 py-1 rounded text-white hover:bg-blue-600">
                  Ver
                </a>

                <a href="{{ route('estudiantes.edit', $estudiante->codigo) }}" 
                   class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">
                  Editar
                </a>

                <form action="{{ route('estudiantes.destroy', $estudiante->codigo) }}" method="POST" class="inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('¿Eliminar estudiante {{ $estudiante->nombres }}?')"
                    class="bg-red-600 px-3 py-1 rounded text-white hover:bg-red-700">
                    Eliminar
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center p-4 text-gray-600">📭 No hay estudiantes registrados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>

  <script>
    const btn = document.getElementById('btnMostrarForm');
    const form = document.getElementById('formEstudiante');

    btn.addEventListener('click', () => {
      form.classList.toggle('hidden');
      btn.textContent = form.classList.contains('hidden') ? '➕ Agregar Estudiante' : '❌ Ocultar Formulario';
    });
  </script>
</body>
</html>
