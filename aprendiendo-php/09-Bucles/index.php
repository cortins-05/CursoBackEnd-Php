<?php

/*BUCLE WHILE
ESTRUCTURA DE CONTROL QUE ITERA O REPITE LA EJECUCION DE UNA SERIE DE INSTRUCCIONES TANTAS VECES COMO SEA NECESARIO, EN BASE A UNA CONDICIÓN

while(condición){
    bloque de instrucciones
    otra instruccion
}

*/

$numero = 0;
while($numero <= 100){
    echo $numero;

    if($numero!=100){
        echo ", ";
    }

    $numero++;
}

//Ejemplo
if(isset($_GET['numero'])){
    //Cambiar tipo de dato
    $numero = (int)$_GET['numero'];
}else{
    $numero = 1;
}

echo "<h1>Tabla de multiplicar $numero</h1>";

$contador = 0;
while($contador<=10){
    echo "$numero x $contador = ".($numero*$contador)."<br>";
    $contador++;
}

/*DO WHILE
do{
    bloque de instrucciones
}while(condicion);
*/

$edad = 18;
$contador = 0;

do{
    echo "Tienes acceso al local privado $contador<br>";
    $contador++;
}while($edad>=18&&$contador<=10);

?>