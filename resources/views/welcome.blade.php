<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Inicio - Enlaces</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 2rem;
            text-align: center;
        }

        h1 {
            color: #1f2937;
            margin-bottom: 1rem;
        }

        #reloj {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 2rem;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
            max-width: 900px;
            margin: 0 auto;
        }

        nav a {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 160px;
            height: 160px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #374151;
            font-weight: 700;
            font-size: 1.1rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            user-select: none;
        }

        nav a:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
            color: #2563eb;
            background-color: #e0e7ff;
        }

        nav a .emoji {
            font-size: 3.5rem;
            margin-bottom: 0.6rem;
        }
    </style>
</head>
<body>
    <h1>Página de Inicio</h1>
    <div id="reloj">--:--:--</div>

    <nav>
        <a href="{{ route('estudiantes.index') }}">
            <div class="emoji">🎓</div>
            Estudiantes
        </a>
        <a href="{{ route('jugadores.index') }}">
            <div class="emoji">⚽</div>
            Jugadores
        </a>
        <a href="{{ route('saluditos') }}">
            <div class="emoji">👋</div>
            Saludos
        </a>
        <a href="{{ route('bienvenidos1') }}">
            <div class="emoji">🏠</div>
            Bienvenido
        </a>
        <a href="{{ route('proyecto1') }}">
            <div class="emoji">🚀</div>
            Proyecto 1
        </a>
        <a href="{{ route('proyecto2') }}">
            <div class="emoji">🛠️</div>
            Proyecto 2
        </a>
    </nav>

    <script>
        function actualizarReloj() {
            const ahora = new Date();
            const horas = String(ahora.getHours()).padStart(2, '0');
            const minutos = String(ahora.getMinutes()).padStart(2, '0');
            const segundos = String(ahora.getSeconds()).padStart(2, '0');
            const horaFormateada = `${horas}:${minutos}:${segundos}`;

            document.getElementById('reloj').textContent = horaFormateada;
        }

        setInterval(actualizarReloj, 1000);
        actualizarReloj();
    </script>
</body>
</html>
