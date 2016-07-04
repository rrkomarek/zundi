<?php
  require_once("../clases/class-constructor.php");
  $fmt = new CONSTRUCTOR();

  //if(isset($_POST['item']) && $_POST['item']==1){
    $ruta = $_POST['ruta'];
    $file = $_POST['file'];
    $item = $_POST['item'];
    if($item ==1 ){
      $fmt->form->listar_sub_directorios($ruta,$file);
    }
    if ($item==2) {
      $fmt->form->poner_ruta($ruta,$file);
    }


?>
