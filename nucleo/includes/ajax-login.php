<?php
error_reporting(E_ALL & ~E_NOTICE);
require("../config.php");
require_once("../clases/class-sesion.php");
require_once("../clases/class-mysql.php");

$sesion= new SESION();
$sesion->iniciar_sesion();

$query = new MYSQL();
$query ->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);

require_once("../clases/class-errores.php");
require_once("../clases/class-redireccion.php");
require_once("../funciones/funciones-get.php");

$cat = get_categoria_index();
$pla = get_plantilla_index($query,$cat);

$email= $_POST['inputEmail'];
$pw= base64_encode( $_POST['inputPassword'] );
//echo $mail."</br>";
//echo $pw."</br>";

$sql="SELECT usu_id,usu_nombre,usu_email FROM usuarios WHERE usu_email='".$email."' and usu_password='".$pw."'";
$rs = $query->consulta($sql);
$num= $query->num_registros($rs);
//echo "num:".$num;

if($num>0){
  list($usu_id, $usu_nombre,$usu_email)=$query->obt_fila($rs);
  $sesion->set_variable("usu_id",$usu_id);
  $sesion->set_variable("usu_nombre",$usu_nombre);
  $sesion->set_variable("usu_mail",$usu_email);
  //echo $sesion->get_nombre();
  //$sesion->imprimir();
   $redireccion = new REDIRECCION();
   $ruta = $redireccion->login($cat,$pla,$usu_id);

  if (traer_rol($usu_id)) {
    $sesion->set_variable("usu_rol",traer_rol($usu_id));
    echo $ruta;
  } else{
    echo "sin-rol";
    $sesion->cerrar_sesion();
  }
} else {
  echo "false";
  //$error= new ERROR();
  //$error->error_login();
}


?>
