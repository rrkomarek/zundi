<?php
header('Content-Type: text/html; charset=utf-8');

class CATEGORIA{

  var $fmt;

  function __construct($fmt) {
    $this->fmt = $fmt;
  }

  function categoria_id_tipo($cat){
	$this->fmt->get->validar_get($cat);
	$consulta = "SELECT cat_tipo FROM categoria WHERE cat_id='$cat' ";
    $rs = $this->fmt->query->consulta($consulta);
    $fila = $this->fmt->query->obt_fila($rs);
    $tipo=$fila["cat_tipo"];
    return $tipo;
  }

  function categoria_id_padre($cat){
	$this->fmt->get->validar_get($cat);
	$consulta = "SELECT cat_id_padre FROM categoria WHERE cat_id='$cat' ";
    $rs = $this->fmt->query->consulta($consulta);
    $fila = $this->fmt->query->obt_fila($rs);
    $id=$fila["cat_id_padre"];
    return $id;
  }

  function nombre_categoria($cat){
	$this->fmt->get->validar_get($cat);
	$consulta = "SELECT cat_nombre FROM categoria WHERE cat_id='$cat' ";
    $rs = $this->fmt->query->consulta($consulta);
    $fila = $this->fmt->query->obt_fila($rs);
    $nombre=$fila["cat_nombre"];
    return $nombre;

  }

  function categoria_padre_sitio($cat){
	$this->fmt->get->validar_get($cat);
	$cat_padre = $this->categoria_id_padre($cat);
	$cat_tipo = $this->categoria_id_tipo($cat_padre);
	if ($cat_tipo=='2'){
		return $cat_padre;
	}
	//}else {
	//	$this->categoria_padre_sitio($cat_padre);
	//}
	return $cat_padre;
  }

  function favicon_categoria($cat){
	$this->fmt->get->validar_get($cat);
	$consulta = "SELECT cat_favicon FROM categoria WHERE cat_id='$cat' ";
    $rs = $this->fmt->query->consulta($consulta);
    $fila = $this->fmt->query->obt_fila($rs);
    $favicon=$fila["cat_favicon"];
    return $favicon;
  }

  function arbol_editable(){
    echo "<div class='arbol'>";
    $consulta = "SELECT cat_id, cat_nombre FROM categoria WHERE cat_id_padre='0'  ORDER BY cat_orden";
    $rs = $this->fmt->query->consulta($consulta);
    $num=$this->fmt->query->num_registros($rs);
      if($num>0){
      for($i=0;$i<$num;$i++){
        list($fila_id,$fila_nombre)=$this->fmt->query->obt_fila($rs);
        if ($i==$num-1) { $aux = 'icn-point-4'; } else { $aux = 'icn-point-1'; }
        echo "<div class='nodo'><i class='".$aux." i-nodo'></i> ".$fila_nombre;
        $this->accion($fila_id);
        echo "</div>";
        if ($this->tiene_hijos_cat($fila_id)){
          $this->hijos_cat($fila_id,'1')."</br>";
        }
      }
    }
    echo "</div>";
    return;
  }

  function tiene_hijos_cat($cat){
    $consulta = "SELECT cat_id  FROM categoria WHERE cat_id_padre='$cat'";
    $rs = $this->fmt->query->consulta($consulta);
    $num=$this->fmt->query->num_registros($rs);
    if ($num>0){
      return true;
    }else{
      return false;
    }
  }

  function hijos_cat($cat,$nivel){
    $consulta = "SELECT cat_id,cat_nombre  FROM categoria WHERE cat_id_padre='$cat' ORDER BY cat_orden";
    $rs = $this->fmt->query->consulta($consulta);
    $num=$this->fmt->query->num_registros($rs);
    if ($num>0){
      for($i=0;$i<$num;$i++){
        list($fila_id,$fila_nombre)=$this->fmt->query->obt_fila($rs);

        $valor_n= 25 * ($nivel+1);

        $aux_nivel = $this->img_nodo("linea",$nivel);
        echo "<div class='nodo-hijo' style='padding-left:".$valor_n."px'> ".$aux_nivel."".$fila_nombre;
        $this->accion($fila_id);
        echo "</div>";
        if ( $this->tiene_hijos_cat($fila_id) ){
          $nivel++;
          $this->hijos_cat($fila_id, $nivel);
        }
      }
    }
  }

  function img_nodo($modo,$nivel){
  }

