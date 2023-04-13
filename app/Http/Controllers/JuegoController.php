<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Juego;
use App\Models\Foto;
use App\Models\Caracteristica;
use App\Models\User;

class JuegoController extends Controller
{
    public function create()
    {
        $partidas = Juego::get();
        $idUsuario = Auth::id();
        $imagenes = Foto::get();
        $i=0;
        foreach ($imagenes as $imagen)
        {
            $arregloImagenes[$i]=$imagen->id;
            $i++;
        }
        $arreglo3Imagenes = $this->arregloAleatoriode3Id($arregloImagenes);
        
        /*foreach ($partidas as $partida) {

            if ($partida->jugador1==$idUsuario&&$partida->juego_terminado=='no') {

                return view('juego.partida',['partida'=>$partida]);
            }
        }*/
        $partida=Juego::create([
            'imagen1' => $arreglo3Imagenes[0],
            'imagen2' => $arreglo3Imagenes[1],
            'imagen3' => $arreglo3Imagenes[2],
            'jugador1' => $idUsuario,
            'jugador2' => 0,
            'jugador3' => 0,
            'puntaje1' => 0,
            'puntaje2' => 0,
            'puntaje3' => 0,
            'juego_terminado' => 'no',
            'imagen_jugando' => 0
        ]);
        
        return to_route('partida',['partida'=>$partida]);
    }
    public function index(){
        $partidas = Juego::get();        
        return view('juego.principal',['partidas'=> $partidas]);

    }
    public function entrarPartida(Juego $partida){
        $idUsuario = Auth::id();
        if ($partida->jugador1==$idUsuario || $partida->jugador2==$idUsuario || $partida->jugador3==$idUsuario) {
            time();
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
    public function cargando(Juego $partida){
        $idUsuario = Auth::id();
        if ($partida->jugador1==$idUsuario || $partida->jugador2==$idUsuario || $partida->jugador3==$idUsuario&&$partida->juego_terminado=='no') 
        {
            if ($partida->jugador1!=0 && $partida->jugador2!=0 && $partida->jugador3!=0)
            {
                if($partida->imagen_jugando==0)
                {
                    $partida->tiempo_imagen = time();
                    $partida->save();
                }   
                
                return view('juego.juego',['partida'=>$partida]);              
            }else
            {   
                echo "<h1 class='text-3xl'>".$partida->id."Cargando.....</h1>";
            }
        }
    }
    public function cambioImagen(Juego $partida)
    {
        for ($i=1;$i<4;$i++)
        {
            if($partida->tiempo_imagen+(($i-1)*60)<time()&&time()<$partida->tiempo_imagen+($i*60))
            { 
                
                $aux = "imagen".$i;
                $imagenes = Foto::get();
                $imagen[$i] = $imagenes->find($partida->$aux);
                $nombreImag = $imagen[$i]->nombre;
                $partida->imagen_jugando=$imagen[$i]->id;
                $partida->save();
                echo  "<img src='../storage/imagenes/".$nombreImag."'
                        alt='imagen del juego'>";

            }
        }
    }
    public function enviarCaracteristica(Juego $partida, Request $request)
    {
      // return $request->caracteristica;
       $varImagen = "imagen".$partida->imagen_jugando;
       $caracteristica=Caracteristica::create([
        'texto' => $request->caracteristica,
        'id_juego' => $partida->id,
        'id_usuario' => auth::id(),
        'id_imagen' => $partida->imagen_jugando
    ]);
        Caracteristica::where('texto',$caracteristica->texto)->where('id_usuario','!=',$caracteristica->id_usuario);
    }
    public function mostrarCaracteristicas(Juego $partida)
    {   
        $caracteristica = Caracteristica::where('id_juego',$partida->id)->where('id_usuario',auth::id())->get();
        foreach ($caracteristica as $car ) {
            echo "".$car->texto."<br>";
        }
    }
    public function puntaje(Juego $partida)
    {
        $jugador1 = User::find($partida->jugador1);
        echo "<br>".$jugador1->usuario.": ".$partida->puntaje1."<br>";
        $jugador2 = User::find($partida->jugador2);
        echo "".$jugador2->usuario.": ".$partida->puntaje2."<br>";
        $jugador3 = User::find($partida->jugador3);
        echo "".$jugador3->usuario.": ".$partida->puntaje3;
    }


    public function arregloAleatoriode3Id($arr) 
    {       //arreglo aleatorio que recibe un arreglo y devuelve un arreglo de 3 posiciones con numeros aleatorios y que no se repiten
        $result = array();
        while (count($result) < 3) 
        {
            $rand = rand(0, count($arr) - 1);
            if (!in_array($arr[$rand], $result)) {
                array_push($result, $arr[$rand]);
            }
        }
        return $result;
    }
}
