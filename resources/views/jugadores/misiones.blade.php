<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🗺️ Turismo Quest - Misiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Press Start 2P', cursive;
            background: radial-gradient(circle at top, #1a1a40, #000000);
            color: white;
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 200%;
            height: 200%;
            background: url('https://www.transparenttextures.com/patterns/dark-mosaic.png');
            animation: moveBg 20s linear infinite;
            opacity: 0.2;
        }

        @keyframes moveBg {
            from { transform: translate(0, 0); }
            to { transform: translate(-50%, -50%); }
        }

        .container {
            position: relative;
            z-index: 2;
            padding-top: 80px;
        }

        h1 {
            text-align: center;
            color: #00ffff;
            text-shadow: 0 0 10px #00ffff, 0 0 20px #007bff;
            margin-bottom: 40px;
        }

        .card-mision {
            background: rgba(0, 0, 60, 0.8);
            border: 2px solid #00ffff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,255,255,0.4);
            padding: 20px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }

        .card-mision:hover {
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(0,255,255,0.8);
        }

        .btn-volver {
            font-family: 'Press Start 2P', cursive;
            display: block;
            margin: 30px auto 0;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

<!-- MÚSICA DE FONDO -->
<audio id="bgMusic" autoplay loop>
    <source src="https://files.catbox.moe/ocvx4c.mp3" type="audio/mpeg">
</audio>

<div class="container">
    <h1>🎯 Misiones Activas</h1>

    @foreach ($misiones as $mision)
        <div class="card-mision">
            <h4 class="text-info">{{ $mision['titulo'] }}</h4>
            <p>{{ $mision['descripcion'] }}</p>
        </div>
    @endforeach

    <a href="{{ route('jugadores.dashboard') }}" class="btn btn-outline-info btn-volver">⬅ Volver al mapa</a>
</div>

<script>
    // Controlar volumen inicial y reproducir en clic si el navegador bloquea autoplay
    const music = document.getElementById("bgMusic");
    music.volume = 0.3;
    const playPromise = music.play();
    if (playPromise !== undefined) {
        playPromise.catch(() => {
            document.body.addEventListener('click', () => {
                music.play();
                music.volume = 0.3;
            }, { once: true });
        });
    }
</script>

</body>
</html>
