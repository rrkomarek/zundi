<?php
header('Content-Type: text/html; charset=utf-8');

class MENSAJE{

  var $fmt;

  function __construct($fmt){
    $this->fmt = $fmt;
  }


  function mail_ok(){
    return "<div role='alert' class='alert alert-success animated fadeIn' id='success_mail'><i class='icn-checkmark-circle'></i> Se envio correctamente su consulta nos contactaremos con usted lo antes posible.</div>";
  }

  function login_ok(){
    return "<div  class='btn animated fadeIn color-text-negro-b' id='login_ok'><i class='color-text-verde icn-checkmark-circle'></i> Logín correcto. Redireccionando...</div>";
  }

  function no_existe_categorias_hijas(){
    return "<div  class='alert alert-warning col-xs-3 col-md-offset-4 col-xs- animated fadeIn color-text-negro-b' ><i class='icn-danger'></i> No existen categorias hijas...</div>";
  }



}// fin class mensajes;

?>
