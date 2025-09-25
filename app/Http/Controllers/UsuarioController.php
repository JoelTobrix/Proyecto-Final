<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;


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
    

   public function login(Request $request)
{
    $request->validate([
        'correo' => 'required|email',
        'password' => 'required'
    ]);

    $usuario = Usuario::where('correo', $request->correo)->first();

    if ($usuario && Hash::check($request->password, $usuario->contrasena)) {
        // Guardar el usuario en sesión temporalmente (sin acceso aún)
        session(['usuario_temp' => $usuario]);

        // Generar un PIN temporal de 4 dígitos
        $pin = random_int(1000, 9999);

        // Guardar PIN en la sesión
        session(['pin' => $pin]);

        // (Opcional: mostrar el PIN en pantalla mientras tanto, o enviarlo por otro medio)
        return redirect()->route('usuario.pin')->with('success', 'Ingresa el PIN generado para continuar. PIN: ' . $pin);
    }

    return back()->withErrors([
        'correo' => 'Credenciales inválidas'
    ])->withInput();
}

public function mostrarPin()
{
    // Verificamos si existe usuario temporal
    if (!session()->has('usuario_temp')) {
        return redirect()->route('login')->withErrors('Primero inicia sesión.');
    }
    return view('auth.pin'); // esta vista la vamos a crear
}

public function verificarPin(Request $request)
{
    $request->validate([
        'pin' => 'required|digits:4',
    ]);

    if ($request->pin == session('pin')) {
        // Mover usuario_temp a usuario definitivo
        session(['usuario' => session('usuario_temp')]);
        session()->forget(['usuario_temp', 'pin']);

        return redirect()->route('inmobiliaria')->with('success', 'Inicio de sesión exitoso.');
    }

    return back()->withErrors(['pin' => 'PIN incorrecto']);
}

   
}