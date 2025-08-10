<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::get('/inmobiliaria', function() {
    if (!session()->has('usuario')) {
        return redirect()->route('login')->withErrors('Debes iniciar sesión para acceder.');
    }
    $usuario = session('usuario');
    return view('inmobiliaria', compact('usuario'));
})->name('inmobiliaria');



// Registro de usuario funcion controlador
//use App\Http\Controllers\UsuarioController;

Route::get('/register', [UsuarioController::class, 'mostrarFormularioRegistro'])->name('usuario.formulario');
Route::post('/register', [UsuarioController::class, 'registrar'])->name('usuario.registrar');






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

