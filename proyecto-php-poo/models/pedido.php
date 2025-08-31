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

    public function save(){
        $sql = "insert into pedidos values(null,{$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirmado',curdate(),curtime())";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

}

?>