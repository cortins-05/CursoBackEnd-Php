<?php
require_once 'clases.php';

$persona = new Persona();
$persona->setNombre("Lucas");
var_dump($persona);

$informatico = new Informatico();
var_dump($informatico);

$tecnico = new TecnicoRedes();
var_dump($tecnico);

?>