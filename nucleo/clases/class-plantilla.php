<?php
header('Content-Type: text/html; charset=utf-8');

class PLANTILLA{

	  //var $capa;
		var $cat_nombre;
		var $cat_analitica;
		var $cat_favicon;
		var $cat_codigos;
		var $cat_theme;
		var $cat_css;
		var $cat_clase;
		var $cat_ruta_amigable;
		var $pla_id;
		var $pla_icono;
		var $pla_css;
		var $css_cont;
		var $pla_codigos;
		var $pla_onload;
		var $fmt;
		//var $url;

	  function __construct($fmt) {
	    $this->fmt = $fmt;
	  }

		function plantilla($fmt){
			$this->fmt = $fmt;
		}

		function cargar_plantilla($cat,$pla){
			$consulta = "SELECT
			pla_id,
			cat_nombre,
			cat_analitica,
			cat_favicon,
			cat_codigos,
			cat_clase,
			cat_css,
			cat_theme,
			cat_ruta_amigable,
			pla_icono,
			pla_css,
			pla_codigos,
			pla_onload
			FROM
			plantilla,
			categoria
			WHERE cat_id = '".$cat."' and pla_id='".$pla."'";
			//echo $consulta;
			$rs = $this->fmt->query->consulta($consulta);
	    if ($rs){
				$cant = $this->fmt->query->num_registros($rs);
				if ($cant > 0){
					$fila = $this->fmt->query->obt_fila($rs);
					$this->cat_nombre     = $fila["cat_nombre"];
					$this->cat_analitica  = $fila["cat_analitica"];
					$this->cat_favicon 		= $fila["cat_favicon"];
					$this->cat_codigos 		= $fila["cat_codigos"];
					$this->cat_css 				= $fila["cat_css"];
					$this->cat_clase 			= $fila["cat_clase"];
					$this->cat_theme 			= $fila["cat_theme"];
					$this->cat_ruta_amigable 		= $fila["cat_ruta_amigable"];
					$this->pla_id			 		= $fila["pla_id"];
					$this->pla_icono   		= $fila["pla_icono"];
					$this->pla_css     		= $fila["pla_css"];
					$this->pla_codigos 		= $fila["pla_codigos"];
					$this->pla_onload			= $fila["pla_onload"];

				}else{
					return false;
				}
			}else{
			    return false;
			}
		}

		function dibujar_cabecera($cat,$pla){

				echo $this->fmt->header->header_html($cat);

				echo "	<!-- inicio css plantilla contenedores  -->"."\n";

				if(!empty($this->pla_css)){
					echo '	<link rel="stylesheet" href="'._RUTA_WEB.$this->pla_css.'" rel="stylesheet" type="text/css">'."\n";
				}
				if(!empty($this->cat_css)){
					echo '	<link rel="stylesheet" href="'._RUTA_WEB.$this->cat_css.'" rel="stylesheet" type="text/css">'."\n";
				}

				$this->obtener_css($cat,$pla);

				if(!empty($this->cat_theme)){
					echo '	<link rel="stylesheet" href="'._RUTA_WEB.$this->cat_theme.'" rel="stylesheet" type="text/css">'."\n";
				}

				echo "	<!-- fin css plantilla contenedores  -->"."\n";

				echo "	<!-- inicio js plantilla contenedores  -->"."\n";

				if (!empty($this->pla_codigos)){
				    echo $this->pla_codigos;
				}
				if (!empty($this->cat_codigos)){
				    echo $this->cat_codigos;
				}

				echo $this->scripts_head();

				echo "	<!-- fin js plantilla contenedores  -->"."\n";
				?>

				<?php

			echo "\n".'</head>'."\n";
			/*---------------- Estructura inicio popups / body --------------- */
				/*if( $_GET["mod"]=="popupag") {
					echo ' <link href="css/estilos-popup.adm.css" rel="stylesheet" type="text/css" />'.'\n';
				}*/

				//echo '<body onload="PaginaCargada();" class="PagBody loading" role="document" data-spy="scroll" data-target="#navigation" data-offset="80" >'."\n";
				echo '<body class="pag-body loading" id="body-'.$this->cat_ruta_amigable.'" role="document" data-spy="scroll" data-target="#navigation" data-offset="80" >'."\n";
				echo '	<div id="wrapper">'."\n";
				echo '		<div class="preloader"></div>'."\n";

			/*----------------  Inicio Session administrador --------------- */

				//$this->fmt->sesion->imprimir();

				if( $this->fmt->sesion->existe_variable("usu_rol") ){
					require_once(_RUTA_HOST.'modulos/nav/navbar.adm.php');
				} else {
					//echo "login";
					require_once(_RUTA_HOST.'nucleo/includes/login.php');
				}

				echo '		<div id="page-content-wrapper" class="page-content-wrapper">'."\n";
				echo '			<div id="popup-div" class="popup-div animated fadeIn"></div>'."\n";

		}

