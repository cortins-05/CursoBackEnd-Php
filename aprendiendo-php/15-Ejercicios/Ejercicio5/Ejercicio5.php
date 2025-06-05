<?php

$tabla = array(
    "ACCION" => array("GTA 5", "Call Of Duty", "PUGB"),
    "AVENTURA" => array("Assasins Creed","Crash Bandicoot", "Prince of Persia"),
    "DEPORTES" => array("Fifa 19","PES 19", "Moto GP 19")
);

$categorias = array_keys($tabla);

?>

<table border="1">
    <?php require_once'Encabezados.php';?>
    <?php require_once'Primera.php';?>
    <?php require_once'Segunda.php';?>
    <?php require_once'Tercera.php';?>
</table>