<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\MiFiltroRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class MiFiltroExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'multiplicar',
                [MiFiltroRuntime::class, 'multiplicar'],
                ['is_safe' => ['html']] // ← evita que Twig escape el HTML
            ),
        ];
    }
}
