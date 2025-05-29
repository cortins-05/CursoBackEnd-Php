<?php

/*
Condicionales:
IF:
    if(condicion){
        instrucciones
    }else{
        otras instrucciones
    }

Operadores de comparacion
== igual
=== identico
!= distinto
<> diferente
!== no identico
< menor que
> mayor que
<= menor igual que
>= mayor igual que
*/

//Ejemplo 1
$color = "verde";
if($color=="rojo"){
    echo 'El color es rojo';
}else{
    echo 'El color no es rojo';
}

echo '<br>';

//Ejemplo 2
$year = 2021;
if($year==2019){
    echo "Estamos en el 2019";
}else if($year<2019){
    echo "Estamos antes del 2019";
}else{
    echo "Estamos despues del 2019";
}

//Ejemplo 3
$nombre = "David Extremadura";
$edad = 112;
$ciudad = "Madrid";
$continente = "Asia";
$mayoria_de_edad = 18;

if($edad>=$mayoria_de_edad){
    echo "<h1>$nombre es mayor de edad</h1>";

    if($continente=="Europa"){
        echo "<h2>Y es de $ciudad</h1>";
    }else{
        echo '<h2>No es Europeo</h2>';
    }

}else{
    echo "<h1>$nombre es menor de edad</h1>";
}

//Ejemplo 4
$dia = 3;

if($dia==1){
    echo '<p>Es lunes</p>';
}else if($dia==2){
    echo '<p>Es martes</p>';
}else if($dia==3){
    echo '<p>Es miercoles</p>';
}else if($dia==4){
    echo '<p>Es jueves</p>';
}else if($dia==5){
    echo '<p>Es viernes</p>';
}else{
    echo '<p>Es fin de semana</p>';
}

echo '<hr>';

//SWITCH

switch($dia){
    case 1:
        echo '<p>Es lunes</p>';
        break;
    case 2:
        echo '<p>Es martes</p>';
        break;
    case 3:
        echo '<p>Es miercoles</p>';
        break;
    case 4:
        echo '<p>Es jueves</p>';
        break;
    case 5:
        echo '<p>Es viernes</p>';
        break;
    case 6:
        echo '<p>Es sabado</p>';
        break;
    default:
        echo '<p>Es domingo</p>';
        break;
}


//Operadores logicos && = y || = o


//GOTO

goto marca;

echo "<h3>Instruccion 1</h3>";
echo "<h3>Instruccion 2</h3>";
echo "<h3>Instruccion 3</h3>";
echo "<h3>Instruccion 4</h3>";

marca:
echo "<p>Me he saldo 4 echos</p>";

?>