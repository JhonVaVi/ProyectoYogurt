<?php
require_once("../Models/Model_G.php");

switch ($_GET['action']) {
    case 'listar':
        index();
        break;
    case 'lista_e':
        lista_especifico();
        break;    
    case 'guardar':
        guardar();
        break;
    case 'editar':
        editar();
        break;
    case 'update':
        update();
        break;
    case 'eliminar':
        eliminar();
        break;
}
//MOSTRAR
function index()
{
    $id           =    $_REQUEST['id_usuario'];
    $condicion    =   "p.usuario=" . $id;
    $pedido     =    new Modelo();
    $dato = $pedido->mostrar_especifico($condicion);
    echo $dato;
}
function lista_especifico()
{
    $id_usuario          = $_REQUEST['id_usuario'];
    $id_pedido           = $_REQUEST['id_pedido'];
    $condicion           =   "p.usuario=" . $id_usuario . " and p.id_pedido=" . $id_pedido;
    $pedido              =    new Modelo();
    $dato = $pedido->mostrar_especifico($condicion);
    echo $dato;
}

function guardar()
{
    $usuario     =    $_REQUEST['usuario'];
    $cliente     =    $_REQUEST['cliente'];
    $producto     =    $_REQUEST['producto'];
    $cantidad     =    $_REQUEST['cantidad'];
    $fecha_pedido     =    $_REQUEST['fecha_pedido'];
    $tipo_pedido    =    $_REQUEST['tipo_pedido'];
    $monto    =    $_REQUEST['monto_final'];
    $data       =   "'" . $usuario . "','" . $cliente . "','" . $producto . "','" . $cantidad .  "','" . $fecha_pedido .  "','" . $tipo_pedido . "' , '". $monto . "'";
//echo $data;
    $pedido     =    new Modelo();
    $dato         =    $pedido->insertar("pedidos", $data);
    echo $dato;
}

function editar()
{
    $id = $_REQUEST['id_edit'];
    $pedido     =    new Modelo();
    $dato = $pedido->mostrar("pedidos", "id_pedido=" . $id);
    echo $dato;
}
function update()
{
    $id           =    $_REQUEST['id_pedido'];
    $usuario      =    $_REQUEST['usuario'];
    $cliente      =    $_REQUEST['cliente'];
    $producto     =    $_REQUEST['producto'];
    $cantidad     =    $_REQUEST['cantidad_pedido'];
    $fecha_pedido =    $_REQUEST['fecha_pedido'];
    $tipo_pedido  =    $_REQUEST['tipo_pedido'];
    $monto        =    $_REQUEST['monto_pedido'];
    $data         =   "usuario='" . $usuario . "', cliente='" . $cliente . "', producto='" . $producto . "', cantidad_pedido='" . $cantidad . "', fecha_pedido='" . $fecha_pedido . "', tipo_pedido='" . $tipo_pedido . "',monto_pedido='" . $monto . "'";
   $condicion    =   "id_pedido=" . $id;
   // echo $data;
    $pedido       =    new Modelo();
    $dato         =    $pedido->actualizar("pedidos", $data, $condicion);
    echo $dato;
}

function eliminar()
{
    $id         =     $_REQUEST['id'];
    $condicion  =   "id_pedido=" . $id;
    $pedido     =    new Modelo();
    $dato         =    $pedido->eliminar("pedidos", $condicion);
    echo ($dato) ? "true" : "false";
}
