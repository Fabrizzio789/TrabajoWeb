<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // REGISTRAR USUARIO
    public function registrar(Request $request)
    {
        Usuario::create([

            'nombre' => $request->nombre,

            'correo' => $request->correo,

            'password' => Hash::make($request->password),

            'rol' => 'Administrador'

        ]);

        return redirect('/');
    }

    // INICIAR SESIÓN
    public function login(Request $request)
    {
        $usuario = Usuario::where(
            'correo',
            $request->correo
        )->first();

        if(!$usuario)
        {
            return back()
                ->with('error',
                'Usuario no registrado');
        }

        if(!Hash::check(
            $request->password,
            $usuario->password
        ))
        {
            return back()
                ->with('error',
                'Contraseña incorrecta');
        }

        session([
            'usuario_id' => $usuario->id,
            'nombre' => $usuario->nombre,
            'rol' => $usuario->rol
        ]);

        return redirect('/dashboard');
    }
}