<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detalles del Estudiante</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-b from-blue-100 to-indigo-200 min-h-screen py-10">
  <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-2xl p-8 border border-blue-300">
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">Detalles del Estudiante</h1>

    <ul class="space-y-4 text-gray-700">
      <li><strong>🆔 Código:</strong> {{ $estudiante->codigo }}</li>
      <li><strong>👤 Nombres:</strong> {{ $estudiante->nombres }}</li>
      <li><strong>🧾 Primer Apellido:</strong> {{ $estudiante->pri_ape }}</li>
      <li><strong>🧾 Segundo Apellido:</strong> {{ $estudiante->seg_ape }}</li>
      <li><strong>🪪 DNI:</strong> {{ $estudiante->dni }}</li>
    </ul>

    <div class="mt-6">
      <a href="{{ route('estudiantes.index') }}" 
         class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-6 rounded-full shadow">
        ← Volver a la lista
      </a>
    </div>
  </div>
</body>
</html>
