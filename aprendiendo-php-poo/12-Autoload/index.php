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


// ESPACIOS DE NOMBRES Y PAQUETES
use MisClases\Usuario;
use MisClases\Categoria;
use MisClases\Entrada;
use PanelAdministrador\Usuario as UsuarioAdmin;

class Principal{
    public $usuario;
    public $categoria;
    public $entrada;

    public function __construct(){
        $this->usuario = new Usuario();
        $this->categoria = new Categoria();
        $this->entrada = new Entrada();
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function getEntrada(){
        return $this->entrada;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function setEntrada($entrada){
        $this->entrada = $entrada;
    }

    function informacion(){
        echo __NAMESPACE__;
    }

}

//Objeto Principal
$principal = new Principal();
$principal->informacion();
//var_dump($principal->usuario);
$metodos = get_class_methods($principal);

$busqueda = array_search('setApellidos', $metodos);
var_dump($busqueda);

//Objeto otro paquete
$usuario = new UsuarioAdmin();
$usuario->informacion();

// Comprobar si existe una clase
$clase = class_exists('PanelAdministrador\Usuario');
if($clase){
    echo "<h1>La clase SI existe</h1>";
}else{
    echo "<h1>La clase NO existe</h1>";
}

?>