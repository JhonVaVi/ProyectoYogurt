<?php
require_once("../Models/Model_G.php");

switch ($_GET['action']) {
    case 'listar':
        index();
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
    $producto     =    new Modelo();
    $dato = $producto->mostrar("productos", "1");
    echo $dato;
}

function guardar()
{
    $nombre     =    $_REQUEST['nombre'];
    $precio     =    $_REQUEST['precio'];
    $stock      =    $_REQUEST['stock'];
    $data       =   "'" . $nombre . "','" . $precio . "','" . $stock . "'";
    $productos  =    new Modelo();
    $dato       =    $productos->insertar("productos", $data);
    echo $dato;
}


// ACTUALIZAR

function editar()
{
    $id = $_REQUEST['id_edit'];
    $producto     =    new Modelo();
    $dato = $producto->mostrar("productos", "id_producto=" . $id);
    echo $dato;
}
function update()
{
    $id         =     $_REQUEST['id_edit'];
    $nombre     =    $_REQUEST['nombre_producto'];
    $precio     =    $_REQUEST['precio_producto'];
    $stock     =    $_REQUEST['stock_producto'];
    $data       =   "nombre_producto='" . $nombre . "', precio_producto='" . $precio . "', stock_producto='" . $stock . "'";
    $condicion  =   "id_producto=" . $id;
     $producto     =    new Modelo();
 $dato         =    $producto->actualizar("productos", $data, $condicion);
    echo $dato;
}

// ELIMINAR

function eliminar()
{
    $id         =     $_REQUEST['id'];
    $condicion  =   "id_producto=" . $id;
    $producto     =    new Modelo();
    $dato         =    $producto->eliminar("productos", $condicion);
    echo ($dato) ? "true" : "false";
}
