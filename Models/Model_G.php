<?php
include_once('../Connection/connection.php');
class Modelo
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }
    public function insertar($tabla, $data)
    {
        $consulta = "insert into " . $tabla . " values(null," . $data . ")";
        $resultado = $this->db->connect()->query($consulta);
        //return $resultado;
     if($resultado){
         return true;
     }else{
         return false;
     }
    }
    public function mostrar($tabla,$condicion)
    {
        $consul = "select * from " . $tabla . " where " . $condicion . ";";
        $resu = $this->db->connect()->query($consul);
        if($resu){
            return json_encode($resu->fetchAll(PDO::FETCH_ASSOC));

        }else{
            return "false";
        }
      
    
     
    }
    public function actualizar($tabla, $data, $condicion)
    {
        $consulta = "update " . $tabla . " set " . $data . " where " . $condicion . ";";

         $resultado = $this->db->connect()->query($consulta);
   
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminar($tabla, $condicion)
    {
        $eli = "delete from " . $tabla . " where " . $condicion;
        $res = $this->db->connect()->query($eli);
        return $res;
        // if ($res) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
    public function mostrar_especifico($condicion){
        $consul = "select  u.nombre_usuario ,pr.nombre_producto, c.nombre_cliente,p.cantidad_pedido, p.fecha_pedido , p.tipo_pedido ,p.monto_pedido , p.id_pedido from  pedidos p inner join usuario u  inner join productos pr inner join cliente c 
        on p.usuario = u.id_usuario and p.cliente = c.id_cliente and p.producto= pr.id_producto "  . " where " . $condicion . ";";
        // echo $consul;
        $resu = $this->db->connect()->query($consul);
        if($resu){
            return json_encode($resu->fetchAll(PDO::FETCH_ASSOC));

        }else{
            return "false";
        }
    }
 }
