<?PHP

class CLASSMODULOS{

/************** Estado de Publicacion ***************/

	function EstadoPublicar($Estado,$Link,$Tarea,$id){
		if( $Estado==1){
      		echo "<a title='Publicado' href='$Link&tarea=$Tarea&publicar=0&id=$id'><span class='fa fa-eye'></span></a>";
  		}else{
      		echo "<a title='No Publicado' href='$Link&tarea=$Tarea&publicar=1&id=$id'><span class='fa fa-eye-slash np'></span></a>";
  		};
	} //Fin function EstadoPublicacion

/************** Scripts ***************/
	function script_busqueda($FileModulo){
	?>
		<script language="JavaScript">
			function confirma_eliminacion(mod_id, mod_nombre, mod_tarea){
			  url = "<?php echo $FileModulo; ?>&tarea="+ mod_tarea + "&id="+ mod_id;
			  if (confirm('¿Está seguro que desea eliminar "'+ mod_nombre +'" \n el Registro de la Base de Datos?'))
			  location=(url)
			}

		</script>
	<?php
	}  // fin script_busqueda()

/************** Scripts ***************/
		function script_page($FileModulo){
		?>
			<script language="JavaScript">
			$(document).ready(function()
			{

			});
			</script>
		<?php
		}  // fin script_busqueda()

/************** Scripts ***************/
		function script_form($query,$ruta,$id_mod){
		?>
			<script language="JavaScript">
			$(document).ready(function()
			{
				$("#btn-eliminar").click(function() {
				  url = "<?php echo $ruta; ?>&tarea=eliminar&id=<?php echo $id_mod; ?>";
				  if (confirm('¿Está seguro que desea eliminar "'+ mod_nombre +'" \n el Registro de la Base de Datos?'))
				  document.location=(url);
				});
			});
			</script>
		<?php
		}  // fin script_busqueda()


/************** Scripts arbol ***************/

	function script_arbol($FileModulo){
		include_once("../../nucleo/clases/class-generar-arbol.php");
  		include_once("../../nucleo/clases/class-arbol-nodo.php");
  		include_once("../../nucleo/clases/class-arbol.php");
		include_once("../../nucleo/clases/class-conexion.php");
	?>
	<script type="text/javascript" src="<?php echo _RUTA_WEB; ?>nucleo/arbol/core/lang/Bs_Misc.lib.js"></script>
	<script type="text/javascript" src="<?php echo _RUTA_WEB; ?>nucleo/arbol/core/lang/Bs_Array.class.js"></script>
	<script type="text/javascript" src="<?php echo _RUTA_WEB; ?>nucleo/arbol/components/tree/Bs_Tree.class.js"></script>
	<script type="text/javascript" src="<?php echo _RUTA_WEB; ?>nucleo/arbol/components/tree/Bs_TreeElement.class.js"></script>
	<script type="text/javascript" src="<?php echo _RUTA_WEB; ?>nucleo/arbol/core/lang/Bs_Cookie.lib.js"></script>
	<script type="text/javascript" src="<?php echo _RUTA_WEB; ?>nucleo/arbol/core/util/Bs_Wddx.class.js"></script>
	<script type="text/javascript" src="<?php echo _RUTA_WEB; ?>nucleo/arbol/core/util/Bs_XmlParser.class.js"></script>
	<script type="text/javascript" src="<?php echo _RUTA_WEB; ?>nucleo/arbol/components/checkbox/Bs_Checkbox.class.js"></script>

		<script language="JavaScript">
			function init(val){
				if(val=='1')
				{
				<?
					$cnx = new Tconexion();
					$cnx->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);

					$arbol = new TArbol();
					$arbol->nombreVariable="a";
					$vector = obtener_tabla($_GET['id'],$cnx,categoria_contenidos, id_contenido);
					llenarPrincipal($arbol,$cnx,$vector);
					echo $arbol->toJavascript();
				?>
				}
				else
				{
					<?
					$cnx = new Tconexion();
					$cnx->conectar(_BASE_DE_DATOS, _HOST, _USUARIO, _PASSWORD);
			        $arbol = new TArbol();
					$arbol->nombreVariable="a";
					llenarPrincipal($arbol,$cnx,'');
					echo $arbol->toJavascript();
				?>
				}


			  t = new Bs_Tree();
		  	  t.imageDir="<?php echo _RUTA_WEB; ?>nucleo/arbol/components/tree/img/";
			  t.imgHeight = '20';
			  t.imgWidth ='20' ;
			 // t.e.setTamCheck();
			 t.useCheckboxSystem  = true;
			  //t.imgWidth='100';
			  //      t.setTamChecks();
			 t.checkboxSystemImgDir = '<?php echo _RUTA_WEB; ?>nucleo/arbol/components/checkbox/img/';
			  t.useAutoSequence=false;
			  //t.rememberState = true;
			  t.initByArray(a);
			   //     t.setTamCheck('1','1');
			   // t.autoCollapse = true;
			  //t.expandAll();
			  t.drawInto('treeDiv1');
			//  t.applyState();
		   }
		</script>
	<?php
	}  // fin script_busqueda()

