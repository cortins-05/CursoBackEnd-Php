<?php

class database{
    public static function conectar(){
        $conexion = new mysqli("localhost", "root", "", "notas_master");
        $conexion->query("set names 'utf8'");

        return $conexion;
    }
}

?>