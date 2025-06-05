<?php

//Funciones
function mostrar_array($numeros){
    $resultado = "";
    foreach($numeros as $numero){
        $resultado .= $numero.'<br>';
    }
    echo $resultado;
}

//Crear el array
$numeros = array(11,44,55,77,23,9,97,67);

//Recorrer y mostrar
echo '<h1>Recorrer y mostrar</h1>';
echo mostrar_array($numeros);

//Ordenarlo y mostrarlo
echo '<h1>Ordenar y mostrar</h1>';
sort($numeros);
echo mostrar_array($numeros);

//Mostrar su longitud
echo '<h1>Numero total de elementos</h1>';
echo count($numeros); echo '<br>';

//Busqueda de array
$busqueda = 55;

echo "<h1>Buscar en el array el numero $busqueda";
if(array_search($busqueda,$numeros)){
    echo "<h4>El numero buscado existe en el array</h4>";
}else{
    echo "<h4>El numero buscado NO existe en el array</h4>";
}

?>