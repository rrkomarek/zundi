<?php
  //Trabajo de variables GET
    // require_once(_RUTA_HOST."nucleo/funciones/funciones-get.php");
    // require_once(_RUTA_HOST."nucleo/clases/class-errores.php");
    // $error = new ERROR();
  /* Autentificacion */
    //Trabajo de variables GET
    $cat = get_categoria_index();
    $pla = get_plantilla_index($query,$cat);
    //echo "cat:".$cat." pla:".$pla."</br>";


    if(isset($_POST['autentificar'])){
	    autentificar($plantilla,$cat,$pla,$query,$sesion);
    } else {
	     //echo "no autentificado</br>";
		  if( verificar_categoria($query,$cat) or autentifico($cat,$sesion)){
        //echo "Ingreso normal de usuario</br>";
			  ingresar($plantilla,$cat,$pla);
		  }else{
        $error->error_pag_no_encontrada();
	    }
    }
  /* Funcion verificar_categoria */
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
  /* Funcion  autentifico */
    function autentifico($cat,$sesion){
		    $array_f = explode(":",$sesion->get_variable("usu_id"));
		    if(in_array($cat,$array_f))
			    return true;
		    else
			    return false;
    }
  /* Funcion  ingresar  */
    function ingresar($plantilla,$cat,$pla){
      //echo "Entro a ingresar";
  		$plantilla->cargar_plantilla($cat,$pla);
      //echo "cargar plantilla ok";
  		$plantilla->dibujar_cabecera($cat,$pla);
  		$plantilla->dibujar_cuerpo($cat,$pla);
  		$plantilla->dibujar_pie();
    }
  /* Funcion formulario  */
    function formulario($cat,$pla,$query){
    //  echo "Entro a formulario";
    }





?>
