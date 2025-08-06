<?php

use Illuminate\Support\Facades\Route;

/*
Rutas de navegacion
|
*/

Route::get('/MJB_Quito', function () {
    return  view ('Inmobiliaria');  
     
});

Route::get('/MJB', function() {
    return view('vista');
});

Route::get('/inicio', function() {
    return view('login');
})->name('login');


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

