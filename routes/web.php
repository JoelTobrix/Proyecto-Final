<?php

use Illuminate\Support\Facades\Route;

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


//Ruta de registro
Route::get('/register', function() {
    return view('register.registro');
})->name('registro');

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

