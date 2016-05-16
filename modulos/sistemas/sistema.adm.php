<?php
header("Content-Type: text/html;charset=utf-8");
require_once("../../nucleo/config.php");
require_once("../../nucleo/clases/class-mysql.php");
require_once('sistemas.class.php');

$form =new SISTEMAS;
$tarea ="";

if (isset($_GET['tarea'])){
  $tarea = $_GET['tarea'];
}

$query = new MYSQL();
$query->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);

require_once('../../nucleo/header.php');

switch( $tarea ){
  case 'busqueda': $form->busqueda($query);break;
  case 'form_ingresar': $form->form_ingresar();break;
  case 'form_modificar': $form->form_modificar();break;
  case 'ingresar': $form->ingresar();break;
  case 'modificar': $form->modificar();break;
  case 'publicar': $form->publicar();break;
  case 'eliminar': $form->eliminar();break;
  default: $form->busqueda($query);break;
}
require_once('../../nucleo/footer.php');
 ?>
