<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Juego;

class JuegoController extends Controller
{
    public function CrearJuego()
    {
        Juego::create([
            'imagen1' => 0,
            'imagen2' => 0,
            'imagen3' => 0,
            'jugador1' => Auth::id(),
            'jugador2' => 0,
            'jugador3' => 0,
            'puntaje1' => 0,
            'puntaje2' => 0,
            'puntaje3' => 0
        ]);
        return 'hola';
    }
}
