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


