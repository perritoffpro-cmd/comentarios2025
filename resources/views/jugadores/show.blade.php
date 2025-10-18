<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>⚽ Detalle del Jugador</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gradient-to-b from-green-100 to-emerald-200 min-h-screen py-10">

  <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-2xl p-8 border border-green-300">
    <h1 class="text-4xl font-extrabold text-center text-emerald-700 mb-6">
      🏆 Detalle del Jugador
    </h1>

    <div class="space-y-4 text-green-900 text-lg">
      <p><strong>👤 Nombre:</strong> {{ $jugador->nombre }}</p>
      <p><strong>🧾 Apellido:</strong> {{ $jugador->apellido ?? 'N/A' }}</p>
      <p><strong>🎯 Posición:</strong> {{ $jugador->posicion ?? 'N/A' }}</p>
      <p><strong>🔢 Número:</strong> {{ $jugador->numero ?? 'N/A' }}</p>
    </div>

    <div class="mt-8 text-center">
      <a href="{{ route('jugadores.index') }}" 
         class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-full shadow">
        ← Volver a la lista
      </a>
    </div>
  </div>

</body>
</html>
