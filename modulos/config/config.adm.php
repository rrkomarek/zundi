<?php
require_once("../../nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR();

require_once('config.class.php');

$fmt->get->validar_get( $_GET['tarea'] );
$tarea = $_GET['tarea'];

$form =new CONFIG($fmt);

echo $fmt->header->header_modulo();

switch( $tarea ){
  case 'form_editar': $form->form_editar();break;
  case 'modificar': $form->modificar();break;
  default: $form->form_editar();break;
}
echo $fmt->footer->footer_modulo();

?>
