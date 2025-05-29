<?php

if(isset($_GET['numero1'])&&isset($_GET['numero2'])){
    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];
    for($i=$numero1+1;$i<$numero2;$i++){
        echo "$i, ";    
    }
}else{
    echo '<h1>Introduce correctamente los numeros</h1>';
    echo '<form action="Ejercicio5.php" method="GET" >
            <label>Numero 1:</label> <input type="text" name="numero1" id="">
            <label>Numero 2:</label> <input type="text" name="numero2" id="">
            <input type="submit" value="Enviar">
        </form>';
}

?>