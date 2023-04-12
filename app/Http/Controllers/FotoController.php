<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Foto; 

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

    return back()->with('success','You have successfully upload image.');
}
}
