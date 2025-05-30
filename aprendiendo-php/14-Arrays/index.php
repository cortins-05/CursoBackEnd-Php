<?php

/*
ARRAYS
Un array es una coleccion o un conjunto de datos bajo un unico nombre.
Para acceder a esos valores podemos usar un indice numerico o alfanumerico
*/

$pelicula = "Batman";
$peliculas = array("Batman","Spiderman","El señor de los anillos");
$cantantes = ['2pac','Drake','Jeniffer Lopez'];

//Array asociativo
$personas = array(
    'nombre' => 'Lucas',
    'apellidos' => 'Ortins Mendez',
    'web' => 'cooortins.ddns.net'
);

var_dump($personas); echo '<br>';

var_dump($pelicula[2]); echo '<br>';
var_dump($cantantes); echo '<br>';

//Recorrer con for
echo '<h1>Listado de peliculas</h1>';
for($i=0;$i<count($peliculas);$i++){
    echo $peliculas[$i]; echo '<br>';
}

//Recorrer con foreach
echo '<h1>Listado de cantantes</h1>';
foreach($cantantes as $cantante){
    echo $cantante; echo '<br>';
}

//Array multidimensionales
$contactos = array(
    array(
        'nombre' => 'Antonio',
        'email' => 'antonio@antonio.com'
    ),
    array(
        'nombre' => 'Luis',
        'email' => 'luis@luis.com'
    ),
    array(
        'nombre' => 'Salvador',
        'email' => 'salva@salva.com'
    )
);

echo $contactos[1]['nombre']; echo '<br>';

foreach($contactos as $contacto){
    var_dump($contacto); echo '<br>';
}

?>