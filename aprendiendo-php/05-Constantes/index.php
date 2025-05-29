<?php

//Constantes
//Es un contenedor de información que no puede variar

define('nombre','Lucas Ortins');
define('web','lucasortins.web');

echo '<h1>'.nombre.'</h1>';
echo '<h1>'.web.'</h1>';

//Variable
$web = "lucasortins.academy.web";
echo '<h1>'.$web.'</h1>';

//Constantes predefinidas

echo '<p>'.PHP_OS.'</p>';
echo '<p>'.PHP_VERSION.'</p>';
echo '<p>'.PHP_EXTENSION_DIR.'</p>';
echo '<p>'.__LINE__.'</p>';
echo '<p>'.__FILE__.'</p>';

function holaMundo(){
    echo __FUNCTION__;
}
holaMundo()


?>