		function dibujar_cuerpo($cat,$pla){
			//echo "dibujar cuerpo";
			echo "<!--  Inicio Cuerpo  -->"."\n\n";
				$rs = $this->obtener_padre($cat,$pla);
				$num = $this->fmt->query->num_registros($rs);
				//echo "num:"+$num;
				if ($num > 0){
					list($cont_id, $cont_nombre, $cont_css,$cont_clase, $con_id_contenedor, $cont_codigos) = $this->fmt->query->obt_fila($rs);
					//echo "id_cont:".$cont_id;
					echo '	<div class="cont_'.$cont_id.' '.$cont_class.'" id="'.$cont_nombre.'">'."\n\n";  //inicio publicacion
						$rs_pub = $this->obtener_publicaciones($cont_id,$cat,$pla);
						$cant = $this->fmt->query->num_registros($rs_pub);
						if ($cant > 0){
							// echo "aqui pub";
							while ($fila_aux = $this->fmt->query->obt_fila($rs_pub)){
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
			while ($fila = $this->fmt->query->obt_fila($rs)){
				echo '	<div class="cont_'.$id_hijo.' '.$fila["pub_clase"].'" id="'.$fila["pub_nombre"].'">'."\n\n";//inicio publicacion
  				$res = $this->obtener_publicaciones($fila["id"],$cat,$pla);
					$cant = $this->cnx->num_registros($res);
					if ($cant > 0){
						while ($fila_aux = $this->fmt->query->obt_fila($res)){
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
			if (($this->fmt->query->num_registros($res) > 0)  || ($this->fmt->query->num_registros($ress)>0)){
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
										cont_id_padre,
										cont_codigos
									FROM
									    contenedor
									WHERE
										(cont_id = '".$id_hijo."')
									ORDER BY cont_orden asc";
					//echo $consulta;
					return $this->fmt->query->consulta($consulta);
		}

		function dibujar_pie(){
				echo '		</div> <!-- fin de #page-content-wrapper -->'."\n";
				echo '	</div> <!-- fin de #wrapper-->'."\n";
				//echo '<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>';

				echo $this->scripts_footer();
				echo $this->fmt->footer->footer_html();

				/*---------------- Codigo script estandars footer --------------- */

				// //echo '<script type="text/javascript" language="javascript" src="js/jquery-ui.min.js"></script>';
				// echo '<script type="text/javascript" language="javascript" src="'._RUTA_WEB.'js/core.js"></script>'."\n";
				// //echo '<script type="text/javascript" src="js/bootstrap-hover-dropdown.min.js"></script>'."\n";
				// //echo '<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>'."\n";
				// //echo '<script type="text/javascript" src="js/dataTables.bootstrap.js"></script>'."\n";
				// //echo '<script type="text/javascript" language="javascript" src="js/jquery.fancybox.js"></script>';

		}




	  function scripts_head($query){
	    		$consulta = "SELECT conf_script_head FROM configuracion";
	    		$rs = $this->fmt->query->consulta($consulta);
	    		$fila = $this->fmt->query->obt_fila($rs);
	    		return $ruta=$fila["conf_script_head"];
	  }

		function scripts_footer($query){
	    		$consulta = "SELECT conf_script_footer FROM configuracion";
	    		$rs = $this->fmt->query->consulta($consulta);
	    		$fila = $this->fmt->query->obt_fila($rs);
	    		return $ruta=$fila["conf_script_footer"];
	  }

		function traer_padre($id){
			//echo "traer padre";
			$sql="select * from categoria where cat_id=".$id;
			$resultado= $this->fmt->query->consulta($sql);
			if ($rs){
				if($id_padre==0){
					return $id;
				}else{
					return $this->traer_padre($id_padre);
				}
			}
		}

		function obtener_padre($cat,$pla){
	   	$consulta = "SELECT
						  cont_id,
						  cont_nombre,
						  cont_css,
						  cont_clase,
						  cont_id_padre,
						  cont_codigos
					FROM
						 contenedor_plantilla,
						 plantilla,
						 contenedor,
						 categoria
					WHERE
						  plantilla_pla_id = pla_id
						  AND pla_id =   plantilla_pla_id
						  AND cont_id = contenedor_cont_id
						  and cat_id = '".$cat."' and cont_id_padre ='0'
						  and pla_id='".$pla."'
					 ORDER BY cont_orden asc";
	   return $this->fmt->query->consulta($consulta);
		}

		function obtener_publicaciones($id,$cat,$pla){
			$consulta = " SELECT
								pub_archivo,
								pub_nombre,
								pub_id,
								pubrel_activar,
								pubrel_orden
						FROM
							 publicacion_rel inner join publicacion on (pubrel_pub_id=pub_id)
						WHERE
								(pubrel_cont_id = '".$id."' ) and
								(pubrel_cat_id= '".$cat."' ) and pubrel_pla_id='".$pla."' and pubrel_activar='1'
						ORDER BY pubrel_orden asc";
			//echo $consulta;
			return $this->fmt->query->consulta($consulta);

		}

		function obtener_css($cat,$pla){
			$rs = $this->obtener_padre($cat,$pla);
			if ($this->fmt->query->num_registros($rs) > 0){
				while ($fila = $this->fmt->query->obt_fila($rs)){
					 if (!empty($fila["cont_css"])){
						'<link rel="stylesheet" href="'._RUTA_WEB.$fila["cont_css"].'" rel="stylesheet" type="text/css">'."\n";
						 }
						$this->obtener_css_hijos($fila["cont_id"],$cat);
				}
			}
		}

		function obtener_css_hijos($id_hijo,$cat){
      $rse=$this->tiene_hijos($id_hijo);
			if ($this->fmt->query->num_registros($rse) > 0){
			    while ($fila1 = $this->fmt->query->obt_fila($rs)){
						if (!empty($fila["cont_css"])){
						echo '<link rel="stylesheet" href="'._RUTA_WEB.$fila["cont_css"].'" rel="stylesheet" type="text/css">'."\n";
						}
						$this->obtener_css_hijos($fila1["cont_id"],$cat);
				}
			}
		}

		function traer_opciones_plantilla($pla){
			$consulta = "SELECT pla_id, pla_nombre FROM plantilla  ORDER BY pla_id";
			$rs = $this->fmt->query->consulta($consulta);
			$num=$this->fmt->query->num_registros($rs);
				if($num>0){
				for($i=0;$i<$num;$i++){
					list($fila_id,$fila_nombre)=$this->fmt->query->obt_fila($rs);
					if ((!empty($pla))&&($fila_id==$pla)){ $aux="selected";}else{$aux="";}
					echo "<option class='' value='$fila_id' $aux> ".$fila_nombre;
					echo "</option>";
				}
			}
		}


}  /*  Fin de plantilla */
?>
