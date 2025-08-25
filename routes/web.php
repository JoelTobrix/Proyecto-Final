<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PropiedadController;
use App\Models\Propiedad;
use App\Http\AgenteController;
use App\Models\Agente;
use App\Models\Usuario;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodigoRecuperacionMail;
use Illuminate\Support\Facades\Hash;
/*
Rutas de navegacion
|
*/

//Ruta Inmobiliaria MJB
Route::get('/MJB_Quito', function () {
    return  view ('Inmobiliaria');  
     
});

Route::get('/MJB', function() {
    return view('vista');
});

//Ruta de inicio de sesion
Route::get('/inicio', function() {
    return view('login');
})->name('login');

//2.Route inicio de sesion
Route::post('/login', [UsuarioController::class, 'login'])->name('usuario.iniciar');
Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/inmobiliaria', function() {
    if (!session()->has('usuario')) {
        return redirect()->route('login')->withErrors('Debes iniciar sesión para acceder.');
    }
    $usuario = session('usuario');
    $propiedades = Propiedad::paginate(9);
    $agentes = Agente::where('rol_id', 3)->get();
    return view('inmobiliaria', compact('usuario' ,'propiedades', 'agentes'));
})->name('inmobiliaria');

Route::get('/forgot-password', function() {
    return view('forgot-password');
})->name('password.request');


Route::post('/forgot-password', function (\Illuminate\Http\Request $request) {
    $request->validate(['email' => 'required|email']);

    $usuario = Usuario::where('correo', $request->email)->first();

    if (!$usuario) {
        return back()->withErrors(['email' => 'El correo no existe en nuestros registros.']);
    }

    // Aquí iría la lógica para enviar el correo de recuperación
    return back()->with('status', 'Revise su correo, se enviarán instrucciones de recuperación.');
})->name('password.email');

Route::post('/forgot-password', function (\Illuminate\Http\Request $request) {
    $request->validate(['email' => 'required|email']);

    $usuario = Usuario::where('correo', $request->email)->first();

    if (!$usuario) {
        return back()->withErrors(['email' => 'El correo no existe en nuestros registros.']);
    }

    $codigo = random_int(100000, 999999);

    // Envía el correo
    Mail::to($request->email)->send(new CodigoRecuperacionMail($codigo));

    // Guarda el código y el correo en la sesión
    session(['codigo_recuperacion' => $codigo, 'correo_recuperacion' => $request->email]);

    // Redirige a la página para ingresar el código
    return redirect()->route('codigo.verificacion')->with('status', 'Se ha enviado un código de recuperación a tu correo.');
})->name('password.email');

Route::get('/verificar-codigo', function() {
    return view('codigo-verificacion');
})->name('codigo.verificacion');

Route::post('/verificar-codigo', function (\Illuminate\Http\Request $request) {
    $request->validate(['codigo' => 'required|digits:6']);

    if ($request->codigo == session('codigo_recuperacion')) {
        // Código correcto, redirige al formulario de cambio de contraseña
        return redirect()->route('password.reset.form');
    } else {
        return back()->with('error', 'El código ingresado es incorrecto.');
    }
})->name('codigo.verificar');

Route::get('/reset-password', function() {
    // Solo permite acceso si el correo está en sesión
    if (!session('correo_recuperacion')) {
        return redirect()->route('forgot-password');
    }
    return view('reset-password');
})->name('password.reset.form');



Route::post('/reset-password', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'password' => 'required|confirmed|min:6'
    ]);

    $correo = session('correo_recuperacion');
    $usuario = Usuario::where('correo', $correo)->first();

    if ($usuario) {
        $usuario->contrasena = Hash::make($request->password); // <-- usa 'contrasena'
        $usuario->save();

        session()->forget(['codigo_recuperacion', 'correo_recuperacion']);

        return redirect()->route('login')->with('success', 'Contraseña cambiada exitosamente. Ahora puedes iniciar sesión.');
    } else {
        return back()->withErrors(['password' => 'No se encontró el usuario.']);
    }
})->name('password.reset');

// Registro de usuario funcion controlador
Route::get('/register', [UsuarioController::class, 'mostrarFormularioRegistro'])->name('usuario.formulario');
Route::post('/register', [UsuarioController::class, 'registrar'])->name('usuario.registrar');

//Muestra propiedades
Route::get('/catalogo', [PropiedadController::class, 'index'])->name('catalogo');

//Muestra agentes vendedores
Route:: get('/agentes', [AgenteController::class,  'agentes'])->name('agentes');




//Ruta de prueba
Route::get('/page', function(){
    return view('options.pagina');
})->name('pagina');

/*
Conexion a la Base de Datos
|
*/
use Illuminate\Support\Facades\DB;

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Conexión a la base de datos exitosa";
    } catch (\Exception $e) {
        return "❌ Error en la conexión: " . $e->getMessage();
    }
});

