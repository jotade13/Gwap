<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Juego;

class JuegoController extends Controller
{
    public function create()
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
        return 'Espera';
    }
    public function index(){
        $partidas = Juego::get();
        $idUsuario = Auth::id();
        $band=false;
        foreach ($partidas as $partida) {

            if ($partida->jugador1==$idUsuario || $partida->jugador2==$idUsuario || $partida->jugador3==$idUsuario) {

                 return view('juego.index',['partidas'=> $partida],['band'=> $band]);
            }
        }
        $band=true;
        return view('juego.index',['partidas'=> $partidas],['band'=> $band]);

    }
    public function agregarJugador(Juego $partida){
        $idUsuario = Auth::id();
        if ($partida->jugador1==$idUsuario || $partida->jugador2==$idUsuario || $partida->jugador3==$idUsuario) {

            return view('juego.partida',['partida'=>$partida]);
       }else{

           if ($partida->jugador2==0) {
               $partida->jugador2=Auth::id();
               $partida->save();
            }else {
                $partida->jugador3=Auth::id();
                $partida->save();
            }        
            return view('juego.partida',['partida'=>$partida]);
        }
    }

}
