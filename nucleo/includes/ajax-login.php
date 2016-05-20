<?php
// error_reporting(E_ALL & ~E_NOTICE);
// require("../config.php");
// require_once("../clases/class-sesion.php");
// require_once("../clases/class-mysql.php");
require_once("../clases/class-constructor.php");
$constructor = new CONSTRUCTOR();


//$sesion= new SESION();
//$sesion->iniciar_sesion();

$constructor->sesion->iniciar_sesion();

// $query = new MYSQL();
// $query ->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);

// require_once("../clases/class-errores.php");
// require_once("../clases/class-redireccion.php");
// require_once("../funciones/funciones-get.php");

$cat = $constructor->get->get_categoria_index();
$pla = $constructor->get->get_plantilla_index($constructor->query,$cat);

$email= $_POST['inputEmail'];
$pw= base64_encode( $_POST['inputPassword'] );
//echo $email." : ".$pw;

$sql="SELECT usu_id,usu_nombre,usu_email FROM usuarios WHERE usu_email='".$email."' and usu_password='".$pw."'";
$rs = $constructor->query->consulta($sql);
$num= $constructor->query->num_registros($rs);
//echo "num:".$num;

if($num>0){
  list($usu_id, $usu_nombre,$usu_email)=$constructor->query->obt_fila($rs);
  $constructor->sesion->set_variable("usu_id",$usu_id);
  $constructor->sesion->set_variable("usu_nombre",$usu_nombre);
  $constructor->sesion->set_variable("usu_mail",$usu_email);
  //echo $sesion->get_nombre();
  //$sesion->imprimir();
  //$redireccion = new REDIRECCION();
   $ruta = $constructor->redireccion->login($cat,$pla,$usu_id);

  if (traer_rol($usu_id)) {
    $constructor->sesion->set_variable("usu_rol",traer_rol($usu_id));
    echo $ruta;
  } else{
    echo "sin-rol";
    $constructor->sesion->cerrar_sesion();
  }
} else {
  echo "false";
  //$error= new ERROR();
  //$error->error_login();
}


?>
