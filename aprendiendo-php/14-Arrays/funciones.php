<?php

$cantantes = ['2pac','Drake','Jennifer Lopez','Alfredo'];
$numeros = [1,2,5,8,3,4];

//Ordenar
sort($cantantes);
var_dump($cantantes); echo '<br>';

//Añadir elemento a un array
$cantantes[]="Natos";
array_push($cantantes,"Waor");

//Eliminar elementos del array
array_pop($cantantes);
unset($cantantes[2]);

//Aleatorio
$indice = array_rand($cantantes);
echo $cantantes[$indice]; echo '<br>';

//Dar la vuelta
array_reverse($numeros);

//Buscar dentro de un array
$resultado = array_search('Alfredo',$cantantes);
var_dump($resultado); echo '<br>';

//Contar numero de elementos
echo sizeof($cantantes); echo '<br>';

var_dump($cantantes); echo '<br>';
var_dump($numeros);



?>