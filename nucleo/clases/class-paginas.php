<?PHP
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL & ~E_NOTICE);

class CLASSPAGINAS{


/* ---------------- Funcion Verificar ---------------------- */

	function verificar(){
		include_once("sesion.php");
		$sesion= new SESION();
		$sesion->iniciar_sesion();
		$mysite_username = $sesion->get_variable("mysite_username");
		if(!$sesion->existe_variable("mysite_username"))
		{
			echo "<script>";
			echo "window.location = '../registrarse.php'";
			echo "</script>";
		}
	}

/* ---------------- Funcion crear head ---------------------- */

	function crear_head($query,$id_mod,$botones){

		$sql ="SELECT mod_nombre,mod_icono FROM modulos WHERE mod_id=$id_mod";
		$rs = $query -> consulta($sql);
		$row = $query -> obt_fila ($rs);
		$nom = $row["mod_nombre"];
		$icon = $row["mod_icono"];
		?>
		<div class="head-modulo">
		<h1 class="title-page pull-left"><i class="<? echo $icon; ?>"></i> <? echo $nom; ?></h1>
		 	<div class="head-botones pull-right">
			 	<?php echo $botones; ?>
		 	</div>
		</div>
		<?php
	}  // fin crear head

	/* ---------------- Funcion crear form ---------------------- */

		function crear_head_form( $nombre,$botones_left, $botones_right){
			?>
			<div class="head-modulo row">
			<div class="head-botones pull-left">
				 	<?php echo $botones_left; ?>
			</div>
			<h1 class="title-form col-xs-4 col-xs-offset-3"><? echo $nombre; ?></h1>
			<? if ($botones_right!=""){ ?>
				<div class="head-botones pull-right">
						<?php echo $botones_right; ?>
				</div>
			<? } ?>
			</div>
			<?php
		}  // fin crear head

/* ---------------- Traer icono ---------------------- */
	function traer_mod_icono($query, $id_mod){
		$sql ="SELECT  mod_icono FROM modulos WHERE mod_id=$id_mod";
		$rs = $query -> consulta($sql);
		$row = $query -> obt_fila ($rs);
		$icon = $row["mod_icono"];
		return $icon;
	}

/* ---------------- Funcion btn nuevo ---------------------- */

	function crear_btn($Link,$Clase,$Icon,$Nom){
		$Botones ='<a href="'.$Link.'" class="'.$Clase.'">
			 <i class="'.$Icon.'"></i> '.$Nom.'
			 </a>';
		return $Botones;
	} // fin btn nuevo

/************** Scripts ***************/
	function validar_get($get){
		require_once("class-errores.php");
		$error = new ERROR();
		if (!is_numeric($get)){
		  $error->error_modulo_no_encontrado();
		}
	}


}
?>
