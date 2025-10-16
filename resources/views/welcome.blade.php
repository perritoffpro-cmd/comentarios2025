<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Inicio - Enlaces</title>
</head>
<body>
    <h1>Página de Inicio</h1>

    <nav>
        <ul>
            <li><a href="{{ route('estudiantes.index') }}">Estudiantes</a></li>
            <li><a href="{{ route('jugadores.index') }}">Jugadores</a></li>
            <li><a href="{{ route('saluditos') }}">Saludos</a></li>
            <li><a href="{{ route('bienvenidos1') }}">Bienvenido</a></li>
            <li><a href="{{ route('proyecto1') }}">Proyecto 1</a></li>
            <li><a href="{{ route('proyecto2') }}">Proyecto 2</a></li>
        </ul>
    </nav>
</body>
</html>
