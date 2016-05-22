<?php
header('Content-Type: text/html; charset=utf-8');

class MENSAJE{

  var $fmt;

  function __construct($fmt){
    $this->fmt = $fmt;
  }

  function login_ok(){
    return "<div  class='btn animated fadeIn color-text-negro-b' id='login_ok'><i class='color-text-verde icn-checkmark-circle'></i> Logín correcto. Redireccionando...</div>";
  }

}// fin class mensajes;

?>
