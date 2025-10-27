<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class MiFiltroRuntime implements RuntimeExtensionInterface
{
    public function multiplicar($numero): string
    {
        $tabla = "<h1>Tabla del número $numero</h1>";
        for ($i = 0; $i <= 10; $i++) {
            $tabla .= "$i x $numero = " . ($i * $numero) . "<br>";
        }
        return $tabla;
    }
}
