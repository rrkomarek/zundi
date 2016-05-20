<?php
header('Content-Type: text/html; charset=utf-8');

class CONSTRUCTOR(){
  function contructor(){
    require_once("../nucleo/config.php");
    require_once("../nucleo/clases/class-sesion.php");
    require_once("../nucleo/clases/class-mysql.php");
    require_once("../nucleo/plantilla.php");
    require_once("../nucleo/clases/class-errores.php");
    require_once("../nucleo/clases/class-redireccion.php");
    require_once("../nucleo/funciones/funciones-get.php");
    require_once("../nucleo/clases/class-mensajes.php");
    $sesion = new SESION();
    $query = new MYSQL();
    $plantilla = new PLANTILLA();
    $error = new ERROR();
    $redireccion = new REDIRECCION();
    $mensaje = new MENSAJE();
  }
  function header(){
    require_once("../nucleo/header.php");
  }

  function footer(){
    require_once("../nucleo/footer.php");
  }

  function brand(){
    require_once("../nucleo/clases/class-brand.php");
    $brand = new BRAND();
  }

}


?>
