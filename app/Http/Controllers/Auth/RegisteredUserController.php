<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;

class RegisteredUserController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> ['required','string','max:255'],
            'usuario'=> ['required','string','max:255','unique:users'],
            'password'=>['required','confirmed',Rules\password::defaults()],
            'edad'=>['required','int'],
            'sexo'=>['required','string','max:20',]
        ]);
        User::create([
            'nombre' => $request->nombre,
            'usuario' => $request->usuario,
            'contrasena' => bcrypt($request->password),
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'admin' => 'yes',
            'puntajeAcum' => 0,
            'veces_con_mas_puntos' => 0,
            'coincidenciasx2' => 0,
            'coincidenciasx3' => 0,
            'puntaje_maximo_juego' => 0
        ]);
        return to_route('login');
    }
}
