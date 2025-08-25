<?php

class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $fecha;
    private $imagen;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }
    function getCategoria_id(){
        return $this->categoria_id;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getDescripcion(){
        return $this->descripcion;
    }
    function getPrecio(){
        return $this->precio;
    }
    function getStock(){
        return $this->stock;
    }
    function getFecha(){
        return $this->fecha;
    }
    function getImagen(){
        return $this->imagen;
    }

    function setId($id){
        $this->id = $id;
    }
    function setCategoria_id($categoria_id){
        $this->categoria_id = $categoria_id;
    }
    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    function setDescripcion($descripcion){
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }
    function setPrecio($precio){
        $this->precio = $this->db->real_escape_string($precio);
    }
    function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }
    function setFecha($fecha){
        $this->fecha = $this->db->real_escape_string($fecha);
    }
    function setImagen($imagen){
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    public function getAll(){
        $productos = $this->db->query("select * from productos order by id desc");
        return $productos;
    }

    public function getAllCategory(){
        $sql = "select p.*, c.nombre as 'cat_nombre' from productos p inner join categorias c on c.id=p.categoria_id where p.categoria_id={$this->getCategoria_id()}";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getRandom($limit){
        $productos = $this->db->query("select * from productos order by rand() limit $limit");
        return $productos;
    }

    public function getOne(){
        $producto = $this->db->query("select * from productos where id={$this->id}");
        return $producto->fetch_object();
    }

    public function save(){
        $sql = "insert into productos values(null,{$this->getCategoria_id()},'{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},null,curdate(),'{$this->getImagen()}')";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function edit(){

        $categoria = (int) $this->getCategoria_id();
        $precio    = (float) $this->getPrecio();
        $stock     = (int) $this->getStock();
        $id        = (int) $this->id;

        $sql = "UPDATE productos SET 
            categoria_id = $categoria,
            nombre = '{$this->getNombre()}',
            descripcion = '{$this->getDescripcion()}',
            precio = $precio,
            stock = $stock";

        if ($this->getImagen() != null) {
            $sql .= ", imagen = '{$this->getImagen()}'";
        }

        $sql .= " WHERE id = $id";

        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "delete from productos where id={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result=true;
        }
        return $result;
    }

}

?>