<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Jugador</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gradient-to-b from-green-100 to-emerald-200 min-h-screen py-10">

  <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-2xl p-8 border border-green-300">
    <h1 class="text-3xl font-extrabold text-center text-emerald-700 mb-6">
      ✏️ Editar Jugador
    </h1>

    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label for="nombre" class="block font-semibold text-green-900 mb-1">👤 Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $jugador->nombre) }}" required
          class="w-full border border-green-400 rounded p-2 focus:ring focus:ring-green-300" />
      </div>

      <div>
        <label for="apellido" class="block font-semibold text-green-900 mb-1">🧾 Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $jugador->apellido) }}"
          class="w-full border border-green-400 rounded p-2 focus:ring focus:ring-green-300" />
      </div>

      <div>
        <label for="posicion" class="block font-semibold text-green-900 mb-1">🎯 Posición:</label>
        <input type="text" id="posicion" name="posicion" value="{{ old('posicion', $jugador->posicion) }}"
          class="w-full border border-green-400 rounded p-2 focus:ring focus:ring-green-300" />
      </div>

      <div>
        <label for="numero" class="block font-semibold text-green-900 mb-1">🔢 Número:</label>
        <input type="number" id="numero" name="numero" min="0" value="{{ old('numero', $jugador->numero) }}"
          class="w-full border border-green-400 rounded p-2 focus:ring focus:ring-green-300" />
      </div>

      <div class="text-center pt-2">
        <button type="submit"
          class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full shadow">
          💾 Actualizar Jugador
        </button>
      </div>
    </form>

    <div class="mt-6 text-center">
      <a href="{{ route('jugadores.index') }}"
        class="text-emerald-700 hover:underline font-semibold">← Volver a la lista</a>
    </div>

  </div>

</body>
</html>
