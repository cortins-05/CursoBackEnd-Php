<?php

/*FOR
for(variable_contador;condicion;incremento_contador){
    Bloque de instrucciones
}
*/

$resultado = 0;
for($i=0;$i<=100;$i++){
    $resultado = $resultado + $i;
    echo "<p>$resultado</p>";
}

echo "<h1>El resultado es: $resultado</h1>";

//BREAK
for($opc=0;$opc<=10;$opc++){
    if($opc==5){
        break;
    }
    echo "<h1>El numero es: $opc</h1>";
}

?>