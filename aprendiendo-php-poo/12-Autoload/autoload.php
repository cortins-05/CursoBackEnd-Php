<?php

function autocargar_clases($class){
    require 'clases/'.$class.'.php';
}

spl_autoload_register('autocargar_clases');

?>