<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-mysql.php");
$query = new MYSQL();
//echo "entre a la publicación";
$query->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);
?>
<div class="publicacion container-fluid" id="pub-<? echo $pud_id; ?>">
<?
$sql="select cat_id, cat_nombre, cat_ruta_amigable, cat_activar from  categoria	where cat_activar='1' ORDER BY cat_id ASC";
$rs = $query -> consulta($sql);
$num = $query -> num_registros($rs);
if($num>0){
for($i=0;$i<$num;$i++){
  list($mod_id,$mod_nombre,$mod_url,$mod_activar)=$query->obt_fila($rs);
  if ($mod_id!=1){
?>
<a type="button" href="<? echo _RUTA_WEB.$mod_url; ?>" class="btn btn-default"><? echo $mod_nombre; ?></a>
<?php
}
}
}
 ?>
</div>
