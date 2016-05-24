<?php
header('Content-Type: text/html; charset=utf-8');

class USUARIO{

  var $constructor;

  function __construct($fmt){
    $this->fmt = $fmt;
  }

  function nombre_rol($id_rol){
    $sql ="SELECT rol_nombre  FROM roles WHERE rol_id='$id_rol'";
    $rs = $this->fmt->query-> consulta($sql);
    $fila = $this->fmt->query-> obt_fila($rs);
    return $fila["rol_nombre"];
  }

  function id_rol_usuario($id_usu){
    $sql ="SELECT rol_rel_rol_id FROM roles_rel WHERE rol_rel_usu_id='$id_usu'";
    $rs = $this->fmt->query-> consulta($sql);
    $fila = $this->fmt->query->obt_fila($rs);
    return $fila["rol_rel_rol_id"];
  }

  function rol_usuario($id_usu){
    $sql ="SELECT rol_rel_rol_id FROM roles_rel WHERE rol_rel_usu_id='$id_usu'";
    $rs = $this->fmt->query-> consulta($sql);
    $fila = $this->fmt->query->obt_fila($rs);
    $id = $fila["rol_rel_rol_id"];
    if (isset($id)){
      $sql1 ="SELECT rol_nombre FROM roles WHERE rol_id='$id'";
      $rs1 = $this->fmt->query-> consulta($sql1);
      $fila1 = $this->fmt->query->obt_fila($rs1);
      return $fila1["rol_nombre"];
    }else {
      return "sin rol";
    }
  }

  function nombre_usuario($usuario){
    $sql="select usu_nombre from usuarios where usu_id=$usuario";
    $rs = $this->fmt->query-> consulta($sql);
    $fila = $this->fmt->query->obt_fila($rs);
    return $fila["usu_nombre"];
  }

  function apellidos_usuario($usuario){
    $sql="select usu_apellidos from usuarios where usu_id=$usuario";
    $rs = $this->fmt->query-> consulta($sql);
    $fila = $this->fmt->query->obt_fila($rs);
    return $fila["usu_apellidos"];
  }

  function imagen_usuario($usuario){
    $sql="select usu_imagen from usuarios where usu_id=$usuario";
    $rs = $this->fmt->query-> consulta($sql);
    $fila = $this->fmt->query->obt_fila($rs);
    return $fila["usu_imagen"];
  }


}
