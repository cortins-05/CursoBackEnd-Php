<?php

require_once 'autoload.php';

// $usuario = new Usuario();
// echo $usuario->nombre;
// echo '<br/>';
// echo $usuario->email;
// echo '<br/>';

// $categoria = new Categoria();
// echo $categoria->nombre;
// echo '<br/>';

use MisClases\Usuario;
class Principal{
    public $usuario;
    public $categoria;
    public $entrada;

    public function __construct(){
        $this->usuario = new Usuario();
        $this->categoria = new MisClases\Categoria();
        $this->entrada = new MisClases\Entrada();
    }
}

?>