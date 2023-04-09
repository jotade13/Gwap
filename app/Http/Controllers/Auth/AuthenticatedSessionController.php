<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;



class AuthenticatedSessionController extends Controller
{
    use HasRoles;

    public function username()
    {
        return 'usuario';
    }
    
    public function store(Request $request)
    {
        $credentials = $request->validate([
            $this->username() => ['required','string'],
            'password'=>['required','string']
        ]);

        if(!Auth::attempt($credentials))
        {
            throw ValidationException::withMessages([
                'usuario' => __('auth.failed'),
            ]);
        }
        $request->session()->regenerate();
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.principal');
        } else {
            return redirect()->route('principal');
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->RegenerateToken();
        return to_route('login');
    }
}
