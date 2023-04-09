<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Juego;

class AdminController extends Controller
{
    public function index()
    {
        $partidas = Juego::get();
        $Fotos = Foto::get();

        return view('admin.admin',['partidas'=> $partidas],['fotos'=> $Fotos]);
    }
}
