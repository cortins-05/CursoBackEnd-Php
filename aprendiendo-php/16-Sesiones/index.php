<?php

/*
Sesión: Almacenar y persistir datos del usuario mientras que navega en un sitio web hasta que se cierra sesión o cierra el navegador.
*/

//Iniciar la sesion
session_start();

//Variable local
$variable_normal = "Soy una cadena de texto";

//Variable de sesion
$_SESSION['variable_persistente'] = "HOLA SOY UNA SESION ACTIVA";

echo $variable_normal; echo '<br>';
echo $_SESSION['variable_persistente']; echo '<br>';

?>