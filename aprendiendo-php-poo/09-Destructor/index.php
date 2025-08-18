<?php

class Usuario{
    public $nombre;
    public $email;

    public function __construct(){
        $this->nombre="Lucas Ortins Mendez";
        $this->email="lucasortins@gmail.com";
        echo "<p>Instancia del objeto creada</p>";
    }

    public function __tostring(){
        return "Hola, ".$this->nombre.", estas registrado con {$this->email}";
    }

    public function __destruct(){
        echo "<p>Destruyendo el objeto</p>";
    }
}

$usuario = new Usuario();
echo $usuario;

?>