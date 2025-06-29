<?php
function mostrarError($errores,$campo){
    $alerta = "";
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta-error'>".$errores[$campo]."</div>";
    }

    return $alerta;
}

function borrarErrores(){
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;    
    }
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;    
    }
    session_unset();
}

function conseguirCategorias($db){
    $sql = "select * from categorias order by id asc;";
    $categorias = mysqli_query($db,$sql);
    $result = array();
    if($categorias&&mysqli_num_rows($categorias)>=1){
       return $categorias;
    }
    return false;
}

function conseguirUltimasEntradas($conexion){
    $sql = "Select e.*, c.nombre as 'categoria' from entradas e inner join categorias c on e.categoria_id = c.id order by e.id desc limit 4";
    $entradas = mysqli_query($conexion,$sql);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas)>=1){
        $resultado = $entradas;
    }
    return $resultado;
}

?>