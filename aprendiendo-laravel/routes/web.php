<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listado-peliculas',function(){
    $titulo = "Listado de peliculas";
    $listado = array('Batman','Spiderman','Gran Torino');
    return view('listado')
        ->with('titulo',$titulo)
        ->with('listado',$listado);
});