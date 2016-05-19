<?php
header("Content-Type: text/html;charset=utf-8");
require_once("../../nucleo/config.php");
require_once("../../nucleo/clases/class-mysql.php");
require_once("../../nucleo/clases/class-paginas.php");
require_once("../../nucleo/clases/class-modulos.php");
require_once("../../nucleo/clases/class-errores.php");
require_once('modulos.class.php');

$query = new MYSQL();
$query->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);

$class_pagina = new CLASSPAGINAS();
$class_modulo = new CLASSMODULOS();
$error = new ERROR();

$class_pagina->validar_get ( $_GET['tarea'] );
$tarea = $_GET['tarea'];

$form =new MODULOS($query,$class_pagina,$class_modulo, $error );


require_once('../../nucleo/header.php');

switch( $tarea ){
  case 'busqueda': $form->busqueda();break;
  case 'form_nuevo': $form->form_nuevo();break;
  case 'form_editar': $form->form_editar();break;
  case 'ingresar': $form->ingresar();break;
  case 'modificar': $form->modificar();break;
  case 'activar': $form->activar();break;
  case 'eliminar': $form->eliminar();break;
  default: $form->busqueda();break;
}
require_once('../../nucleo/footer.php');
 ?>
