<?php

abstract class Ordenador{
    public $encendido;
    abstract public function encender();

    public function apagar(){
        $this->encendido=false;
    }
}

class PcAsus extends Ordenador{
    public $sofware;

    public function arrancarSoftware(){
        $this->sofware=true;
    }

    public function encender(){
        $this->encendido=true;
    }

}

$ordenador = new PcAsus();
$ordenador->arrancarSoftware();
$ordenador->apagar();
var_dump($ordenador);

?>