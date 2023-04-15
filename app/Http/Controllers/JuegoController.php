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
        $arregloImagenes = Array();
        foreach ($imagenes as $imagen)
        {
            $arregloImagenes[$i]=$imagen->id;
            $i++;
        }
        $arreglo3Imagenes = $this->arregloAleatoriode3Id($arregloImagenes);
        
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

        if($partida->jugador1 == $idUsuario){
            $jug1=User::find($partida->jugador1);
            $jug2=User::find($partida->jugador2);
            $jug3=User::find($partida->jugador3);
        }
        if($partida->jugador2 == $idUsuario){
            $jug1=User::find($partida->jugador2);
            $jug2=User::find($partida->jugador1);
            $jug3=User::find($partida->jugador3);
        }
        if($partida->jugador3 == $idUsuario){
            $jug1=User::find($partida->jugador3);
            $jug2=User::find($partida->jugador1);
            $jug3=User::find($partida->jugador2);
        }
       
        $jugadores = array(
            "jugador1" => $jug1,
            "jugador2" => $jug2,
            "jugador3" => $jug3            
        );
        $caracteristicas = Caracteristica::get();
        $i=0;
        $caract=Array();        
        foreach ($caracteristicas as $caracteristica) {
            if($caracteristica->id_juego == $partida->id){
                $caract[$i]=$caracteristica;
            }
            $i++;
        }

        if ($partida->juego_terminado=="si") {    
            // return $caracteristicas;        
            return view('juego.juegoTerminado',['jugadores'=>$jugadores],['caracteristicas'=>$caract]);
        }
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
                echo "<div class='h-full flex justify-center items-center'>
                <h1 class='text-3xl'>".$partida->id."Cargando.....</h1>
                </div>";
            }
        }
    }
    public function cambioImagen(Juego $partida)
    {
        $tiempoImagenSegundos = 10;
        $bandTermino=true;
        for ($i=1;$i<4;$i++)
        {
            if(($partida->tiempo_imagen+($i-1)*$tiempoImagenSegundos)<=time()&&time()<($partida->tiempo_imagen+$i*$tiempoImagenSegundos))
            { 
                
                $aux = "imagen".$i;
                $imagenes = Foto::get();
                $imagen[$i] = $imagenes->find($partida->$aux);
                $nombreImag = $imagen[$i]->nombre;
                $partida->imagen_jugando=$imagen[$i]->id;
                $partida->save();
                echo  "<img class='h-5/6 w-5/6 ' src='../storage/imagenes/".$nombreImag."'
                        alt='imagen del juego'>";
                $bandTermino=false;
            }
        }
        $this->termino($bandTermino,$partida);
    }
    public function termino($bandTermino,Juego $partida)
    {
        if($bandTermino&&$partida->juego_terminado=='no')
        {
            $partida->juego_terminado='si';
            $partida->save(); 
           

            $this->actualizarEstadisticas($partida);
        }
        if($partida->juego_terminado=='si'){
            echo "<script> clearInterval(cambiarImagen)</script>";
            echo "<script> comprobar = setInterval('comprobar_jugadores_en_la_partida()',1000);</script>";
            echo "<h1>Juego  Terminado </h1>";
        }
        //  echo "<h1>Juego  Terminado </h1>";
    }
    public function actualizarEstadisticas(Juego $partida)
    {
        $jugador1 = User::find($partida->jugador1);
        $jugador1->puntajeAcum = $jugador1->puntajeAcum + $partida->puntaje1;
        if($partida->puntaje1>$jugador1->puntaje_maximo_juego)
        {
            $jugador1->puntaje_maximo_juego = $partida->puntaje1;
        }
        if($partida->puntaje1>=$partida->puntaje2&&$partida->puntaje1>=$partida->puntaje3)
        {
            $jugador1->veces_con_mas_puntos++;
        }
        $jugador1->save();
        
        $jugador2 = User::find($partida->jugador2);
        $jugador2->puntajeAcum = $jugador2->puntajeAcum + $partida->puntaje2;
        if($partida->puntaje2>$jugador2->puntaje_maximo_juego)
        {
            $jugador2->puntaje_maximo_juego = $partida->puntaje2;
        }
        if($partida->puntaje2>=$partida->puntaje1&&$partida->puntaje2>=$partida->puntaje3)
        {
            $jugador2->veces_con_mas_puntos++;
        }
        $jugador2->save();

        $jugador3 = User::find($partida->jugador3);
        $jugador3->puntajeAcum = $jugador3->puntajeAcum + $partida->puntaje3;
        if($partida->puntaje3>$jugador3->puntaje_maximo_juego)
        {
            $jugador3->puntaje_maximo_juego = $partida->puntaje3;
        }
        if($partida->puntaje3>=$partida->puntaje1&&$partida->puntaje3>=$partida->puntaje2)
        {
            $jugador3->veces_con_mas_puntos++;
        }
        $jugador3->save();

        $this->contarCaracteristicasPartida($partida);
    }
    public function contarCaracteristicasPartida(Juego $partida)
    {
        for($i=1;$i<3;$i++)
        {
            $caracteristicas = Caracteristica::where('id_juego',$partida->id)->
                                where('coincidencias',$i)->get();
            foreach ($caracteristicas as $car )
            {
                $usuario = User::find($car->id_usuario);
                if($i==1)
                {
                    $usuario->coincidenciasx2++;
                    $usuario->save();
                }else
                {
                    $usuario->coincidenciasx3++;
                    $usuario->save();
                }
            }                  
        }
    }
    public function enviarCaracteristica(Juego $partida, Request $request)
    {
       $request->caracteristica;
       $caract = Caracteristica::where('texto',$request->caracteristica)->
       where('id_juego',$partida->id)->where('id_usuario',auth::id())->
       where('id_imagen',$partida->imagen_jugando)->get();
       if($caract->isEmpty()&&$partida->juego_terminado=="no")
       {
            $varImagen = "imagen".$partida->imagen_jugando;
            $caracteristica=Caracteristica::create
            ([
                'texto' => $request->caracteristica,
                'id_juego' => $partida->id,
                'id_usuario' => auth::id(),
                'id_imagen' => $partida->imagen_jugando,
                'coincidencias' => 0
            ]);

            $caracteriticasIguales = Caracteristica::where('texto',$caracteristica->texto)
            ->where('id_juego',$caracteristica->id_juego)->where('id_imagen',$caracteristica->id_imagen)->get();

            $cantCaractIgual = $this->buscarCoincidencias($caracteriticasIguales);
            
            if($cantCaractIgual>1)
            {
                foreach ($caracteriticasIguales as $car) {
                    if($car->id_usuario==$partida->jugador1)
                    {
                        if($partida->jugador1!=auth::id()&&$car->coincidencias==2)
                        {
                            $partida->puntaje1=$partida->puntaje1-100;
                        }
                        $partida->puntaje1=$partida->puntaje1+100*$car->coincidencias;
                        $partida->save();
                    }
                    if($car->id_usuario==$partida->jugador2)
                    {
                        if($partida->jugador2!=auth::id()&&$car->coincidencias==2)
                        {
                            $partida->puntaje2=$partida->puntaje2-100;
                        }
                        $partida->puntaje2=$partida->puntaje2+100*$car->coincidencias;
                        $partida->save();
                    }
                    if($car->id_usuario==$partida->jugador3)
                    {
                        if($partida->jugador3!=auth::id()&&$car->coincidencias==2)
                        {
                            $partida->puntaje3=$partida->puntaje3-100;
                        }
                        $partida->puntaje3=$partida->puntaje3+100*$car->coincidencias;
                        $partida->save();
                    }
                }
            }
       }
    }
    public function  buscarCoincidencias($caracteriticasIguales)
    {
        $cantCaractIgual = $caracteriticasIguales->count();
        
            foreach ($caracteriticasIguales as $car)
            {
                if($cantCaractIgual==3)
                {
                    $car->coincidencias = 2;            
                    $car->save();
                }   
                if($cantCaractIgual==2)
                {
                    $car->coincidencias = 1;            
                    $car->save();
                }  
            }
        return $cantCaractIgual;
    }
    public function mostrarCaracteristicas(Juego $partida)
    {   
        $caracteristica = Caracteristica::where('id_juego',$partida->id)->where('id_usuario',auth::id())->get();
        foreach ($caracteristica as $car ) {
            echo "<h1 class='w-full ml-2 text-xl '>".$car->texto."</h1>";
        }
    }
    public function puntaje(Juego $partida)
    {
        $jugador1 = User::find($partida->jugador1);
        echo "<h1 class='ml-2 text-xl'>".$jugador1->usuario.": ".$partida->puntaje1."</h1>";
        $jugador2 = User::find($partida->jugador2);
        echo "<h1 class='ml-2 text-xl'>".$jugador2->usuario.": ".$partida->puntaje2."</h1>";
        $jugador3 = User::find($partida->jugador3);
        echo "<h1 class='ml-2 text-xl'>".$jugador3->usuario.": ".$partida->puntaje3."</h1>";
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
