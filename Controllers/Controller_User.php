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
  case 'eliminar':
    eliminar();
    break;
  case 'userExists':
    userExists();
    break;
}
//MOSTRAR
function index()
{
  $producto     =    new Modelo();
  $dato = $producto->mostrar("usuario", "1");
  //require_once("views/index.php");
  echo $dato;
}
//INSERTAR

function guardar()
{
  $nombre     =    $_REQUEST['nombre'];
  $apellido   =    $_REQUEST['apellido'];
  $email      =    $_REQUEST['email'];
  $password   =    $_REQUEST['password'];
  $data       =   "'" . $nombre . "','" . $apellido . "','" . $email . "','" . $password . "'";
  $usuarios   =    new Modelo();
  $dato       =    $usuarios->insertar("usuario", $data);
  echo $dato;
  // header("location:" . dashboard);
}
// ACTUALIZAR
function editar()
{
  $id       = $_REQUEST['id'];
  $producto =    new Modelo();
  $dato     = $producto->mostrar("productos", "id_usuario=" . $id);
  echo $dato;
}
// function update()
// {
//   $id         =    $_REQUEST['id'];
//   $nombre     =    $_REQUEST['nombre'];
//   $precio     =    $_REQUEST['precio'];
//   $data       =    "nombre_usuario='" . $nombre . "', precio_usuario=" . $precio;
//   $condicion  =    "id_usuario=" . $id;
//   $producto   =    new Modelo();
//   $dato       =    $producto->actualizar("usuario", $data, $condicion);
//   header("location:" . urlsite);
// }
// ELIMINAR
function eliminar()
{
  $id         =     $_REQUEST['id'];
  $condicion  =     "id_usuario=" . $id;
  $producto   =    new Modelo();
  $dato       =    $producto->eliminar("usuario", $condicion);
  echo ($dato) ? "true" : "false";
}
function userExists()
{
  $password   =    $_REQUEST['pass'];
  $email      =    $_REQUEST['correo'];
  $condicion  =    "email_usuario='" . $email . "' and password_usuario='" . $password . "'";
  $cliente    =    new Modelo();

  $dato = $cliente->mostrar("usuario", $condicion);
  if ($dato != "[]") {
    echo $dato;
  } else {
    echo "0";
  }
}
