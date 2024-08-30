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
    $id_usuario     =    $_REQUEST['id'];
    $condicion  =   "id_usuario=" . $id_usuario;
    $cliente     =    new Modelo();
    $dato = $cliente->mostrar("cliente", $condicion);
    echo $dato;
}

function guardar()
{
    $usuario    =    $_REQUEST['usuario'];
    $dni        =    $_REQUEST['dni'];
    $nombre     =    $_REQUEST['nombre_cliente'];
    $apellido   =    $_REQUEST['apellido_cliente'];
    $email      =    $_REQUEST['email_cliente'];
    $data       =   "'" . $usuario . "','".$dni."','". $nombre . "','" . $apellido . "','" . $email  . "'";
    $cliente    =    new Modelo();
    $dato       =    $cliente->insertar("cliente", $data);
    echo $dato;
}


// ACTUALIZAR

function editar()
{
    $id = $_REQUEST['id_edit'];
    $cliente     =    new Modelo();
    $dato = $cliente->mostrar("cliente", "id_cliente=" . $id);
    echo $dato;
}
function update()
{
    $id         =    $_REQUEST['id_edit'];
    $usuario    =    $_REQUEST['usuario'];
    $nombre     =    $_REQUEST['nombre_cliente'];
    $apellido   =    $_REQUEST['apellido_cliente'];
    $email      =    $_REQUEST['email_cliente'];
    $data       =   "id_usuario='".$usuario ."',nombre_cliente='".$nombre."',apellido_cliente='".$apellido."',email_cliente='".$email."'";
    $condicion  =   "id_cliente=".$id;
    $cliente     =    new Modelo();
    $dato         =    $cliente->actualizar("cliente", $data, $condicion);
    echo $dato;
}

// ELIMINAR

function eliminar()
{
    $id         =     $_REQUEST['id'];
    $condicion  =   "id_cliente=" . $id;
    $cliente     =    new Modelo();
    $dato         =    $cliente->eliminar("cliente", $condicion);
    echo ($dato) ? "true" : "false";
}
