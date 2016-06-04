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

}
?>
