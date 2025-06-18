<?php

if(is_dir("mi_carpeta")){
    mkdir("mi_carpeta",0777) or die("No se pudo crear la carpeta");
}else{
    echo "Ya existe la carpeta";
}

//rmdir("mi_carpeta");

if($gestor = opendir("./mi_carpeta")){
    while(false !== ($archivo = readdir($gestor))){
        echo $archivo."<br>";
    }
}

?>