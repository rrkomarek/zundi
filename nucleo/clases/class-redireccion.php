<?php
require_once(_RUTA_HOST."/nucleo/config.php");
require_once(_RUTA_HOST."/nucleo/clases/class-mysql.php");
require_once(_RUTA_HOST."/nucleo/funciones/funciones-get.php");
require_once(_RUTA_HOST."/nucleo/clases/class-sesion.php");

class REDIRECCION{

  function login($cat,$pla,$usu_id){
    //return "cat:".$cat."pla:".$pla."usu_id:".$usu_id;
    switch ( traer_rol($usu_id) ) {
     case "0":
       // "Sin rol";
     break;

     case "1":
       //echo "administrador";
       return "dasboard";
     break;

     case "2":
       //echo "diseñador web";
       return $this->ruta_amigable($cat,$pla);
     break;

     case "3":
       //echo "funcionario";
       return "intranet/dashboard";
     break;

     case "4":
       //echo "editor";
       return $this->ruta_amigable($cat,$pla);
     break;

     case "5":
       //echo "redactor";
       return $this->ruta_amigable($cat,$pla);
     break;
    }
  } // fin login

  function ruta_amigable($cat,$pla){
    $query = new MYSQL();
    $query ->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);

    $sql ="SELECT cat_ruta_amigable FROM categoria WHERE cat_id='$cat'";
    $rs = $query -> consulta($sql);
    $fila = $query -> obt_fila($rs);
    $ruta_cat = $fila["cat_ruta_amigable"];
    if ($pla!=1) {
      return _RUTA_WEB.$ruta_cat."?p=".$pla;
    } else {
      return _RUTA_WEB.$ruta_cat;
    }
  } // fin ruta amigable
} // fin clase
?>
