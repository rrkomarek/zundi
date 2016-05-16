<?php
header("Content-Type: text/html;charset=utf-8");
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

$error = new ERROR();

$cat = get_categoria_index();
$pla = get_plantilla_index($query,$cat);

if (is_numeric($_POST['inputId'])){
  $id_mod= $_POST['inputId'];
}else{
  $error->error_pag_no_encontrada();
}

if ($id_mod=="0"){
  $url_mod = "modulos/sistemas/sistema.adm.php";
} else {
  $sql ="SELECT mod_url FROM modulos WHERE mod_id=$id_mod";
  $rs = $query -> consulta($sql);
  $row = $query -> obt_fila ($rs);
  $url_mod = $row["mod_url"];
}

//echo _RUTA_HOST.$url_mod."?id_mod=".$id_mod;

echo "<div class='container-fluid bloque-modulo'>";
echo "<a class='btn-cerrar-pag'><i class='icn-close'></i></a>";

echo "<iframe class='frame-mod' src='"._RUTA_WEB.$url_mod."?id_mod=".$id_mod."'  name='frame_content' scrolling=auto ></iframe>";

echo "</div>";

?>
<script>
$(".btn-cerrar-pag").click(function () {
    $(".popup-div").removeClass("on");
});
</script>
