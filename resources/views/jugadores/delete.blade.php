<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>⚠️ Confirmar eliminación</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gradient-to-b from-red-100 to-red-300 min-h-screen py-10">

  <div class="max-w-xl mx-auto bg-white shadow-2xl rounded-2xl p-8 border border-red-400">
    <h1 class="text-3xl font-extrabold text-center text-red-700 mb-6">
      ⚠️ Confirmar eliminación del jugador
    </h1>

    <div class="text-red-900 space-y-4">
      <p>¿Estás seguro que deseas eliminar al jugador <strong>{{ $jugador->nombre }} {{ $jugador->apellido }}</strong>?</p>
      <p>Esta acción no podrá deshacerse.</p>
    </div>

    <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST" class="mt-6 text-center">
      @csrf
      @method('DELETE')
      <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-full shadow mr-4">
        Sí, eliminar
      </button>
      <a href="{{ route('jugadores.index') }}" 
         class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-6 rounded-full shadow">
         Cancelar
      </a>
    </form>

  </div>

</body>
</html>
