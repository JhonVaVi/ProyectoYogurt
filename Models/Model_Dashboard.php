<?php
include_once('../Connection/connection.php');
class Modelo
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }
    public function contador_especifico($tabla, $data, $Tipo_Pedido)
    {
        $consulta = "select count(*) as contados from " . $tabla . " where " . $data . " and tipo_pedido='" . $Tipo_Pedido . "'";
        $resultado = $this->db->connect()->query($consulta);
        if($resultado){
            return $resultado->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return "false";
        }
    }
    public function contadosall($tabla, $data)
    {
        $consulta = "select count(*) as contados from " . $tabla . " where " . $data . "";
        $resultado = $this->db->connect()->query($consulta);
        if($resultado){
            return $resultado->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return "false";
        }
    }
    public function contador($tabla,$condicion){
        $consulta = "select tipo_pedido , count(*) as contados from ".$tabla." pedidos   WHERE ".$condicion. " group by tipo_pedido";
        $resultado = $this->db->connect()->query($consulta);
       
        if($resultado){
            return $resultado->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return "false";
        }
    }
}
