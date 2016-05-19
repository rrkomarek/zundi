<?php
//echo "errores";
header('Content-Type: text/html; charset=utf-8');
class ERROR {
  function error_login(){
    return "<div role='alert' class='alert alert-danger animated fadeIn' id='error_login'><i class='icn-danger'></i> El email o password que ingresaste es incorrecto. Por favor intenta denuevo.</div>";
  }
  function error_rol(){
    return "<div role='alert' class='alert alert-warning animated fadeIn' id='error_login'><i class='icn-danger'></i> El usuario ingresado no tiene un rol definido. Por favor comuniquese con su encargado de sistemas.</div>";
  }
  function error_modulo_no_encontrado(){
    return "<div role='alert' class='alert alert-warning animated fadeIn' id='error_login'><i class='icn-danger'></i> El modulo no se ah encontrado.</div>";
  }
  function error_pag_no_encontrada(){
    require_once(_RUTA_HOST."nucleo/header.php");
    echo "<div role='alert' class='col-xs-4 col-xs-offset-4 alert alert-warning animated fadeIn' id='error_login'><i class='icn-danger'></i> 404 página no encontrada.</div>";
    require_once(_RUTA_HOST."nucleo/footer.php");
  }
} //Fin class error
?>
