<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriaController{
    public function index(){
        Utils::isAdmin();
        $categoria = new categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function ver(){

        if(isset($_GET['id'])){

            //Conseguir categoria
            $categoria = new categoria();
            $categoria->setId($_GET['id']);
            $categoria = $categoria->getOne();

            //Conseguir productos
            $producto = new Producto();
            $producto->setCategoria_id($_GET['id']);

            $productos = $producto->getAllCategory();
        }

        require_once 'views/categoria/ver.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if(isset($_POST) && isset($_POST['nombre'])){
            //Guardar la categoria en la bd

            $categoria = new categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
        }

        header("Location:".base_url."categoria/index");
    }
}

?>