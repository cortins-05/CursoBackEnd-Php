<?php

$archivo = $_FILES['archivo'];
$nombre = $archivo['name'];
$tipo = $archivo['type'];

if($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png"){
    if(!is_dir('images')){
        mkdir('images',0777);
    }
    move_uploaded_file($archivo['tmp_name'],"images/$nombre");
    echo '<h1>Imagen subida con exito</h1>';
}else{
    echo '<h1>Hubo un error al subir la imagen</h1>';
}

?>