<?php

trait Utilidades{
    public function mostrarNombre(){
        echo "<h1>El nombre es ".$this->nombre."</h1>";
    }
}

class Coche{
    public $nombre;
    public $marca;

    use Utilidades;
}

class Persona{
    public $nombre;
    public $apellidos;

    use Utilidades;
}

class VideoJuego{
    public $nombre;
    public $anio;

    use Utilidades;
}

$coche = new Coche();
$coche->nombre = 'Corolla';

$persona = new Persona();
$persona->nombre = 'Lucas';

$videojuego = new VideoJuego();
$videojuego->nombre = 'Last of Us';

$coche->mostrarNombre();
$persona->mostrarNombre();
$videojuego->mostrarNombre();

?>