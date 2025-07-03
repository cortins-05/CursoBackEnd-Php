<?php
//Programacion Orientada a Objetos en PHP POO

//Definir una clase
class Coche{

    //Atributos
    public $color;
    public $marca; 
    public $modelo;
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

    public function setModelo($modelo){
        $this->modelo = $modelo;
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

} //Fin definicion de la clase

?>