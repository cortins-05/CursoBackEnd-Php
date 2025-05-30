<?php

/*
FUNCIONES:
Una función es un conjunto de instrucciones agrupadas bajo un nombre concreto
y que pueden reutilizarse solamente invocando a la función tantas veces como queramos.

function nombre_de_mi_funcion($parametro){
    bloque de instrucciones
}

nombre_de_mi_funcion($mi_parametro);

*/

//Ejemplo 1
function muestraNombres(){
    echo "Lucas Ortins Mendez<br>";
    echo "Lucas Ortins Mendez<br>";
    echo "Lucas Ortins Mendez<br>";
    echo "Lucas Ortins Mendez<br>";
}

//Invocar a la funcion
muestraNombres();

//Ejemplo 2
function tabla($numero){
    echo "<h3>Tabla de multiplicar del numero $numero</h3>";
    for($i=1;$i<=10;$i++){
        echo "$numero x $i = ".($numero*$i).'<br>';
    }
}

for($i=0;$i<=10;$i++){
    tabla($i);
    echo '<br><br>';
}

//Ejemplo 3

function calculadora($numero1,$numero2, $negrita = false){

    if($negrita!=false){
        echo '<h1>';
    }

    echo "Suma $numero1 + $numero2 = ".($numero1+$numero2).'<br>';
    echo "Resta $numero1 - $numero2 = ".($numero1-$numero2).'<br>';
    echo "Multiplicacion $numero1 * $numero2 = ".($numero1*$numero2).'<br>';
    echo "Division $numero1 / $numero2 = ".($numero1/$numero2).'<br>';
    echo '<br><br>';

    if($negrita!=false){
        echo '</h1>';
    }
}

calculadora(10,30,true);
calculadora(32,55);

//Ejemplo 4

function devuelve_nombre($nombre){
    $texto = "<h1>El nombre es $nombre</h1>";
    return $texto;
}

echo devuelve_nombre("Lucas");

?>