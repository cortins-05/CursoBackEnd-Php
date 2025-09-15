<?php

class Pedido{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }
    function getUsuario_id(){
        return $this->usuario_id;
    }
    function getProvincia(){
        return $this->provincia;
    }
    function getLocalidad(){
        return $this->localidad;
    }
    function getDireccion(){
        return $this->direccion;
    }
    function getCoste(){
        return $this->coste;
    }
    function getEstado(){
        return $this->estado;
    }
    function getFecha(){
        return $this->fecha;
    }

    function setId($id){
        $this->id = $id;
    }
    function setUsuario_id($usuario_id){
        $this->usuario_id = $usuario_id;
    }
    function setProvincia($provincia){
        $this->provincia = $this->db->real_escape_string($provincia);
    }
    function setLocalidad($localidad){
        $this->localidad = $this->db->real_escape_string($localidad);
    }
    function setDireccion($direccion){
        $this->direccion = $this->db->real_escape_string($direccion);
    }
    function setCoste($coste){
        $this->coste = $this->db->real_escape_string($coste);
    }
    function setEstado($estado){
        $this->estado = $this->db->real_escape_string($estado);
    }
    function setFecha($fecha){
        $this->fecha = $this->db->real_escape_string($fecha);
    }

    public function getAll(){
        $productos = $this->db->query("select * from pedidos order by id desc");
        return $productos;
    }

    public function getOne(){
        $producto = $this->db->query("select * from pedidos where id={$this->id}");
        return $producto->fetch_object();
    }

    public function getOneByUser(){
        $producto = $this->db->query("select p.id, p.coste from pedidos p inner join lineas_pedidos lp on lp.pedido_id = p.id where usuario_id={$this->getUsuario_id()} order by p.id desc limit 1 ");
        return $producto->fetch_object();
    }

    public function getAllByUser(){
        $producto = $this->db->query("select p.* from pedidos p where usuario_id={$this->getUsuario_id()} order by p.id desc limit 1 ");
        return $producto;
    }

    public function getProductsByPedido($id){
        $sql = "select pr.*,lp.unidades from productos pr inner join lineas_pedidos lp on pr.id = lp.producto_id where lp.pedido_id ={$id}";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function save(){
        $sql = "insert into pedidos values(null,{$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirmado',curdate(),curtime())";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function save_linea(){        
        $sql = "select LAST_INSERT_ID() as id";
        $query = $this->db->query($sql);

        $pedido_id = $query->fetch_object()->id;

        foreach($_SESSION['carrito'] as $elemento){
            $producto = $elemento['producto'];
            $insert = "insert into lineas_pedidos values(null,{$pedido_id},{$producto->id},{$elemento['unidades']})";
            $save = $this->db->query($insert);
        }

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function edit(){

        $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' where id={$this->getId()}";

        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
}

?>