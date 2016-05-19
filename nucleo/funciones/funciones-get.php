<?php

  // Get Catagoria index
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
        $id_plantilla = obtener_plantilla($query,$id_categoria);
      }
      //echo "id_pla:".$id_plantilla;
      return $id_plantilla;
    }

  /* funcion obtener_plantilla */
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
  /* funcion traer rol */
      function traer_rol ($usu_id){
        $query = new MYSQL();
        $query ->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);

        $sql ="SELECT rol_rel_rol_id FROM roles_rel WHERE  rol_rel_usu_id='$usu_id'";
        $rs = $query -> consulta($sql);
        $fila = $query -> obt_fila($rs);
        return $rol = $fila["rol_rel_rol_id"];

      }


?>
