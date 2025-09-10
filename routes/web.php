<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PropiedadController;       
use App\Http\Controllers\AgenteController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ConsultaController;
use App\Models\Propiedad;
use App\Models\Agente;
use App\Models\Usuario;
use App\Models\Cita;
use App\Models\Consulta;
use Illuminate\Support\Facades\Mail;
use App\Mail\CodigoRecuperacionMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
Rutas de navegación
*/

// Ruta Inmobiliaria MJB
Route::get('/MJB_Quito', function () {
    return view('Inmobiliaria');  
});

Route::get('/MJB', function() {
    return view('vista');
});

// Ruta de inicio de sesión
Route::get('/inicio', function() {
    return view('login');
})->name('login');

Route::post('/login', [UsuarioController::class, 'login'])->name('usuario.iniciar');
Route::get('/login', function() {
    return view('login');
})->name('login');

// Página principal inmobiliaria
Route::get('/inmobiliaria', function() {
    if (!session()->has('usuario')) {
        return redirect()->route('login')->withErrors('Debes iniciar sesión para acceder.');
    }

    $usuario = session('usuario');
    $propiedades = Propiedad::paginate(9);
    $agentes = Agente::where('rol_id', 3)->get();
    $citas = Cita::with('propiedad')->get(); 
    $consultas = Consulta::with(['propiedad', 'agente'])->get();
    $reservadas = Propiedad::whereHas('citas', function($query){
    $query->where('estado', 'aceptada');
          })->with('citas')->get();


    return view('inmobiliaria', compact('usuario', 'propiedades', 'agentes', 'citas', 'consultas', 'reservadas'));
})->name('inmobiliaria');

/* -----------------------------
   Recuperación de contraseña
--------------------------------*/
Route::get('/forgot-password', function() {
    return view('forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $usuario = Usuario::where('correo', $request->email)->first();

    if (!$usuario) {
        return back()->withErrors(['email' => 'El correo no existe en nuestros registros.']);
    }

    $codigo = random_int(100000, 999999);

    Mail::to($request->email)->send(new CodigoRecuperacionMail($codigo));

    session(['codigo_recuperacion' => $codigo, 'correo_recuperacion' => $request->email]);

    return redirect()->route('codigo.verificacion')->with('status', 'Se ha enviado un código de recuperación a tu correo.');
})->name('password.email');

Route::get('/verificar-codigo', function() {
    return view('codigo-verificacion');
})->name('codigo.verificacion');

Route::post('/verificar-codigo', function (Request $request) {
    $request->validate(['codigo' => 'required|digits:6']);

    if ($request->codigo == session('codigo_recuperacion')) {
        return redirect()->route('password.reset.form');
    } else {
        return back()->with('error', 'El código ingresado es incorrecto.');
    }
})->name('codigo.verificar');

Route::get('/reset-password', function() {
    if (!session('correo_recuperacion')) {
        return redirect()->route('forgot-password');
    }
    return view('reset-password');
})->name('password.reset.form');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'password' => 'required|confirmed|min:6'
    ]);

    $correo = session('correo_recuperacion');
    $usuario = Usuario::where('correo', $correo)->first();

    if ($usuario) {
        $usuario->contrasena = Hash::make($request->password);
        $usuario->save();

        session()->forget(['codigo_recuperacion', 'correo_recuperacion']);

        return redirect()->route('login')->with('success', 'Contraseña cambiada exitosamente. Ahora puedes iniciar sesión.');
    } else {
        return back()->withErrors(['password' => 'No se encontró el usuario.']);
    }
})->name('password.reset');

/* -----------------------------
   Usuarios
--------------------------------*/
Route::get('/register', [UsuarioController::class, 'mostrarFormularioRegistro'])->name('usuario.formulario');
Route::post('/register', [UsuarioController::class, 'registrar'])->name('usuario.registrar');

/* -----------------------------
   Propiedades
--------------------------------*/
// Catálogo de propiedades
Route::get('/catalogo', [PropiedadController::class, 'index'])->name('catalogo');

// Mostrar listado de propiedades
Route::get('/propiedades', [PropiedadController::class, 'index'])->name('propiedades.index');

// Formulario para asignar nueva propiedad
Route::get('/propiedades/create', [PropiedadController::class, 'create'])->name('propiedades.create');

// Guardar nueva propiedad
Route::post('/propiedades', [PropiedadController::class, 'store'])->name('propiedades.store');

// Mostrar listado de propiedades y terrenos
Route::get('/propiedades/administrar', [PropiedadController::class, 'administrar'])->name('propiedades.administrar');

// Editar propiedad
Route::get('/propiedades/{id}/editar', [PropiedadController::class, 'editar'])->name('propiedades.editar');

// Actualizar propiedad
Route::put('/propiedades/{id}', [PropiedadController::class, 'actualizar'])->name('propiedades.update');

// Eliminar propiedad
Route::delete('/propiedades/{id}/eliminar', [PropiedadController::class, 'eliminar'])->name('propiedades.eliminar');

// Propiedades reservadas
Route::get('/propiedades/reservadas', [PropiedadController::class, 'reservadas'])
     ->name('propiedades.reservadas');


/* -----------------------------
   Agentes
--------------------------------*/
Route::get('/agentes', [AgenteController::class,  'agentes'])->name('agentes');

/* -----------------------------
   Citas
--------------------------------*/
// Crear nueva cita
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');

// Aceptar cita
Route::post('/citas/{id}/aceptar', [CitaController::class, 'aceptar'])->name('citas.aceptar');

// Rechazar cita
Route::delete('/citas/{id}/rechazar', [CitaController::class, 'rechazar'])->name('citas.rechazar');

// Listado de citas (opcional para administración)
Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');

/* -----------------------------
   Consultas
--------------------------------*/
Route::get('/consultas', [ConsultaController::class, 'index'])->name('consultas.index');
Route::get('/consultas/{id}', [ConsultaController::class, 'show'])->name('consultas.show');
Route::post('/consultas', [ConsultaController::class, 'store'])->name('consultas.store');
Route::post('/consultas/{id}/responder', [ConsultaController::class, 'responder'])->name('consultas.responder');
Route::put('/consultas/{id}/cerrar', [ConsultaController::class, 'cerrar'])->name('consultas.cerrar');

/* -----------------------------
   Prueba
--------------------------------*/
Route::get('/page', function(){
    return view('options.pagina');
})->name('pagina');

/*
Conexion a la Base de Datos
*/
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Conexión a la base de datos exitosa";
    } catch (\Exception $e) {
        return "❌ Error en la conexión: " . $e->getMessage();
    }
});
