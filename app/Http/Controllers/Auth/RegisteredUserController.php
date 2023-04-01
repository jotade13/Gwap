<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=> ['required','string','max:255'],
            'usuario'=> ['required','string','max:255','unique:users'],
            'password'=>['required','confirmed',Rules\password::defaults()],
            'edad'=>['required','int','confirmed'],
            'sexo'=>['required','string','max:20','confirmed']
        ]);
        User::create([
            'nombre' => $request->name,
            'usuario' => $request->usuario,
            'password' => bcrypt($request->password),
            'edad' => $request->edad,
            'sexo' => $request->sexo
        ]);
        return to_route('login');
    }
}
