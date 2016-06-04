<?php
header('Content-Type: text/html; charset=utf-8');

class CLASSSISTEMAS{

  var $fmt;

  function __construct($fmt){
    $this->fmt = $fmt;
  }

  function id_sistemas(){

  }

  function nombre_sistema($id_sis){
    $sql="SELECT mod_nombre FROM modulos WHERE  mod_id='$id_sis'";
    $rs = $this->fmt->query -> consulta($sql);
    $fila = $this->fmt->query->obt_fila($rs);
    return $fila["mod_nombre"];
  }

  function modulos_sistema($id_sis){
    $sql="SELECT modulos_mod_id FROM sistemas_modulos WHERE sistemas_sis_id='$id_sis'";
    $rs = $this->fmt->query -> consulta($sql);
    $num = $this->fmt->query -> num_registros($rs);
    if ($num > 0){
      for ( $i=0; $i < $num; $i++){
				list($fila_id) = $this->fmt->query->obt_fila($rs);
        $aux .= "- ".$this->nombre_sistema($fila_id)."</br>";
      }
    }
    return $aux;
  }

  function opciones_modulos($id_sis){
		$sql ="SELECT mod_id, mod_nombre FROM modulos where mod_activar='1' and mod_tipo<>'2'";
		$rs = $this->fmt->query -> consulta($sql);
		$num = $this->fmt->query -> num_registros($rs);
		$ck="";
		if ($num > 0){
			for ( $i=0; $i < $num; $i++){
				list($fila_id, $fila_nombre) = $this->fmt->query->obt_fila($rs);
        if(!empty($id_sis)){
          $sql_mod ="SELECT modulos_mod_id FROM sistemas_modulos WHERE sistemas_sis_id='$id_sis' and modulos_mod_id='$fila_id'";
          $rs_mod = $this->fmt->query -> consulta($sql_mod);
          $fila_mod = $this->fmt->query -> obt_fila($rs_mod);
          if ($fila_mod['modulos_mod_id']==$fila_id) { $ck="checked"; }else{ $ck=""; }
          $this->fmt->query->liberar_consulta($rs_mod);
        }
				$aux .= '<div class="checkbox">';
				$aux .= '<label>';
				$aux .= '<input type="checkbox" name="inputModulo[]" value="'.$fila_id.'" '.$ck.'>';
				$aux .= '<i class="'.$fila_icono.'"></i> '.$fila_nombre;
				$aux .= '</label>';
				$aux .= '</div>';
			}
		} else {
			$aux =" no existen modulos registrados";
		}
		return $aux;
	}

}
?>
