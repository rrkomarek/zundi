<?php
  require_once("../clases/class-constructor.php");
  $fmt = new CONSTRUCTOR();

  //if(isset($_POST['item']) && $_POST['item']==1){
    $ruta = $_POST['ruta'];
    $file = $_POST['file'];
    $fmt->form->listar_archivos($ruta,$file);
//  }


?>
