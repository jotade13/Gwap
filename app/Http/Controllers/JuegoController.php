<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Juego;

class JuegoController extends Controller
{
    public function create()
    {
        $partidas = Juego::get();
        $idUsuario = Auth::id();
        foreach ($partidas as $partida) {

            if ($partida->jugador1==$idUsuario) {

                return view('juego.partida',['partida'=>$partida]);
            }
        }
        $partida=Juego::create([
            'imagen1' => 0,
            'imagen2' => 0,
            'imagen3' => 0,
            'jugador1' => $idUsuario,
            'jugador2' => 0,
            'jugador3' => 0,
            'puntaje1' => 0,
            'puntaje2' => 0,
            'puntaje3' => 0
        ]);
        
        return view('juego.partida',['partida'=>$partida]);
    }
    public function index(){
        $partidas = Juego::get();        
        return view('juego.principal',['partidas'=> $partidas]);

    }
    public function agregarJugador(Juego $partida){
        $idUsuario = Auth::id();
        if ($partida->jugador1==$idUsuario || $partida->jugador2==$idUsuario || $partida->jugador3==$idUsuario) {

            return view('juego.partida',['partida'=>$partida],['band'=>true]);
       }else{

           if ($partida->jugador2==0) {
               $partida->jugador2=Auth::id();
               $partida->save();
            }else {
                $partida->jugador3=Auth::id();
                $partida->save();
            }        
            return view('juego.partida',['partida'=>$partida],['band'=>true]);
        }
    }
    public function cargando(){
        $partidas = Juego::get();
        $idUsuario = Auth::id();
        foreach ($partidas as $partida) {

            if ($partida->jugador1==$idUsuario || $partida->jugador2==$idUsuario || $partida->jugador3==$idUsuario) {
                
                if ($partida->jugador1!=0 && $partida->jugador2!=0 && $partida->jugador3!=0){
                    echo "<h1>Espacio para imagen</h1>";
                    echo "<input type='text'>";
                    return view('juego.juego');
                    
                    
                }else{
                    
                    echo "<h1>".$partida->id."Cargando.....</h1>";
                }
            }
        }
       
    }

}
