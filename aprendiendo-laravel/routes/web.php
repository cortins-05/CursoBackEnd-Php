<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/*
GET: Conseguir datos
POST: Guardar datos
PUT: Actualizar recursos
DELETE: Eliminar recursos 
*/

Route::get('/mostrar-fecha',function(){
    $titulo = "Estoy mostrando la fecha";
    return view('mostrar-fecha', array(
        'titulo'=>$titulo
    ));
});

Route::get('/pelicula/{titulo?}',function($titulo='No hay una pelicula seleccionada'){
    return view('pelicula',array(
        'titulo'=>$titulo
    ));
});