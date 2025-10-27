<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'hello' => 'Hola Mundo con Symfony'
        ]);
    }

    #[Route(
        '/animales/{nombre?}/{apellidos?}',
        name: 'app_animales',
        defaults:['nombre'=>"Lucas","apellidos"=>"Ortins Mendez"],
        methods:['GET'],
        requirements:['nombre'=>'[a-zA-Z]+']
    )]

    public function animales($nombre,$apellidos){
        $title = 'Bienvenido a la pagina de animales';
        $animales = array('perro','gato','paloma','rata');
        $aves = array(
            'tipo'=>'palomo',
            'color'=>'gris',
            'edad'=>4,
            'raza'=>'coliano'
        );
        return $this->render('home/animales.html.twig',[
            'title' => $title,
            'nombre'=> $nombre,
            'apellidos' => $apellidos,
            'animales' => $animales,
            'aves' => $aves
        ]);
    }

    #[Route(
        '/redirigir',
        'app_redirigir'
    )]
    public function redirigir(){
        // return $this->redirectToRoute('app_animales',[
        //     'nombre'=>'Juan',
        //     'apellidos' => 'Lopez'
        // ]);
        return $this->redirect('https://chatgpt.com');
    }
}
