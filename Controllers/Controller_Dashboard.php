<?php
require_once("../Models/Model_Dashboard.php");

switch ($_GET['action']) {
    case 'datos_e':
        datos_especifico();
        break;
    case 'datos_t':
        datos_totales();
        break;
    case 'datos_g':
        datos_grafica();
        break;
}
//MOSTRAR
function datos_especifico()
{
    $usuario     =    $_REQUEST['id_usuario'];
    $pedido      =    $_REQUEST['id_pedido'];
    $data        =    "usuario=" . $usuario;
    $condicion   =    $pedido;
    $pedidos      =    new Modelo();
    $dato        =    $pedidos->contador_especifico("pedidos", $data, $condicion);
    echo json_encode($dato);
}
function datos_totales()
{
    $usuario     =    $_REQUEST['id_usuario'];
    $data        =    "usuario=" . $usuario;
    $pedidos      =    new Modelo();
    $dato        =    $pedidos->contadosall("pedidos", $data);
    echo json_encode($dato);
}
function datos_grafica()
{
    $usuario     =    $_REQUEST['id_usuario'];
    $condicion   =    "usuario = " . $usuario;
    $pedidos     =    new Modelo();
    $dato        =    $pedidos->contador("pedidos", $condicion);
    echo json_encode($dato);
}
