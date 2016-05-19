<?PHP
require_once(_RUTA_HOST."/nucleo/config.php");
require_once(_RUTA_HOST."/nucleo/clases/class-mysql.php");
//echo "Class BRAND";
class BRAND{

  function brand($cat,$tipo){
    $query = new MYSQL();
    $query ->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);
    $sql ="SELECT cat_imagen FROM categoria WHERE cat_id='$cat' and cat_tipo='2'";
    $rs = $query -> consulta($sql);
    $fila = $query -> obt_fila($rs);
    $img_cat = $fila["cat_imagen"];

    if ($img_cat){
      return "<img class=' $tipo' src='"._RUTA_WEB.$img."' />";
    }else{
      $sql ="SELECT conf_imagen FROM configuracion";
      $rs = $query -> consulta($sql);
      $fila = $query -> obt_fila($rs);
      $img_conf = $fila["conf_imagen"];
      if ($img_conf){
        return "<img class='".$tipo."' src='"._RUTA_WEB.$img_conf."' />";
      }else{
        return '<div class="logo-zundi"><i class="icn-zundi color-text-rojo-a"></i><span class="color-text-gris">zundi</span></div>';
      }
    }
  } // fin function brand_login

} // fin class brand

?>
