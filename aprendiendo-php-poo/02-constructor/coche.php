<?php
//Programacion Orientada a Objetos en PHP POO

//Definir una clase
class Coche{

    //Atributos

    //PUBLIC: Podemos acceder desde cualquier lugar, dentro de la clase actual
    //        dentro de clases que hereden esta clase o fuera de la clase
    public $color;
    
    //PROTECTED: Podemos acceder desde la clase que los define y desde clases
    // que hereden esta clase
    protected $marca; 

    //PRIVATE: unicamente se puede acceder desde esta clase
    private $modelo;
    public $velocidad;
    public $caballaje;
    public $plazas;

    public function __construct($color,$marca,$modelo,$velocidad,$caballaje,$plazas){
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->caballaje = $caballaje;
        $this->plazas = $plazas;
    }

    //Metodos (acciones)
    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function acelerar(){
        $this->velocidad++;
    }

    public function frenar(){
        $this->velocidad--;
    }

    public function getVelocidad(){
        return $this->velocidad;
    }

    public function mostrarInformacion(Coche $miObjeto){
        $informacion = "<h1>Informacion del coche</h1>";
        $informacion .= "<h2>Color: ".$miObjeto->color."</h2>";
        $informacion .= "<h2>Modelo: ".$miObjeto->modelo."</h2>";
        $informacion .= "<h2>Velocidad: ".$miObjeto->velocidad."</h2>";
        return $informacion;
    }

} //Fin definicion de la clase

?>