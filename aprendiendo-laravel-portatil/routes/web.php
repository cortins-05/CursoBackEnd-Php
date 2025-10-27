<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pelicula/{titulo?}',function($titulo='No hay pelicula seleccionada'){
    return view('pelicula',array(
        'titulo'=>$titulo
    ));
})->where(array(
    'titulo' => '[a-zA-Z]+'
));