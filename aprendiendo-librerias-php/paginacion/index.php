<?php
require_once '../vendor/autoload.php';

//Conexion bd
$conexion = new mysqli("localhost", "root", "", "notas_master");
$conexion->query("set names 'utf8'");

//Consulta para contar elementos totales
$consulta = $conexion->query("select count(id) as 'total' from notas");
$numero_elementos = $consulta->fetch_object()->total;

//Hacer paginacion
$pagination = new Zebra_Pagination();

//Numero total de elementos a paginar
$pagination->records($numero_elementos);

//Numero de elementos por pagina
$elementos_por_pagina = 2;
$pagination->records_per_page($elementos_por_pagina);

$page = $pagination->get_page();

$empieza_aqui = ($page - 1) * $elementos_por_pagina;
$sql = "select * from notas limit $empieza_aqui,$elementos_por_pagina";
$notas = $conexion->query($sql);

echo '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';
while($nota=$notas->fetch_object()){
    echo "<h1>{$nota->titulo}</h1>";
    echo "<h3>{$nota->descripcion}</h3>";
}

$pagination->render();

?>