<?php
//Programacion Orientada a Objetos en PHP POO

//Definir una clase
class Coche{

    //Atributos
    public $color = "Rojo";
    public $marca = "Ferrari";
    public $modelo = "Aventador";
    public $velocidad = 300;
    public $caballaje = 500;
    public $plazas = 2;

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

//Crear un objeto
$coche = new Coche();

echo $coche->getVelocidad();

echo "<br>";

$coche->color = "Amarillo";
echo "El color del coche es: ".$coche->getColor();

echo "<br>";

$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
$coche->frenar();
echo $coche->getVelocidad();

echo "<br>";

$coche2 = new Coche();
$coche2->setColor("verde");
$coche2->setModelo("gallardo");

?>