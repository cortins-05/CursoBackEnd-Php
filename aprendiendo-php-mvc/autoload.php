<?php

function autoCargar($className){
    include 'controllers/' . $className . '.php';
}

spl_autoload_register('autoCargar');

?>