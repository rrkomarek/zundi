<?php
	class PLANTILLA{

	  //var $capa;
		var $cat_nombre;
		var $cat_analitica;
		var $cat_favicon;
		var $cat_codigos;
		var $cat_theme;
		var $cat_css;
		var $cat_clase;
		var $pla_id;
		var $pla_icono;
		var $pla_css;
		var $css_cont;
		var $pla_codigos;
	  var $query;
		//var $url;

		function plantilla($conexion){
	   $this->query = $conexion;
	   //$this->capa = new VENTANA();  //revisar para que sirve
		}

		function cargar_plantilla($cat,$pla){
			//echo "Entre a cargar plantilla";
			$consulta = "SELECT
			pla_id,
			cat_nombre,
			cat_analitica,
			cat_favicon,
			cat_codigos,
			cat_clase,
			cat_css,
			cat_theme,
			pla_icono,
			pla_css,
			pla_codigos
			FROM
			plantilla,
			categoria
			WHERE cat_id = '".$cat."' and pla_id='".$pla."'";
			//echo $consulta;
			$rs = $this->query->consulta($consulta);
	    if ($rs){
				$cant = $this->query->num_registros($rs);
				if ($cant > 0){
					$fila = $this->query->obt_fila($rs);
					$this->cat_nombre     = $fila["cat_nombre"];
					$this->cat_analitica  = $fila["cat_analitica"];
					$this->cat_favicon 		= $fila["cat_favicon"];
					$this->cat_codigos 		= $fila["cat_codigos"];
					$this->cat_css 				= $fila["cat_css"];
					$this->cat_clase 			= $fila["cat_clase"];
					$this->cat_theme 			= $fila["cat_theme"];
					$this->pla_id			 		= $fila["pla_id"];
					$this->pla_icono   		= $fila["pla_icono"];
					$this->pla_css     		= $fila["pla_css"];
					$this->pla_codigos 		= $fila["pla_codigos"];
				}else{
					return false;
				}
			}else{
			    return false;
			}
		}

		function dibujar_cabecera($cat,$pla){
			  $sesion= new SESION();
				$sesion->iniciar_sesion();

				$query = new MYSQL();
			/* HTML  */
				echo '<!DOCTYPE HTML>'."\n";
			  echo '<html id="pagIndex" lang="ES">'."\n";
				echo '<head>'."\n";
				echo '	<title> '.$this->nombre_sitio().'</title>'."\n"; //Trabajar luego por categoria (No olvidar)
				echo '	<link rel="shortcut icon" href="'._RUTA_WEB.$this->get_favicon($cat).'" />'."\n";  //Trabajar luego por categoria (No olvidar)
			/* Meta Site  */
				echo '	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">'."\n";
				//echo '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />';
//echo '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15"/>';
				?>
				<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
				<?php
				echo '	<meta http-equiv="X-UA-Compatible" content="IE=10" />'."\n";
				echo '	<meta http-equiv="X-UA-Compatible" content="IE=9" />'."\n";
				echo '	<meta http-equiv="X-UA-Compatible" content="IE=8" />'."\n";
				echo '	<meta http-equiv="X-UA-Compatible" content="IE=7" />'."\n";
				?>
				<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
				<!--[if lt IE 9]>
				<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
				<script src="js/respond.min.js"></script>
				<![endif]-->
				<?php
			/* Codigo GET Categoria  */
				if(isset($_GET["cat"])){
					if (!is_numeric($_GET["cat"])){
						$id_cat_padre=$this->traer_padre($_GET["cat"]);
					}
				}else{
						$id_cat_padre=1;
				}
			/* ruta analitica  */
				$this->ruta_analitica()." \n";

			/*  Codigo css estandar  */
				?>
				<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/font-awesome.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/animate.css" rel="stylesheet" type="text/css">

				<!--  Codigo css estandar Zundi  -->

				<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/color.adm.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/icon-font.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/lato-font.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/estilos.adm.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/theme.adm.css" rel="stylesheet" type="text/css">

				<script type="text/javascript" language="javascript" src="<?php echo _RUTA_WEB; ?>js/jquery.js"></script>
				<script type="text/javascript" src="<?php echo _RUTA_WEB; ?>js/bootstrap.js"></script>

				<?php
				echo "\n<!-- css plantilla y contenedores  -->"."\n";

				if(!isset($this->pla_css)){
					echo '<link rel="stylesheet" href="'._RUTA_WEB.$this->pla_css.'" rel="stylesheet" type="text/css">'."\n";
				}
				if(!isset($this->cat_css)){
					echo '<link rel="stylesheet" href="'._RUTA_WEB.$this->cat_css.'" rel="stylesheet" type="text/css">'."\n";
				}

				$this->obtener_css($cat,$pla);

				if(isset($this->cat_theme)){
					echo '<link rel="stylesheet" href="'._RUTA_WEB.$this->cat_theme.'" rel="stylesheet" type="text/css">'."\n";
				}

				echo "<!-- fin css plantilla contenedores  -->"."\n";

			/*---------------- Codigo plantilas y categorias --------------- */
				if ($this->pla_codigos != ""){
				    echo $this->pla_codigos;
				}
				if ($this->cat_codigos != ""){
				    echo $this->cat_codigos;
				}

			/*---------------- Codigo script head --------------- */
				echo $this->scripts_head();
				?>

				<?php

			echo "\n".'</head>'."\n";
			/*---------------- Estructura inicio popups / body --------------- */
				/*if( $_GET["mod"]=="popupag") {
					echo ' <link href="css/estilos-popup.adm.css" rel="stylesheet" type="text/css" />'.'\n';
				}*/

				echo '<body onload="PaginaCargada();" class="PagBody loading" role="document" data-spy="scroll" data-target="#navigation" data-offset="80" >'."\n";
				echo '	<div id="wrapper">'."\n";
				echo '		<div id="preloader_logo"></div>'."\n";
				echo '		<div id="preloader_body"></div>'."\n";

			/*----------------  Inicio Session administrador --------------- */

				//$sesion->imprimir();

				if($sesion->existe_variable("usu_rol")){
					require_once(_RUTA_HOST.'modulos/nav/navbar.adm.php');
				} else {
					require_once(_RUTA_HOST.'/nucleo/includes/login.php');
				}

				echo '		<div id="page-content-wrapper" class="">'."\n";
				echo '			<div id="popup-div" class="popup-div animated fadeIn"></div>'."\n";

		}

		function dibujar_cuerpo($cat,$pla){
			echo "<!--  Inicio Cuerpo  -->"."\n\n";
				$rs = $this->obtener_padre($cat,$pla);
				$num = $this->query->num_registros($rs);
				if ($num > 0){
					list($cont_id, $cont_nombre, $cont_css,$cont_clase, $con_id_contenedor, $cont_codigos) = $this->query->obt_fila($rs);
					//echo "id_cont:".$cont_id;
					echo '	<div class="'.$cont_class.'" id="'.$cont_nombre.'">'."\n\n";  //inicio publicacion
						$rs_pub = $this->obtener_publicaciones($cont_id,$cat,$pla);
						$cant = $this->query->num_registros($rs_pub);
						if ($cant > 0){
							//echo "aqui pub";
							while ($fila_aux = $this->query->obt_fila($rs_pub)){
								$this->cargar_pub($fila_aux["pub_archivo"],$fila_aux["pub_id"],$cat);
							}
						}
						$this->dibujar_hijos($fila["pub_id"],$cat,$pla);
						echo $cont_codigos."\n\n";
					echo "	</div>"."\n\n";   //fin publicicion
				} // query padres
			echo "<!--  Fin Cuerpo  -->"."\n\n";
		}

		function cargar_pub($pub_archivo,$pub_id,$cat){
			define('_ESTADOPUBLICACION','false');
			//echo "p:"._RUTA_HOST.$pub_archivo;
			require(_RUTA_HOST.$pub_archivo);
		}

		function dibujar_hijos($id_hijo,$cat,$pla){
			$rs=$this->tiene_hijos($id_hijo);
			$res= $this->obtener_publicaciones($id_hijo,$idcategoria,$id_plantilla);
			while ($fila = $this->query->obt_fila($rs)){
				echo '	<div class="'.$fila["pub_clase"].'" id="'.$fila["pub_nombre"].'">'."\n\n";//inicio publicacion
  				$res = $this->obtener_publicaciones($fila["id"],$cat,$pla);
					$cant = $this->cnx->num_registros($res);
					if ($cant > 0){
						while ($fila_aux = $this->query->obt_fila($res)){
							$this->cargar_pub($fila_aux["pub_archivo"],$fila_aux["pub_id"],$cat);
						}
					}
				$this->dibujar_hijos($fila["pub_id"],$cat,$pla);
				echo "	</div>"."\n\n";   //fin publicicion
				echo $cont_codigos."\n\n";
			}
		}// fin dibujar hijos

		function tiene_cont($id,$cat,$pla){
			$ress = $this->obtener_publicaciones($id,$cat,$pla);
			$res  = $this->tiene_hijos($id);
			if (($this->query->num_registros($res) > 0)  || ($this->query->num_registros($ress)>0)){
				return true;
			} else {
					if(isset($_SESSION['usu_admin'])){
						return false;
					}
					return false;
			}
		} // fin tiene cont

		function tiene_hijos($id_hijo){
				  $consulta = " 	SELECT
										cont_nombre,
										cont_id,
										cont_clase,
										cont_css,
										cont_id_contenedor,
										cont_codigos
									FROM
									    contenedor
									WHERE
										(cont_id = '".$id_hijo."')
									ORDER BY cont_orden asc";
					//echo $consulta;
					return $this->query->consulta($consulta);
		}

		function dibujar_pie(){
				echo '		</div> <!-- fin de #page-content-wrapper -->'."\n";
				echo '	</div> <!-- fin de #wrapper-->'."\n";
				//echo '<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>';

				echo $this->scripts_footer();

				/*---------------- Codigo script estandars footer --------------- */

				//echo '<script type="text/javascript" language="javascript" src="js/jquery-ui.min.js"></script>';
				echo '<script type="text/javascript" language="javascript" src="'._RUTA_WEB.'js/core.js"></script>'."\n";
				//echo '<script type="text/javascript" src="js/bootstrap-hover-dropdown.min.js"></script>'."\n";
				//echo '<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>'."\n";
				//echo '<script type="text/javascript" src="js/dataTables.bootstrap.js"></script>'."\n";
				//echo '<script type="text/javascript" language="javascript" src="js/jquery.fancybox.js"></script>';

				echo "\n".'</body>'."\n";
				echo '</html>'."\n";
		}

    function nombre_sitio($query){
    		$consulta = "SELECT conf_nombre_sitio FROM configuracion";
    		$rs = $this->query->consulta($consulta);
    		$fila = $this->query->obt_fila($rs);
    		$nombre=$fila["conf_nombre_sitio"];
    		return $nombre;
    }

    function ruta_analitica($query){
			//echo "ruta analitica";
    		$consulta = "SELECT conf_ruta_analitica FROM configuracion";
    		$rs = $this->query->consulta($consulta);
    		$fila = $this->query->obt_fila($rs);
    		$ruta=$fila["conf_ruta_analitica"];
    		echo "<meta ".$ruta." ej:analitica />";

    }

	  function scripts_head($query){
	    		$consulta = "SELECT conf_script_head FROM configuracion";
	    		$rs = $this->query->consulta($consulta);
	    		$fila = $this->query->obt_fila($rs);
	    		return $ruta=$fila["conf_script_head"];
	  }

		function scripts_footer($query){
	    		$consulta = "SELECT conf_script_footer FROM configuracion";
	    		$rs = $this->query->consulta($consulta);
	    		$fila = $this->query->obt_fila($rs);
	    		return $ruta=$fila["conf_script_footer"];
	  }

		function traer_padre($id){
			//echo "traer padre";
			$sql="select * from categoria where cat_id=".$id;
			$resultado= $this->query->consulta($sql);
			if ($rs){
				if($id_padre==0){
					return $id;
				}else{
					return $this->traer_padre($id_padre);
				}
			}
		}

		function get_favicon($idcat){
			return "images/favicon.ico";
		}

		function obtener_padre($cat,$pla){
	   	$consulta = "SELECT
						  cont_id,
						  cont_nombre,
						  cont_css,
							cont_clase,
						  cont_id_contenedor,
						  cont_codigos
					FROM
						 plantilla_rel,
						 plantilla,
						 contenedor,
						 categoria
					WHERE
						  pla_rel_id_pla = pla_id
						  AND pla_id =   pla_rel_id_pla
						  AND cont_id = pla_rel_id_cont
						  and cat_id = '".$cat."' and cont_id_contenedor ='0'
						  and pla_id='".$pla."'
					 ORDER BY cont_orden asc";
	   return $this->query->consulta($consulta);
		}

		function obtener_publicaciones($id,$cat,$pla){
			$consulta = " SELECT
								pub_archivo,
								pub_id,
								cont_rel_orden
						FROM
							 contenedor_rel inner join publicacion on (cont_rel_id_pub=pub_id)
						WHERE
								(cont_rel_id_cont = '".$id."' ) and
								(cont_rel_id_cat= '".$cat."' ) and cont_rel_id_pla='".$pla."' and cont_rel_activar='1'
						ORDER BY cont_rel_orden asc";
			//echo $consulta;
			return $this->query->consulta($consulta);

		}

		function obtener_css($cat,$pla){
			$rs = $this->obtener_padre($cat,$pla);
			if ($this->query->num_registros($rs) > 0){
				while ($fila = $this->query->obt_fila($rs)){
						echo '<link rel="stylesheet" href="'._RUTA_WEB.$fila["cont_css"].'" rel="stylesheet" type="text/css">'."\n";
						$this->obtener_css_hijos($fila["cont_id"],$cat);
				}
			}
		}

		function obtener_css_hijos($id_hijo,$cat){
      $rse=$this->tiene_hijos($id_hijo);
			if ($this->query->num_registros($rse) > 0){
			    while ($fila1 = $this->query->obt_fila($rs)){
						echo '<link rel="stylesheet" href="'._RUTA_WEB.$fila["cont_css"].'" rel="stylesheet" type="text/css">'."\n";
            $this->obtener_css_hijos($fila1["cont_id"],$cat);
				}
			}
		}

}  /*  Fin de plantilla */
?>