  function accion($cat){
    $var_activo=$this->estado_activo($cat);
    if ($var_activo=="1"){ $i='icn-eye-open'; $a="1"; }else{ $i='icn-eye-close'; $a="0"; }
    echo " <i class='icn-plus btn-i btn-nuevo-i' cat='".$cat."' ></i>";
    echo " <i class='".$i." btn-i btn-activar-i' estado='".$a."'  cat='".$cat."'></i>";
    echo " <i class='icn-pencil btn-i btn-editar-i' title='editar $cat' cat='".$cat."'></i>";
    echo " <i class='icn-block-page btn-i btn-contenedores' cat='".$cat."' ></i>";
    echo " <i class='icn-trash btn-i btn-eliminar' idEliminar='".$cat."' nombreEliminar='".$this->nombre_categoria($cat)."'  cat='".$cat."' ></i>";
    return;
  }

  function estado_activo($cat){
    $consulta = "SELECT cat_activar  FROM categoria WHERE cat_id='$cat'";
    $rs = $this->fmt->query->consulta($consulta);
    $fila = $this->fmt->query->obt_fila($rs);
    return $fila['cat_activar'];
  }

  function id_plantilla_cat($cat){
    $consulta = "SELECT cat_id_plantilla  FROM categoria WHERE cat_id='$cat'";
    $rs = $this->fmt->query->consulta($consulta);
    $fila = $this->fmt->query->obt_fila($rs);
    return $fila['cat_id_plantilla'];
  }

  function traer_opciones_cat($cat){
    $id_padre=$this->categoria_id_padre($cat);
    $consulta = "SELECT cat_id, cat_nombre FROM categoria WHERE cat_id_padre='0'  ORDER BY cat_orden";
    $rs = $this->fmt->query->consulta($consulta);
    $num=$this->fmt->query->num_registros($rs);
      if($num>0){
      for($i=0;$i<$num;$i++){
        list($fila_id,$fila_nombre)=$this->fmt->query->obt_fila($rs);
        if ($fila_id==$id_padre){ $aux="selected"; }else{ $aux=""; }
        if ($fila_id==$cat){ $aux1="disabled"; }else{ $aux1=""; }
        echo "<option class='' value='$fila_id' $aux $aux1 > ".$fila_nombre;
        echo "</option>";
        if ($this->tiene_hijos_cat($fila_id)){
          $this->hijos_opciones_cat($fila_id,'1',$id_padre);
        }
      }
    }
  }

  function hijos_opciones_cat($cat,$nivel,$id_padre){
    $consulta = "SELECT cat_id,cat_nombre  FROM categoria WHERE cat_id_padre='$cat' ORDER BY cat_orden";
    $rs = $this->fmt->query->consulta($consulta);
    $num=$this->fmt->query->num_registros($rs);
    if ($num>0){
      for($i=0;$i<$num;$i++){
        list($fila_id,$fila_nombre)=$this->fmt->query->obt_fila($rs);
        $valor_n="";
        for ($j=0;$j<$nivel;$j++){
          $valor_n .='--';
        }
        if ($fila_id==$id_padre){ $aux="selected"; }else{ $aux=""; }
        if ($fila_id==$cat){ $aux1="disabled"; }else{ $aux1=""; }
        echo "<option class='' value='$fila_id' $aux  $aux1 > ".$valor_n.$fila_nombre;
        echo "</option>";
        if ( $this->tiene_hijos_cat($fila_id) ){
          $nivel++;
          $this->hijos_opciones_cat($fila_id, $nivel);
        }
      }
    }
  }

  function opciones_tipo_cat($cat){
    $consulta = "SELECT cat_tipo  FROM categoria WHERE cat_id='$cat'";
    $rs = $this->fmt->query->consulta($consulta);
    $fila = $this->fmt->query->obt_fila($rs);

    for($i=0;$i<3;$i++){
      if ($fila["cat_tipo"]==$i){ $aux="selected"; }else{ $aux=""; }
      echo "<option class='' value='".$i."' ".$aux." > ".$this->tipo_cat($i);
      echo "</option>";
    }
  }

  function tipo_cat($tipo){
    switch ($tipo) {
      case '0':
        return "Estandar";
        break;
      case '1':
        return "Logeada";
        break;
      case '2':
        return "Sitio";
        break;

      default:
        return "error";
        break;
    }
  }

  function opciones_destino($destino){
      $aux="";
      if ($destino=="_self"){ $aux ="selected"; }
      if ($destino=="_blank"){ $aux ="selected"; }
      echo "<option class='' value='_self' > La misma página (_self)</option>";
      echo "<option class='' value='_blank' > En otra pestaña (_blank)</option>";
  }

}
?>
