<?php
header('Content-Type: text/html; charset=utf-8');

class AUTENTIFICACION{

  var $fmt;

  function __construct($fmt) {
    $this->fmt = $fmt;
  }

  function index($ruta){
    //echo $ruta."</br>";
    if (isset($ruta)){
      //$rx = explode("/",$ruta);
      //$site = end($rx);
      $rutax=str_replace(_RUTA_HOST,"",$ruta);
      $cat = $this->ruta_sitio_cat($rutax);
      $pla = $this->fmt->get->get_plantilla_index($this->fmt->query, $cat);
    }else {
      //echo "index autentificación";
      $cat = $this->fmt->get->get_categoria_index();
      $pla = $this->fmt->get->get_plantilla_index($this->fmt->query, $cat);
    }
    
    if ( $this->dominio_cat(_RUTA_WEB) ) {
	    $cat= $this->dominio_cat(_RUTA_WEB);
    }

    //echo "cat:".$cat." pla:".$pla."</br>";

    if(isset($_POST['autentificar'])){
	    //$this->autentificar($plantilla,$cat,$pla,$query,$sesion);
    } else {
	    //echo "no autentificado</br>";
		  if( $this->verificar_categoria($this->fmt->query,$cat) or $this->autentifar($cat,$this->fmt->sesion)){
        //echo "Ingreso normal de usuario</br>";
			  $this->ingresar($this->fmt->plantilla,$cat,$pla);
		  }else{
        $this->fmt->error->error_pag_no_encontrada();
	    }
    }

  }

  function verificar_categoria($query,$cat){
    //echo "entro a verificar categoria</br>";
    if (!is_numeric($cat)){   return false; }
    //echo "cat es numero";
    $sql = "select cat_id from categoria where cat_id='".$cat."'";
    $rs = $this->fmt->query->consulta($sql);
    $fila = $this->fmt->query->obt_fila($rs);
    //print($fila["cat_id"]);
    if($fila["cat_id"]!=""){
      return true;
    }else{
      return false;
    }
  }

  function autentifar($cat,$sesion){
	    $array_f = explode(":",$sesion->get_variable("usu_id"));
	    if(in_array($cat,$array_f))
		    return true;
	    else
		    return false;
  }

  function ingresar($plantilla,$cat,$pla){
    //echo "Entro a ingresar";
		$plantilla->cargar_plantilla($cat,$pla);
		$plantilla->dibujar_cabecera($cat,$pla);
		$plantilla->dibujar_cuerpo($cat,$pla);
		$plantilla->dibujar_pie();
  }

  function formulario($cat,$pla,$query){
    //  echo "Entro a formulario";
  }

  function ruta_sitio_cat($ruta){
    $consulta="SELECT cat_id FROM categoria WHERE cat_ruta_sitio='$ruta'";
    $rs = $this->fmt->query->consulta($consulta);
    $num =$this->fmt->query->num_registros($rs);
    $fila = $this->fmt->query->obt_fila($rs);
    if($num>0){
        $id=$fila["cat_id"];
        if ($_GET['cat']!=""){ if (!is_numeric($_GET['cat'])){   return false; } }
        $cat = $_GET['cat'];
      if ($cat!=""){
        return $cat;
      }else {
        return $id;
      }
    }else{
      return $this->fmt->get->get_categoria_index();
    }

  }
  function dominio_cat($dominio){
	  //echo $dominio;
	  //$rd = explode("//", $dominio);
	  //$rx = str_replace("/","", $rd['1']);
	  $consulta="SELECT cat_id FROM categoria WHERE cat_dominio='$dominio'";
	  $rs = $this->fmt->query->consulta($consulta);
	  $num =$this->fmt->query->num_registros($rs);
	  $fila = $this->fmt->query->obt_fila($rs);
	  if($num>0){
		if ($_GET['cat']!=""){ if (!is_numeric($_GET['cat'])){   return false; } }
		if ($_GET['cat']==""){
			return $fila["cat_id"];
		}else{
			return false;
		}
	  	
	  }else{
		return false;
	  }
  }

}

?>
