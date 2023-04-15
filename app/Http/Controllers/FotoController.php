<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Foto;
use App\Models\Caracteristica;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;



class FotoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'required|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $nombreImagen = time().'.'.$request->file('imagen')->extension();
        $request->file('imagen')->move(public_path(),$nombreImagen);

        Foto::create([
            'nombre' => $nombreImagen,
        ]);

        return back();
    }

    public function buscar(Request $request)
    {  
        $busqueda = $request->busqueda;

        $buscar = explode(" ", $busqueda);
        $imagenes=[];

        foreach ($buscar as $bus)
        {
            $caracteristica = Caracteristica::where('texto','Like',"%".$bus."%")
            ->where('coincidencias','>',0)->get();

            $imagenTemporal=[];
            $band=false;
           
            foreach ($caracteristica as $car)
            {
                if(empty($imagenes)or$band)
                {
                    array_push($imagenes,$car->id_imagen);
                    $band = true;
                }
                else
                {
                    array_push($imagenTemporal,$car->id_imagen);
                }
            }
            if(!empty($imagenTemporal))
            {
                $resultado = array_intersect($imagenes,$imagenTemporal);
                $imagenes = $resultado;
            }
        }

        /*$caracteristica = Caracteristica::where('texto','Like',"%".$request->busqueda."%")
        ->where('coincidencias','>',0)->get();

        $imagenes=[];
        foreach ($caracteristica as $car)
        {    
           array_push($imagenes,$car->id_imagen);
        }
        */
        $frecuencia = array_count_values($imagenes);
        arsort($frecuencia);
        $imagen = array_intersect_key($frecuencia,$imagenes);
        $unico = array_unique($imagen); 
                                         //ordena elementos de forma descendente
        if(empty($unico))
        {
            echo "<h1 class='text-white ml-3'>No se encontró ninguna imagen en la busqueda</h1>";
        }else
        {
            foreach ($unico as $img => $valor)
            {  
                $foto = foto::find($img);
                echo "<img class='mt-3 ml-3 mb-1 pr-6' src='storage/imagenes/".$foto->nombre."' alt='imagen ".$foto->id."'>";
            }   
        }                                             
    }
}
