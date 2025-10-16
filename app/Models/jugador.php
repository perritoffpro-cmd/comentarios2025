<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $guarded = [];

    protected $table = 'jugadores'; // Forzar el nombre correcto de la tabla
}
