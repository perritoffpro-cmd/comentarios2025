<!DOCTYPE html>
<html>
<head>
    <title>Jugadores</title>
</head>
<body>
    <h1>Jugadores</h1>
    <ul>
        @foreach ($jugadores as $jugador)
            <li>{{ $jugador->nombre }} {{ $jugador->apellido }} - {{ $jugador->posicion }} - Nº {{ $jugador->numero }}</li>
        @endforeach
    </ul>
</body>
</html>
