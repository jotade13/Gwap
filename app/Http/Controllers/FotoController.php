<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Foto;
use App\Models\Caracteristica;
use Illuminate\Support\Facades\DB;


class FotoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'required|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $nombreImagen = time().'.'.$request->file('imagen')->extension();
        $request->file('imagen')->move(public_path('storage/imagenes'),$nombreImagen);

        Foto::create([
            'nombre' => $nombreImagen,
        ]);

        return back();
    }

    public function buscar(Request $request)
    {   
        $caracteristica = Caracteristica::where('texto','Like', $request->busqueda."%")
        ->where('coincidencias','>',0)->get();

        $imagenes=[];
        foreach ($caracteristica as $car)
        {    
           array_push($imagenes,$car->id_imagen);
        }
        $frecuencia = array_count_values($imagenes);
        //return $frecuencia;
        arsort($frecuencia);

      //  return $frecuencia;
        $imagen = array_intersect_key($frecuencia,$imagenes);


        $unico = array_unique($imagen);
            
                                           //ordena elementos de forma descendente
        foreach ($unico as $img => $valor)
        {  
            echo "<br>".$img;
            $foto = foto::find($img);
            echo "<img src='storage/imagenes/".$foto->nombre."' alt='imagen ".$foto->id."'>";
        }                 
    }
}
