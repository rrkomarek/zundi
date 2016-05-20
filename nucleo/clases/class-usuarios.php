<?php
header('Content-Type: text/html; charset=utf-8');

class USUARIO{

  var $constructor;

  function __construct($constructor){
    $this->constructor = $constuctor;
  }

  function traer_nombre_rol($id_rol){
    $sql ="SELECT rol_nombre  FROM roles WHERE rol_id='$id_rol'";
    $rs = $this->constructor->query-> consulta($sql);
    $fila = $this->constructor->query->obt_fila($rs);
    $rol_nombre=$fila["rol_nombre"];
  }

  function traer_rol_usuario($id_usu){
    $sql ="SELECT rol_nombre  FROM roles WHERE rol_id='$id_rol'";
    $rs = $this->query-> consulta($sql);
    $fila = $this->query->obt_fila($rs);
    $rol_nombre=$fila["rol_nombre"];
  }

}
