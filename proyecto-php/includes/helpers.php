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
        unset($_SESSION['errores']);
    }
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);       
    }
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

function conseguirCategoria($db,$id){
    $sql = "select * from categorias where id=$id;";
    $categorias = mysqli_query($db,$sql);
    $result = array();
    if($categorias&&mysqli_num_rows($categorias)>=1){
       $result = mysqli_fetch_assoc($categorias);
       return $result;
    }
    return false;
}

function conseguirEntrada($conexion, $id){
    $sql = "select e.*, c.nombre as 'categoria', concat(u.nombre, ' ', u.apellidos) as usuario from entradas e inner join categorias c on e.categoria_id = c.id inner join usuarios u on e.usuario_id = u.id where e.id = $id;";
    $entrada = mysqli_query($conexion,$sql);
    $resultado = array();
    if($entrada && mysqli_num_rows($entrada)>=1){
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
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

function conseguirEntradas($conexion,$limit=null,$categoria = null,$busqueda=null){
    $sql = "Select e.*, c.nombre as 'categoria' from entradas e inner join categorias c on e.categoria_id = c.id";
    if(!empty($categoria)){
        $sql .= " where e.categoria_id = $categoria";
    }
    if(!empty($busqueda)){
        $sql .= " where e.titulo like '%$busqueda%'";
    }
    $sql .= " order by e.id desc";
    if($limit!=null){
        $sql .= " limit $limit";
    }
    $entradas = mysqli_query($conexion,$sql);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas)>=1){
        $resultado = $entradas;
    }
    return $resultado;
}

?>