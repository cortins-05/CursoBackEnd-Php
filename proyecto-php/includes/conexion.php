<?php
//Conexion
$server = "localhost";
$username = "root";
$password = "";
$database = "blog";
$db = mysqli_connect($server,$username,$password,$database);

mysqli_query($db,"set names 'utf8'");


?>