/************** Estructurar Fecha ***************/

	function Estructurar_Fecha($Fecha){
	    $Fechas = explode("-", $Fecha);
	    $ano=$Fechas[0];
	    $mes=(string)(int)$Fechas[1];
	    $dia=(string)(int)$Fechas[2];


	    $day = array(' ','Lunes','Martes','Miercoles','Jueves','Viernes');
	    $month = array(' ','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');


	    $F .= "<span class='Dia'>".$dia." </span>";
	    $F .= "<span class='Mes'>".$month[$mes]." </span>";
	    $F .= "<span class='Ano'>".$ano." </span>";

		return $F;
	}

	function Estructurar_Fecha_input($Fecha){
	    $Fechas = explode("-", $Fecha);
	    $ano=$Fechas[0];
	    $mes=(string)(int)$Fechas[1];
	    $dia=(string)(int)$Fechas[2];
	    return $dia."/".$mes."/".$ano;
	}

	function Restructurar_Fecha($Fecha){
	    $Fechas = explode("/", $Fecha);
	    $ano=$Fechas[2];
	    $mes=(string)(int)$Fechas[1];
	    $dia=(string)(int)$Fechas[0];
	    return $ano."-".$mes."-".$dia;
	}

/************** Estructurar compacta Fecha y hora compacta ***************/

	function Fecha_Hora_Compacta($Fecha){
	    $FechaHora = explode(" ", $Fecha);
	    $Fechas = explode("-", $FechaHora[0]);
	    $Tiempo = explode (":", $FechaHora[1]);
	    $ano=$Fechas[0];
	    $mes=(string)(int)$Fechas[1];
	    $dia=$Fechas[2];
	    $hora = $Tiempo[0];
	    $min = $Tiempo[1];
	    $seg = substr($Tiempo[2], 0, 2);


	    $day = array(' ','Lun','Mar','Mie','Jue','Vie');
	    $month = array(' ','Ene','Feb','Mar','Abr','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');


	    $F .= " <span class='Dia'>".$dia." </span>";
	    $F .= " <span class='Mes'>".$month[$mes]." </span>";
	    $F .= " <span class='Ano'>".$ano." </span>";
	    $F .= "<span class='Hora'>".$hora."</span>";
	    $F .= "<span class='Min'>".$min."</span>";
	    $F .= "<span class='Seg'>".$seg."</span>";

		return $F;
	}

/************** Estructurar Fecha  compacta ***************/

	function Fecha_Compacta($Fecha){
	    $Fechas = explode("-", $Fecha);
	    $ano=$Fechas[0];
	    $mes=(string)(int)$Fechas[1];
	    $dia=(string)(int)$Fechas[2];


	    $day = array(' ','Lun','Mar','Mie','Jue','Vie');
	    $month = array(' ','Ene','Feb','Mar','Abr','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');


	    $F .= "<span class='Dia'>".$dia." </span>";
	    $F .= "<span class='Mes'>".$month[$mes]." </span>";
	    $F .= "<span class='Ano'>".$ano." </span>";

		return $F;
	}

/************** Nombre Usuario ***************/

	function Nombre_Usuario($Usuario){

 		$query=NEW QUERY;
		$sql="select nombre from usuario where id=$Usuario";
		$query->consulta($sql);
		list($mod_nombre)=$query->valores_fila();
		return $mod_nombre;
	} //Fion nombre usuario

/************** Icono  Modulo ***************/

	function Icono_Modulo($id){

 		$query=NEW QUERY;
		$sql="select mod_icono from modulos where mod_id=$id";
		$query->consulta($sql);
		list($mod_icono)=$query->valores_fila();
		return $mod_icono;
	} //Fion nombre usuario

/************** Nombre Modulo ***************/

	function Nombre_Modulo($id){

 		$query=NEW QUERY;
		$sql="select mod_nombre from modulos where mod_id=$id";
		$query->consulta($sql);
		list($mod_nombre)=$query->valores_fila();
		return $mod_nombre;
	} //Fion nombre usuario

/************** Conocer Modulo ***************/

	function get_modulo_nombre($id){

		$query0=NEW QUERY;
		$sql0="select mod_nombre from modulos where mod_id=$id";

		$query0->consulta($sql0);
		$row= $query0->valores_columnas();

		return $row['mod_nombre'];

	}

	function get_modulo_icono($id){
		$query0=NEW QUERY;
		$sql0="select mod_icono from modulos where mod_id=$id";

		$query0->consulta($sql0);
		$row= $query0->valores_columnas();

		return $row['mod_icono'];

	}

	function get_modulo_id (){

		if (isset($_GET['mod_id'])){
		return $_GET['mod_id'];
		}else {
		return 0;
		}

	}

}
?>
