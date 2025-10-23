<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎮 Turismo Quest - Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background: radial-gradient(circle at top, #1a1a40, #000000);
            color: white;
            overflow-x: hidden;
            margin: 0;
        }
        #languageSelect {
            position: absolute;
            top: 10px;
            right: 20px;
            z-index: 3;
            background: rgba(0,0,0,0.6);
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .container {
            padding-top: 50px;
        }
        h1, h3 {
            text-shadow: 0 0 10px #00ffff, 0 0 20px #007bff;
        }
        .card {
            background: rgba(0,0,50,0.8);
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0,255,255,0.2);
            margin-bottom: 20px;
        }
        .btn-primary, .btn-success {
            font-family: 'Press Start 2P', cursive;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

<!-- Selector de idioma -->
<select id="languageSelect">
    <option value="es">Español</option>
    <option value="qu">Quechua</option>
    <option value="en">English</option>
</select>

<div class="container">
    <h1 id="welcomeText">¡Bienvenido, {{ Auth::user()->nombre }}!</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card p-3 text-center">
                <h3 id="missionsTitle">Mis Misiones</h3>
                <p id="missionsText">Aquí podrás ver todas tus misiones activas.</p>
                <a href="{{ route('jugadores.misiones') }}" class="btn btn-primary mt-2" id="missionsBtn">Ir a Misiones</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 text-center">
                <h3 id="rewardsTitle">Mis Recompensas</h3>
                <p id="rewardsText">Revisa todas las recompensas que has obtenido.</p>
                <a href="{{ route('jugadores.recompensas') }}" class="btn btn-success mt-2" id="rewardsBtn">Ver Recompensas</a>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('jugadores.logout') }}" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-danger w-100" id="logoutBtn">Cerrar Sesión</button>
    </form>
</div>

<script>
    // Traducciones para idiomas
    const translations = {
        es: {
            welcomeText: "¡Bienvenido, {{ Auth::user()->nombre }}!",
            missionsTitle: "Mis Misiones",
            missionsText: "Aquí podrás ver todas tus misiones activas.",
            missionsBtn: "Ir a Misiones",
            rewardsTitle: "Mis Recompensas",
            rewardsText: "Revisa todas las recompensas que has obtenido.",
            rewardsBtn: "Ver Recompensas",
            logoutBtn: "Cerrar Sesión"
        },
        qu: {
            welcomeText: "Rimaykullayki, {{ Auth::user()->nombre }}!",
            missionsTitle: "Ñuqanchik misiones",
            missionsText: "Kaypi kanku qhapaq misiones.",
            missionsBtn: "Riqsinay misiones",
            rewardsTitle: "Ñuqanchik rikcharikuykuna",
            rewardsText: "Kaypi kanku rikcharikuykuna.",
            rewardsBtn: "Riqsiy rikcharikuykuna",
            logoutBtn: "Tukuy sesionmi"
        },
        en: {
            welcomeText: "Welcome, {{ Auth::user()->nombre }}!",
            missionsTitle: "My Missions",
            missionsText: "Here you can see all your active missions.",
            missionsBtn: "Go to Missions",
            rewardsTitle: "My Rewards",
            rewardsText: "Check all the rewards you have earned.",
            rewardsBtn: "View Rewards",
            logoutBtn: "Logout"
        }
    };

    const languageSelect = document.getElementById('languageSelect');
    languageSelect.addEventListener('change', () => {
        const lang = languageSelect.value;
        Object.keys(translations[lang]).forEach(id => {
            const el = document.getElementById(id);
            if(el) el.textContent = translations[lang][id];
        });
    });
</script>

</body>
</html>
