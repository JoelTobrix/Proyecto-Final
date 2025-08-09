<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Rol;

class UsuarioController extends Controller
{
    public function registrar(Request $request)
    {
        $request->validate([
            'nombre'     => 'required|string|max:255',
            'apellido'   => 'required|string|max:255',
            'direccion'  => 'required|string|max:255',
            'telefono'   => 'required|string|max:20',
            'correo'     => 'required|email|unique:usuarios,correo',
            'password'   => 'required|confirmed|min:6',
            'rol_id'     => 'required|exists:roles,RollId',
        ]);

        Usuario::create([
            'nombre'     => $request->nombre,
            'apellido'   => $request->apellido,
            'direccion'  => $request->direccion,
            'telefono'   => $request->telefono,
            'correo'     => $request->correo,
            'contrasena' => bcrypt($request->password),
            'rol_id'     => $request->rol_id,
        ]);

        return redirect()->route('usuario.formulario')->with('success', 'Usuario registrado correctamente.');
    }

    public function mostrarFormularioRegistro()
    {
        $roles = Rol::all();
        return view('register.registro', compact('roles'));
    }
}
