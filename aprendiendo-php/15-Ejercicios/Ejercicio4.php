<?php

$matriz = array("hola mundo", 88);
$titulo = "Master en PHP";
$numero = 77;
$verdadero = true;

if(is_array($matriz)){
    echo "<h1>El array es un array</h1>";
}

if(is_string($titulo)){
    echo "<h1>$titulo</h1>";
}

if(is_integer($numero)){
    echo "<h1>$numero</h1>";
}

if(is_bool($verdadero)){
    echo "<h1>El booleano es verdadero</h1>";
}

?>