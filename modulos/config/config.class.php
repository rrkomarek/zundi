<?php
header("Content-Type: text/html;charset=utf-8");

class CONFIG{

	var $fmt;
	var $id_mod;

	function CONFIG($fmt){
		$this->fmt = $fmt;
		$this->fmt->get->validar_get($_GET['id_mod']);
		$this->id_mod=$_GET['id_mod'];
	}

	function form_editar(){
		$botones .= $this->fmt->class_pagina->crear_btn("contendedores.adm.php","btn btn-primary","icn-block-page","Contenedores");  // link, tarea, clase, icono, nombre
		$botones .= $this->fmt->class_pagina->crear_btn("publicaciones.adm.php","btn btn-primary","icn-rocket","Publicaciones");  // link, tarea, clase, icono, nombre
		$botones .= $this->fmt->class_pagina->crear_btn("plantilla.adm.php","btn
		btn-primary","icn-level-page","Plantillas");  // link, tarea, clase, icono, nombre
		$this->fmt->class_pagina->crear_head( $this->id_mod, $botones); // bd, id modulo, botones
		?>
		<div class="body-modulo">

		</div>
		<?php
  }
}
?>
