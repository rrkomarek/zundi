<?PHP
// require_once(_RUTA_HOST."/nucleo/config.php");
// require_once(_RUTA_HOST."/nucleo/clases/class-mysql.php");
// //echo "Class BRAND";
header('Content-Type: text/html; charset=utf-8');

class BRAND{

  var $constructor;

  function __construct($constructor) {
    $this->constructor = $constructor;
  }

  function brand_login($cat,$tipo){

    $sql ="SELECT cat_imagen FROM categoria WHERE cat_id='$cat' and cat_tipo='2'";
    $rs = $this->constructor->query -> consulta($sql);
    $fila =  $this->constructor->query -> obt_fila($rs);
    $img_cat = $fila["cat_imagen"];

    if ($img_cat){
      return "<img class=' $tipo' src='"._RUTA_WEB.$img."' />";
    }else{
      $sql ="SELECT conf_imagen FROM configuracion";
      $rs = $this->constructor->query -> consulta($sql);
      $fila = $this->constructor->query -> obt_fila($rs);
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
