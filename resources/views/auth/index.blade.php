<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎮 Turismo Quest - Inicio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fuente tipo videojuego -->
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: 'Press Start 2P', cursive;
            background: radial-gradient(circle at top, #1a1a40, #000000);
            color: white;
            overflow: hidden;
        }

        /* Fondo animado tipo galaxia */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 200%;
            height: 200%;
            background: url('https://www.transparenttextures.com/patterns/dark-mosaic.png');
            animation: moveBg 15s linear infinite;
            opacity: 0.3;
        }

        @keyframes moveBg {
            from { transform: translate(0, 0); }
            to { transform: translate(-50%, -50%); }
        }

        .card {
            position: relative;
            z-index: 2;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.2);
            background: rgba(0, 0, 50, 0.8);
            backdrop-filter: blur(5px);
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h3 {
            text-shadow: 0 0 10px #00ffff, 0 0 20px #007bff;
        }

        .btn-toggle {
            cursor: pointer;
            color: #0dcaf0;
            text-decoration: underline;
        }

        .form-section {
            transition: all 0.5s ease;
        }

        .hidden {
            opacity: 0;
            height: 0;
            overflow: hidden;
        }

        /* Botones con efecto */
        .btn-primary, .btn-success {
            font-family: 'Press Start 2P', cursive;
            text-transform: uppercase;
            box-shadow: 0 0 15px rgba(0,255,255,0.4);
            transition: all 0.3s ease;
        }

        .btn-primary:hover, .btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(0,255,255,0.7);
        }

        /* Efecto de bienvenida */
        .welcome {
            text-align: center;
            font-size: 0.8rem;
            color: #00ffff;
            margin-bottom: 15px;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 5px #00ffff; }
            to { text-shadow: 0 0 20px #00ffff, 0 0 30px #007bff; }
        }

        /* Selector de idioma */
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
    </style>
</head>
<body>

<!-- Selector de idioma -->
<select id="languageSelect">
    <option value="es">Español</option>
    <option value="qu">Quechua</option>
    <option value="en">English</option>
</select>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card col-md-6 p-4">
        <div class="card-header bg-transparent border-0 text-center">
            <h3 id="title">🌍 Turismo Quest</h3>
            <p class="welcome" id="welcomeText">¡Bienvenido, viajero! Prepárate para una nueva aventura.</p>
        </div>

        {{-- Mensajes de éxito --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- LOGIN --}}
        <div id="loginForm" class="form-section">
            <h5 class="text-center mb-3 text-info" id="loginTitle">Iniciar Sesión</h5>
            <form method="POST" action="{{ route('jugadores.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="correo_login" class="form-label" id="correoLabel">Correo</label>
                    <input type="email" name="correo" id="correo_login" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password_login" class="form-label" id="passwordLabel">Contraseña</label>
                    <input type="password" name="password" id="password_login" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" id="loginBtn">Entrar</button>
            </form>

            <div class="text-center mt-3">
                <span id="noAccountText">¿No tienes cuenta?</span>
                <span class="btn-toggle" onclick="toggleForms()" id="registerToggle">Regístrate aquí</span>
            </div>
        </div>

        {{-- REGISTRO --}}
        <div id="registerForm" class="form-section hidden">
            <h5 class="text-center mb-3 text-success" id="registerTitle">Crear Cuenta</h5>
            <form method="POST" action="{{ route('jugadores.register') }}">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label" id="nameLabel">Nombre completo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label" id="genderLabel">Género</label>
                    <select name="genero" id="genero" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label" id="emailLabel">Correo electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label" id="phoneLabel">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" id="passwordRegLabel">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100" id="registerBtn">Registrar</button>
            </form>

            <div class="text-center mt-3">
                <span id="alreadyAccountText">¿Ya tienes cuenta?</span>
                <span class="btn-toggle" onclick="toggleForms()" id="loginToggle">Inicia sesión</span>
            </div>
        </div>
    </div>
</div>

{{-- MÚSICA DE FONDO --}}
<audio id="bgMusic" loop>
    <source src="https://files.catbox.moe/ocvx4c.mp3" type="audio/mpeg">
</audio>

<script>
    function toggleForms() {
        document.getElementById('loginForm').classList.toggle('hidden');
        document.getElementById('registerForm').classList.toggle('hidden');
    }

    // Música de fondo autoplay con volumen mínimo
    const music = document.getElementById("bgMusic");
    music.volume = 0.01;
    const playPromise = music.play();
    if (playPromise !== undefined) {
        playPromise.then(() => {
            setTimeout(() => { music.volume = 0.3; }, 1000);
        }).catch(() => {
            document.body.addEventListener('click', () => { music.play(); music.volume = 0.3; }, { once: true });
        });
    }

    // Traducciones para idiomas
    const translations = {
        es: {
            welcomeText: "¡Bienvenido, viajero! Prepárate para una nueva aventura.",
            loginTitle: "Iniciar Sesión",
            correoLabel: "Correo",
            passwordLabel: "Contraseña",
            loginBtn: "Entrar",
            noAccountText: "¿No tienes cuenta?",
            registerToggle: "Regístrate aquí",
            registerTitle: "Crear Cuenta",
            nameLabel: "Nombre completo",
            genderLabel: "Género",
            emailLabel: "Correo electrónico",
            phoneLabel: "Teléfono",
            passwordRegLabel: "Contraseña",
            registerBtn: "Registrar",
            alreadyAccountText: "¿Ya tienes cuenta?",
            loginToggle: "Inicia sesión"
        },
        qu: {
            welcomeText: "Rimaykullayki, rikhuylla! Ñawpaqta riqsichiykuy.",
            loginTitle: "Rikhuy Karpay",
            correoLabel: "Imaylla",
            passwordLabel: "Simi t’ika",
            loginBtn: "Rikhuy",
            noAccountText: "Manaraq cuenta?",
            registerToggle: "Rikuykuy",
            registerTitle: "Cuenta Chaykuy",
            nameLabel: "Suti",
            genderLabel: "Ch'iqnin",
            emailLabel: "Imaylla email",
            phoneLabel: "Runtu",
            passwordRegLabel: "Simi t’ika",
            registerBtn: "Chaykuy",
            alreadyAccountText: "Cuenta kanki?",
            loginToggle: "Rikhuykuy"
        },
        en: {
            welcomeText: "Welcome, traveler! Get ready for a new adventure.",
            loginTitle: "Login",
            correoLabel: "Email",
            passwordLabel: "Password",
            loginBtn: "Login",
            noAccountText: "Don't have an account?",
            registerToggle: "Register here",
            registerTitle: "Create Account",
            nameLabel: "Full Name",
            genderLabel: "Gender",
            emailLabel: "Email",
            phoneLabel: "Phone",
            passwordRegLabel: "Password",
            registerBtn: "Register",
            alreadyAccountText: "Already have an account?",
            loginToggle: "Login"
        }
    };

    const languageSelect = document.getElementById('languageSelect');
    languageSelect.addEventListener('change', () => {
        const lang = languageSelect.value;
        Object.keys(translations[lang]).forEach(id => {
            const el = document.getElementById(id);
            if (el) el.textContent = translations[lang][id];
        });
    });
</script>

</body>
</html>
