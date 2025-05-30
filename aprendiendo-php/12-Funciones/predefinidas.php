<?php

//Debuggear
$nombre = "Lucas Ortins";
var_dump($nombre);
echo '<br>';

//Fecha
echo date('d-m-y'); echo '<br>';
echo time(); echo '<br>';

//Matematicas
echo "Raiz cuadrada de 10: ".sqrt(10); echo '<br>';
echo "Numero aleatorio entre 10 y 40: ".rand(10,41); echo '<br>';
echo "Numero PI: ".pi(); echo '<br>';
echo "Redondear: ".round(7.891234,2); echo '<br>';

//Mas funciones generales
echo gettype($nombre); echo '<br>';

//Detectar tipado
if(is_string($nombre)){
    echo "Esa variable es un string"; echo '<br>';
}else if(is_float($nombre)){
    echo "La variable nombre es un float"; echo '<br>';
}

//Comprobar si existe una variable
if(isset($edad)){
    echo "La variable existe"; echo '<br>';
}else{
    echo "La variable no existe"; echo '<br>';
}

//Limpiar espacios
$frase = "     mi contenido    ";
var_dump($frase); echo '<br>';
var_dump(trim($frase)); echo '<br>';
echo $frase; echo '<br>';

//Eliminar variables o indices
$year = 2020;
unset($year);

//Comprobar variable vacia
$texto = null;
if(empty($texto)){
    echo "La variable texto esta vacia";echo '<br>';
}else{
    echo "La variable texto tiene contenido"; echo '<br>';
}

// Contar caracteres de una cadena
$cadena = "12345";
echo strlen($cadena);echo '<br>';

// Encontrar caracterer
$frase = "La vida es bella";
echo strpos($frase,"vida"); echo '<br>';

//Reemplazar palabras de un string
$frase = str_replace("vida","moto",$frase);
echo $frase; echo '<br>';

//Mayusculas y minusculas
echo strtolower($frase); echo '<br>';
echo strtoupper($frase); echo '<br>';


?>