<?php

//Operadores Aritmetricos
$numero1 = 55;
$numero2 = 33;

echo "Suma:".($numero1+$numero2).'<br>';
echo 'Resta:'.($numero1-$numero2).'<br>';
echo 'Multiplicacion:'.($numero1*$numero2).'<br>';
echo 'Division:'.($numero1/$numero2).'<br>';
echo 'Resto:'.($numero1%$numero2).'<br>';

//Operadores de incremento y decremento
$year = 2019;

$year++;
$year--;
++$year;
--$year;

echo "<h1>$year</h1>";

//Operadores de asignacion
$edad = 55;

echo "$edad<br>";
$edad += 5;
echo $edad;
var_dump($edad);

?>