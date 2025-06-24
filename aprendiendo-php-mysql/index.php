<?php

//Conectar a la base de datos
$conexion = mysqli_connect("localhost","root","","phpmysql");

//Comprobar si la conexion es correcta
if(mysqli_connect_errno()){
    echo "La conexion a la base de datos MYSQL ha fallado: ".mysqli_connect_error();
}else{
    echo "Conexion realizada correctamente!!";
}

//Consulta para configurar la codificacion de caracteres
mysqli_query($conexion,"SET names 'utf8'");

//Consulta SELECT desde PHP
$query = mysqli_query( $conexion,"select * from notas");

while($nota = mysqli_fetch_assoc($query)){
    echo "<br>";
    //var_dump($nota);
    echo "<h2>".$nota['titulo']."</h2>";
    echo $nota['descripcion'];
}


//Insertar en la base de datos desde PHP
$sql = "INSERT into notas values(3,'Nota desde PHP', 'Esto es una nota de PHP','green')";
$insert = mysqli_query( $conexion,$sql);
if($insert){
    echo "Datos insertados correctamente";
}else{
    echo "Error: ".mysqli_error($conexion);
}


?>