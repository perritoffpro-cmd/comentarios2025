<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>✏️ Editar Estudiante</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-b from-blue-100 to-indigo-200 min-h-screen py-10">

  <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-2xl p-8 border border-blue-300">
    <h1 class="text-3xl font-extrabold text-center text-indigo-700 mb-6">
      ✏️ Editar Estudiante
    </h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('estudiantes.update', $estudiante->codigo) }}" method="POST" class="space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label for="codigo" class="block font-semibold text-blue-900 mb-1">🆔 Código:</label>
        <input type="text" id="codigo" name="codigo" value="{{ old('codigo', $estudiante->codigo) }}" class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300" required />
      </div>

      <div>
        <label for="nombres" class="block font-semibold text-blue-900 mb-1">👤 Nombres:</label>
        <input type="text" id="nombres" name="nombres" value="{{ old('nombres', $estudiante->nombres) }}" class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300" required />
      </div>

      <div>
        <label for="pri_ape" class="block font-semibold text-blue-900 mb-1">🧾 Primer Apellido:</label>
        <input type="text" id="pri_ape" name="pri_ape" value="{{ old('pri_ape', $estudiante->pri_ape) }}" class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300" required />
      </div>

      <div>
        <label for="seg_ape" class="block font-semibold text-blue-900 mb-1">🧾 Segundo Apellido:</label>
        <input type="text" id="seg_ape" name="seg_ape" value="{{ old('seg_ape', $estudiante->seg_ape) }}" class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300" />
      </div>

      <div>
        <label for="dni" class="block font-semibold text-blue-900 mb-1">🪪 DNI:</label>
        <input type="text" id="dni" name="dni" maxlength="8" value="{{ old('dni', $estudiante->dni) }}" class="w-full border border-blue-400 rounded p-2 focus:ring focus:ring-blue-300" required />
      </div>

      <div class="text-center pt-4">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full shadow">
          💾 Guardar Cambios
        </button>
      </div>
    </form>

    <div class="text-center mt-6">
      <a href="{{ route('estudiantes.index') }}" class="text-blue-600 hover:underline">
        ← Volver a la lista de estudiantes
      </a>
    </div>
  </div>

</body>
</html>
