<?php

use App\Http\Controllers\FrutaController;
use App\Http\Controllers\PeliculaController;
use App\Http\Middleware\TestYear;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo '<h1>Hola Mundo</h1>';
});

Route::get('/listado-peliculas',function(){
    $titulo = "Listado de peliculas";
    $listado = array('Batman','Spiderman','Gran Torino');
    return view('listado')
        ->with('titulo',$titulo)
        ->with('listado',$listado);
});

Route::get('/pagina-generica',function(){

    return view('pagina');
});

Route::get('/peliculas/{pagina?}', [PeliculaController::class, 'detalle'])
->name('peliculas.index');

Route::get('/detalle/{year?}',[PeliculaController::class, 'detalle'])
->name('peliculas.detalle')
->middleware(TestYear::class);

Route::get('/redirigir',[PeliculaController::class, 'redirigir']);

Route::get('/formulario',[PeliculaController::class,'formulario']);
Route::post('/recibir',[PeliculaController::class,'recibir'])->name('peliculas.recibir');

Route::group(['prefix'=>'frutas'],function(){
    Route::get('index',[FrutaController::class,'index']);
    Route::get('detail/{id}', [FrutaController::class,'detail'])->name('fruta.detail');
});