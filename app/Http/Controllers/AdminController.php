<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Juego;
use App\Models\User;
use App\Models\Caracteristica;

class AdminController extends Controller
{
    public function index()
    {
        $partidas = Juego::get();
        $Fotos = Foto::get();
        // $usuarios = User::get();
        $part = Array();
        $i = 0;
        foreach ($partidas as $partida) {
            if($partida->jugador2!=0 && $partida->jugador3!=0 ){

                $jug1=User::find($partida->jugador1);
                $jug2=User::find($partida->jugador2);
                $jug3=User::find($partida->jugador3);
                $part[$i] = array(
                    "id" => "$partida->id",
                    "jugador1" => "$jug1->usuario",
                    "jugador2" => "$jug2->usuario",
                    "jugador3" => "$jug3->usuario"
                    
                );                
                $i++;
            }
        }

        return view('Admin.Admin',['partidas'=> $part],['fotos'=> $Fotos]);
    }
    public function mostrarCaracteristicas(Juego $partida){

        $img1=Foto::find($partida->imagen1);
        $img2=Foto::find($partida->imagen2);
        $img3=Foto::find($partida->imagen3);
        
        $jug1=User::find($partida->jugador1);
        $jug2=User::find($partida->jugador2);
        $jug3=User::find($partida->jugador3);
        $part = array(
            "imagen2" => $img2,
            "imagen3" => $img3,
            "imagen1" => $img1,
            "jugador1" => $jug1,
            "jugador2" => $jug2,
            "jugador3" => $jug3            
        );                
        $caracteriticas=Caracteristica::get();
        return view('admin.mosCaract',['partida'=>$part],['carac'=>$caracteriticas]);
    }

}
