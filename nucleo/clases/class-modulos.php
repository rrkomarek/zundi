<?PHP
header('Content-Type: text/html; charset=utf-8');

class CLASSMODULOS{

  var $fmt;

  function __construct($fmt) {
    $this->fmt = $fmt;
  }

	function estado_publicacion( $estado,$link,$id_mod,$disabled,$id){
		$link = _RUTA_WEB.$link;
		if( $estado==1){
      		echo "<a title='activo' class='btn btn-fila-activar $disabled' href='$link?tarea=activar&estado=0&id=$id&id_mod=$id_mod' ><i class='icn-eye-open color-text-negro-b'></i></a>";
  		}else{
      		echo "<a title='desactivado' class='btn btn-fila-activar $disabled' href='$link?tarea=activar&estado=1&id=$id&id_mod=$id_mod' ><i class='icn-eye-close color-text-gris-a'></i></a>";
  		};
	}

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
	}

	function script_page($FileModulo){
		?>
			<script language="JavaScript">
			$(document).ready(function()
			{

			});
			</script>
		<?php
	}  // fin script_busqueda()

	function script_form($ruta,$id_mod){
		?>
			<script language="JavaScript">
				$(".btn-eliminar").click(function() {
					id = $( this ).attr("idEliminar");
					nombre = $( this ).attr("nombreEliminar");
				  url = "<? echo _RUTA_WEB.$ruta; ?>?tarea=eliminar&id_mod=<? echo $id_mod; ?>&id="+id;
					if(confirm('¿Estas seguro de ELIMINAR: "'+ nombre +'" ?')){
					  //alert(url);
					  document.location.href=url;
					}
				});
			</script>
		<?php
	}

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

	function icono_modulo($id){
		$sql="select mod_icono from modulos where mod_id=$id";
		$rs=$this->fmt->query->consulta($sql);
		$fila=$this->fmt->query->obt_fila($rs);
		return $fila["mod_icono"];
	} //Fion nombre usuario

	function mombre_modulo($id){
		$sql="select mod_nombre from modulos where mod_id=$id";
    $rs=$this->fmt->query->consulta($sql);
		$fila=$this->fmt->query->obt_fila($rs);
		return $fila["mod_nombre"];
	} //Fion nombre usuario

	function get_modulo_id (){

		if (isset($_GET['mod_id'])){
		return $_GET['mod_id'];
		}else {
		return 0;
		}

	}

}
?>
