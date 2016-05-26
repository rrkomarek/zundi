<?php
header('Content-Type: text/html; charset=utf-8');

class NAV{

  var $fmt;

  function __construct($fmt){
    $this->fmt = $fmt;
  }

  function construir_sistemas_rol($id_rol,$id_usu){  // revisar por roles
    $sql ="SELECT sis_id, sis_nombre, sis_icono FROM sistemas where sis_activar='1'";
    $rs = $this->fmt->query->consulta($sql);
    $num = $this->fmt->query->num_registros($rs);
      if($num>0){
        for($i=0;$i < $num; $i++){
          list($fila_id,$fila_nombre,$fila_icono) = $this->fmt->query->obt_fila($rs);
          $aux .= $this->acordion($fila_id, "btn-menu-sidebar", $fila_nombre, $fila_icono); //$nombre, $menu, $id_sistema, $id_modulo
        }
      }
    return $aux;
  }

  function construir_title_menu($nombre){
    $aux ="<div class='title-menu'>$nombre</div>";
    return $aux;
  }

  function construir_btn_sidebar($clase, $id_mod){

    $sql ="SELECT mod_nombre, mod_icono, mod_url FROM modulos where mod_id='".$id_mod."' and mod_activar='1'";
    $rs = $this->fmt->query->consulta($sql);
    $fila = $this->fmt->query->obt_fila($rs);
    $num =$this->fmt->query->num_registros($rs);
    $fila_nombre = $fila['mod_nombre'];
    $fila_icono  = $fila['mod_icono'];
    $fila_url    = $fila['mod_url'];
    if ($num > 0){
    $aux  ="<li>";
    $aux .='<a  class="'.$clase.'"  title="'.$fila_nombre.'"  icn="'.$fila_icono.'" id="btn-m'.$id_mod.'" id_mod="'.$id_mod.'">';
    $aux .= "<i class='".$fila_icono."'></i> ".$fila_nombre." </a>";
    $aux .= "</li>";

    }

    return $aux;
  }

  function construir_btn_atajo ($clase, $id_atj){

    $sql ="SELECT atj_nombre, atj_icono, atj_url FROM atajos where atj_id='".$id_atj."' and atj_activar='1'";
    $rs = $this->fmt->query->consulta($sql);
    $fila = $this->fmt->query->obt_fila($rs);
    $num =$this->fmt->query->num_registros($rs);
    $fila_nombre = $fila['mod_nombre'];
    $fila_icono  = $fila['mod_icono'];
    $fila_url    = $fila['mod_url'];
    if ($num > 0){
    $aux ='<li class="dropdown">';
    $aux .='  <a  class="'.$clase.'"  title="'.$fila_nombre.'"  icn="'.$fila_icono.'" id="btn-a'.$id_atj.'" id_atj="'.$id_atj.'">';
    $aux .='  <i class="'.$fila_icono.'"></i>  '.$fila_nombre.' </a>';
    $aux .='</li>';
    }
    return $aux;
  }

  function acordion($id, $clase,$nombre, $icono){
    $aux ='<div class="panel-group acordion" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading-'.$id.'">
            <a role="button" data-toggle="collapse" class="'.$clase.'" data-parent="#accordion" href="#collapse-'.$id.'" aria-expanded="true" aria-controls="collapse-'.$id.'">
             <i class="'.$icono.'"></i> '.$nombre.' &nbsp; <i class="icn-chevron-donw btn-donw"></i>
            </a>
        </div>
        <div id="collapse-'.$id.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-'.$id.'">
          <div class="panel-body">
            Hola
          </div>
        </div>
      </div>
    </div>';
    return $aux;
  }

  function traer_cat_hijos($cat){
    $sql="SELECT cat_id, cat_nombre, cat_id_padre, cat_icono, cat_url, cat_destino, cat_ruta_amigable FROM categoria WHERE cat_id_padre='$cat' and cat_activar='1' ORDER BY cat_orden ASC";
    $rs = $this->fmt->query->consulta($sql);
    $num = $this->fmt->query->num_registros($rs);
    if ($num>0){
      for ($i=0; $i<$num; $i++){

        list($fila_id, $fila_nombre, $fila_id_padre, $fila_icono, $fila_url, $fila_destino, $fila_ruta_amigable) =  $this->fmt->query->obt_fila($rs);

        if (!empty($fila_url)){
          $url= $fila_url; $destino=$fila_destino;
        }else{
          $url= $fila_ruta_amigable; $destino="";
        }
        $aux .= $this->fmt_li("","",$fila_nombre, $url, $destino );
      }
    }
    return $aux;
  }

  function traer_cat_hijos_menu($cat){
    $sql="SELECT cat_id, cat_nombre, cat_id_padre, cat_icono, cat_url, cat_destino, cat_ruta_amigable FROM categoria WHERE cat_id_padre='$cat' and cat_activar='1' ORDER BY cat_orden ASC";
    $rs = $this->fmt->query->consulta($sql);
    $num = $this->fmt->query->num_registros($rs);
    if ($num>0){
      for ($i=0; $i<$num; $i++){

        list($fila_id, $fila_nombre, $fila_id_padre, $fila_icono, $fila_url, $fila_destino, $fila_ruta_amigable) =  $this->fmt->query->obt_fila($rs);

        if (!empty($fila_url)){
          $url= $fila_url; $destino=$fila_destino;
        }else{
          $url= $fila_ruta_amigable; $destino="";
        }
        if ( $this->tiene_cat_hijos($fila_id) ){
          $aux .= $this->fmt_li_hijos($fila_id, $fila_nombre);
        } else {
          $aux .= $this->fmt_li("","",$fila_nombre, $url, $destino );
        }
      }
      return $aux;
    }
  }

  function fmt_li($clase, $icono, $nombre,$url, $destino ){
    $aux = '<li class="'.$clase.'"><a href="'.$url.'" target="'.$destino.'"><i class="'.$icono.'"></i>'.$nombre.'</a></li>';
    return $aux;
  }

  function tiene_cat_hijos($id){
    $sql="SELECT cat_id FROM categoria WHERE cat_id_padre=$id";
    $rs=$this->fmt->query->consulta($sql);
    $num=$this->fmt->query->num_registros($rs);
    if($num>0){
      return true;
    }else{
      return false;
    }
  }

  function fmt_li_hijos($id, $nombre){
    $aux  = '<li class="dropdown">';
    $aux .= ' <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$nombre.'<span class="caret"></span></a>';
    $aux .=   '<ul class="dropdown-menu animated fadeIn">';
    $aux .=     $this->traer_cat_hijos_menu($id);
    $aux .=   '</ul>';
    $aux .= '</li>';
    return $aux;
  }

}

?>
