<?php
header('Content-Type: text/html; charset=utf-8');

class GET{

  var $constructor;

  function __construct($constructor){
    $this->constructor = $constuctor;
  }

  function get_categoria_index(){
    //echo "Ingreso get categoria</br>";
    if ( (isset($_GET["cat"]) && !empty($_GET["cat"])) ) {
      $id_categoria = mysql_real_escape_string( $_GET["cat"] );
    }else{
      $id_categoria = 1;
    }
    return $id_categoria;
  }

  function get_plantilla_index($query,$id_categoria){
    //echo "Ingreso get plantilla</br>";
    if ( (isset($_GET["pla"]) && !empty($_GET["pla"])) ) {
      $id_plantilla = mysql_real_escape_string( $_GET["pla"] );
    }else{
      $id_plantilla = $this->obtener_plantilla($query,$id_categoria);
    }
    //echo "id_pla:".$id_plantilla;
    return $id_plantilla;
  }

  function obtener_plantilla($query,$cat){
    //echo "Entre a obtener_plantilla</br>";
    $sql = "SELECT cat_id_plantilla
           FROM categoria
           WHERE cat_id='$cat'";
    $res  = $query->consulta($sql);
    $fila = $query->obt_fila($res);
    //echo "fila:".	$fila["cat_id_plantilla"]."</br>";
    return 	$fila["0"];
  }
}

?>
