<?php

class Persona{
    public $nombre;
    public $edad;
    public $ciudad;

    function __construct($nombre, $edad, $ciudad){
        $this->nombre=$nombre;
        $this->ciudad=$ciudad;
        $this->edad=$edad;
    }

    public function __call($method, $args){
        $prefix_metodo = substr($method,0,3);
        if($prefix_metodo=="get"){
            $nombre_metodo = substr(strtolower($method),3);
            return $this->$nombre_metodo;
        }else{
            return "El metodo no existe";
        }
    }
}

$persona = new Persona("Lucas",20,"Pontevedra");
echo $persona->getNombre();
echo "<br/>";
echo $persona->comememla();

?>