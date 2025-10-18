<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>🗑️ Eliminar Estudiante</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-b from-red-100 to-red-300 min-h-screen py-10">

  <div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-2xl p-8 border border-red-400">
    <h1 class="text-4xl font-extrabold text-center text-red-700 mb-6">
      🗑️ Eliminar Estudiantes
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

    {{-- Tabla de estudiantes --}}
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300 rounded-lg shadow-lg">
        <thead class="bg-red-500 text-white uppercase tracking-wider">
          <tr>
            <th class="p-3 text-left">🆔 Código</th>
            <th class="p-3 text-left">👤 Nombres</th>
            <th class="p-3 text-left">🧾 Primer Apellido</th>
            <th class="p-3 text-left">🧾 Segundo Apellido</th>
            <th class="p-3 text-left">🪪 DNI</th>
            <th class="p-3 text-center">🗑️ Acción</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($estudiantes as $estudiante)
            <tr class="hover:bg-red-50 transition-colors border-b border-gray-200">
              <td class="p-3 text-gray-700">{{ $estudiante->codigo }}</td>
              <td class="p-3 font-semibold text-gray-900">{{ $estudiante->nombres }}</td>
              <td class="p-3 text-gray-700">{{ $estudiante->pri_ape }}</td>
              <td class="p-3 text-gray-700">{{ $estudiante->seg_ape }}</td>
              <td class="p-3 text-gray-700">{{ $estudiante->dni }}</td>
              <td class="p-3 text-center">
                <form action="{{ route('estudiantes.destroy', $estudiante->codigo) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar al estudiante {{ $estudiante->nombres }}?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-4 rounded-full shadow">
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

    <div class="text-center mt-6">
      <a href="{{ route('estudiantes.index') }}" class="text-red-700 hover:underline font-semibold">
        ← Volver a la lista de estudiantes
      </a>
    </div>
  </div>

</body>
</html>
