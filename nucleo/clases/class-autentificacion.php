<?php
header('Content-Type: text/html; charset=utf-8');

class AUTENTIFICACION{

  var $constructor;

  function __construct($constructor) {
    $this->constructor = $constructor;
  }

  function index(){
    //echo "index autentificación";
    $cat = $this->constructor->get->get_categoria_index();
    $pla = $this->constructor->get->get_plantilla_index($this->constructor->query, $cat);

    //echo "cat:".$cat." pla:".$pla."</br>";

    if(isset($_POST['autentificar'])){
	    autentificar($plantilla,$cat,$pla,$query,$sesion);
    } else {
	    //echo "no autentificado</br>";
		  if( $this->verificar_categoria($this->constructor->query,$cat) or autentifico($cat,$this->constructor->sesion)){
        //echo "Ingreso normal de usuario</br>";
			  $this->ingresar($this->constructor->plantilla,$cat,$pla);
		  }else{
        $this->constructor->error->error_pag_no_encontrada();
	    }
    }

  }

  function verificar_categoria($query,$cat){
    //echo "entro a verificar categoria</br>";
    if (!is_numeric($cat)){   return false; }
    //echo "cat es numero";
    $sql = "select cat_id from categoria where cat_id='".$cat."'";
    $rs = $query->consulta($sql);
    $fila = $query->obt_fila($rs);
    //print($fila["cat_id"]);
    if($fila["cat_id"]!=""){
      return true;
    }else{
      return false;
    }
  }

  function autentifico($cat,$sesion){
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

}

?>
