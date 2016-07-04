<?PHP
header("Content-Type: text/html;charset=utf-8");

class FORM{

	var $fmt;

  function __construct($fmt) {
    $this->fmt = $fmt;
  }

  function head_editar($nom,$archivo,$id_mod,$botones,$id_form){
    $botones .= $this->fmt->class_pagina->crear_btn($archivo.".adm.php?tarea=busqueda&id_mod=$id_mod","btn btn-link  btn-volver","icn-chevron-left","volver"); // link, clase, icono, nombre
  	$this->fmt->class_pagina->crear_head_form("Editar ".$nom, $botones,"");
    ?>
    <div class="body-modulo col-xs-6 col-xs-offset-3">
      <form class="form form-modulo" action="<?php echo $archivo; ?>.adm.php?tarea=modificar&id_mod=<? echo $id_mod; ?>"  method="POST" id="<?php echo $id_form; ?>">
        <div class="form-group" id="mensaje-form"></div> <!--Mensaje form -->
    <?php
  }
  function head_nuevo($nom,$archivo,$id_mod,$botones,$id_form){
    $botones .= $this->fmt->class_pagina->crear_btn($archivo.".adm.php?tarea=busqueda&id_mod=$id_mod","btn btn-link  btn-volver","icn-chevron-left","volver"); // link, clase, icono, nombre
  	$this->fmt->class_pagina->crear_head_form("Nuevo ".$nom, $botones,"");
    ?>
    <div class="body-modulo col-xs-6 col-xs-offset-3">
      <form class="form form-modulo" action="<?php echo $archivo; ?>.adm.php?tarea=ingresar&id_mod=<? echo $id_mod; ?>"  method="POST" id="<?php echo $id_form; ?>">
        <div class="form-group" id="mensaje-form"></div> <!--Mensaje form -->
    <?php
  }

	function sizes_thumb(){
		?>
		<select id="inputThumb" name="inputThumb" class="form-control">
			<option value="100x100">100 x 100 px (miniatura)</option>
			<option value="300x325">300 x 325 px (productos)</option>
			<option value="400x300">400 x 300 px (slides)</option>
		</select>
		<?php
	}
  function file_form_seleccion($nom,$ruta,$id_form,$class,$class_div,$id_div,$directorio_p){
		if ($id_form == 'form_nuevo'){ $texto="para subir"; }else{ $texto="para reemplazar"; }
    ?>
    <div class="form-group <?php echo $class_div; ?>" id="<?php echo $id_div; ?>" >
      <label>Seleccionar ruta url <? echo $texto; ?> : </label>
      <?php $this->fmt->archivos->select_archivos($ruta,$directorio_p); ?>
			<br/><label>Seleccionar tamaño thumb (ancho x alto):</label>
			<?php $this->sizes_thumb(); ?>

      <br/>
			<label><? echo $nom; ?> :</label>
      <input type="file" ruta="<?php echo _RUTA_WEB; ?>" class="form-control <?php echo $class; ?>" id="inputArchivos" name="inputArchivos"  />
			<div id='prog'></div>
      <div id="respuesta"></div>
    </div>
    <?php
  }
  function file_form_nuevo($nom,$ruta,$id_form,$class,$class_div,$id_div,$directorio_p){
  	//echo $ruta;
    ?>
    <div class="form-group <?php echo $class_div; ?>" id="<?php echo $id_div; ?>" >
      <label>Seleccionar ruta url para subir : </label>
      <?php $this->fmt->archivos->select_archivos($ruta,$directorio_p); ?>
			<br/><label>Seleccionar tamaño thumb (ancho x alto):</label>
			<?php $this->sizes_thumb(); ?>
      <br/>
			<label><? echo $nom; ?> :</label>
      <input type="file" ruta="<?php echo _RUTA_WEB; ?>" class="form-control <?php echo $class; ?>" id="inputArchivos" name="inputArchivos"  />
			<div id='prog'></div>
      <div id="respuesta"></div>
    </div>
		<script>
      $(function(){
        $(".<?php echo $class; ?>").on("change", function(){
        var formData = new FormData($("#<?php echo $id_form; ?>")[0]);
        var ruta = "<?php echo _RUTA_WEB; ?>nucleo/ajax/ajax-upload.php";
        $("#respuesta").toggleClass('respuesta-form');
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
						xhr: function() {
			        var xhr = $.ajaxSettings.xhr();
			        xhr.upload.onprogress = function(e) {
								var dat = Math.floor(e.loaded / e.total *100);
			          //console.log(Math.floor(e.loaded / e.total *100) + '%');
								$("#prog").html('<div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="'+ dat +'" aria-valuemin="0" aria-valuemax="100" style="width: '+ dat +'%;">'+ dat +'%</div></div>');
			        };
			        return xhr;
				    },
            success: function(datos){
              	$("#respuesta").html(datos);
            }
          });
        });
      });
    </script>
    <?php
  }

  function file_form_editar($nom,$ruta,$id_form,$class,$class_div,$id_div,$directorio_p){
    ?>
    <div class="form-group <?php echo $class_div; ?>" id="<?php echo $id_div; ?>" >
      <label>Seleccionar ruta url para reemplazar archivo : </label>
      <?php $this->fmt->archivos->select_archivos($ruta,$directorio_p); ?>
			<br/><label>Seleccionar tamaño thumb (ancho x alto):</label>
			<?php $this->sizes_thumb(); ?>
      <br/>
			<label><? echo $nom; ?> :</label>
      <input type="file" ruta="<?php echo _RUTA_WEB; ?>" class="form-control <?php echo $class; ?>" id="inputArchivos" name="inputArchivos"  />
			<div id='prog'></div>
      <div id="respuesta"></div>
    </div>
		<script>
			$(function(){
				$(".<?php echo $class; ?>").on("change", function(){
					var formData = new FormData($("#<?php echo $id_form; ?>")[0]);
	        var ruta = "<?php echo _RUTA_WEB; ?>nucleo/ajax/ajax-upload.php";
					$("#respuesta").toggleClass('respuesta-form');
					$("#url-imagen").html('');
					$.ajax({
	            url: ruta,
	            type: "POST",
	            data: formData,
	            contentType: false,
	            processData: false,
							xhr: function() {
				        var xhr = $.ajaxSettings.xhr();
				        xhr.upload.onprogress = function(e) {
									var dat = Math.floor(e.loaded / e.total *100);
				          //console.log(Math.floor(e.loaded / e.total *100) + '%');
									$("#prog").html('<div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="'+ dat +'" aria-valuemin="0" aria-valuemax="100" style="width: '+ dat +'%;">'+ dat +'%</div></div>');
				        };
				        return xhr;
					    },
	            success: function(datos){
								//$("#respuesta").html(datos);
								var myarr = datos.split(",");
								var num = myarr.length;
								if (myarr[0]=="editar"){
									//alert(num);
									var i;
									//var datosx='';
									var url = myarr[1];
									for (i = 2; i < num; i++) {
										var datx = myarr[i].split('^');
										var dx = datx[1];
										//datosx += datx[0]+'-'+datx[1]+"<br/>";
										$("#"+datx[0]).val(datx[1]); //cambia los valores por los nuevos
									}
								}
							  var datosx='<img src="'+ dx + url +'" class="img-responsive">';
								$("#respuesta").html(datosx);
								/*	for (i = 2; i < num; i++) {
										var dat = myarr[i].split('^');
										var dx = dat[1];
										//datosx += dat[0]+'-'+dat[1]+"<br/>";
										$("#"+dat[0]).val(dat[1]); //cambia los valores por los nuevos
									}
									var datosx='<img src="'+ dx + url +'" class="img-responsive">';*/


							}
						});
				});
      });
		</script>
    <?php
  }

  function head_busqueda_simple($nom,$archivo,$id_mod,$botones){
    $botones .= $this->fmt->class_pagina->crear_btn($archivo.".adm.php?tarea=form_nuevo&id_mod=$id_mod","btn btn-primary","icn-plus","Nuevo ".$nom);
    $this->fmt->class_pagina->crear_head( $id_mod, $botones); // bd, id modulo, botones
    ?>
    <div class="body-modulo">
    <?php
  }

  function head_table(){
    ?><div class="table-responsive">
        <table class="table table-hover">
    <?php
  }

  function thead_table($cab){
    $valor = explode(":",$cab);
    $num = count($valor);
    ?><thead>
      <tr>
        <?
        for ($i=0; $i<$num;$i++){
          echo '<th>'.$valor[$i].'</th>';
        }
        ?>
      </tr>
    </thead>
    <?php
  }

  function tbody_table_open(){
    ?>
    <tbody>
  	<?php
  }
  function tbody_table_close(){
    ?>
		</tbody>
  	<?php
  }

  function footer_table(){
    ?>
        </table> <!-- fin table-->
      </div>
    <?php
  }

  function input_hidden_form($id,$valor){
    ?>
    	<input type="hidden" id="<? echo $id; ?>" name="<? echo $id; ?>" value="<?php echo $valor; ?>" />
    <?php
  }
  function input_form($label,$id,$placeholder,$valor,$class,$class_div,$mensaje){
    ?>
    <div class="form-group <?php echo $class_div; ?>">
      <label><?php echo $label; ?></label>
      <input class="form-control <?php echo $class; ?>" id="<?php echo $id; ?>" name="<?php echo $id; ?>"  placeholder="<?php echo $placeholder; ?>" value="<?php echo $valor; ?>" />
			<?php if (!empty($mensaje)){ ?>
			<p class="help-block"><?php echo $mensaje; ?></p>
			<? } ?>
    </div>
    <?php
  }

	function var_input_form($label,$id,$placeholder,$valor,$class,$class_div,$mensaje){
		$aux= '<div class="form-group '.$class_div.'">
			<label>'.$label.'</label>
			<input class="form-control '.$class.'" id="'.$id.'" name="'.$id.'"  placeholder="'.$placeholder.'" value="'.$valor.'" />';
			if (!empty($mensaje)){
				$aux .='<p class="help-block">'.$mensaje.'</p>';
			}
			$aux .= '</div>';
			return $aux;
	}

  function input_form_sololectura($label,$id,$placeholder,$valor,$class,$class_div,$mensaje){
    ?>
    <div class="form-group <?php echo $class_div; ?>">
      <label><?php echo $label; ?></label>
      <input class="form-control <?php echo $class; ?>" id="<?php echo $id; ?>" name="<?php echo $id; ?>"  placeholder="<?php echo $placeholder; ?>" value="<?php echo $valor; ?>" readonly/>
			<?php if (!empty($mensaje)){ ?>
			<p class="help-block"><?php echo $mensaje; ?></p>
			<? } ?>
    </div>
    <?php
  }
  function categoria_form($label,$id,$cat_raiz,$cat_valor,$class,$class_div){
    ?>
    <div class="form-group <?php echo $class_div; ?>">
      <label><?php echo $label; ?></label>
      <?php $this->fmt->categoria->arbol($id,$cat_raiz,$cat_valor);  ?>
    </div>
    <?php
  }
  function textarea_form($label,$id,$placeholder,$valor,$class,$class_div,$rows,$mensaje){
    ?>
    <div class="form-group <?php echo $class_div; ?>">
      <label><?php echo $label; ?></label>
      <textarea  class="form-control <?php echo $class; ?>" id="<?php echo $id; ?>" name="<?php echo $id; ?>" rows="<?php echo $rows; ?>"  placeholder="<?php echo $placeholder; ?>" ><?php echo $valor; ?></textarea>
			<?php if (!empty($mensaje)){ ?>
			<p class="help-block"><?php echo $mensaje; ?></p>
			<? } ?>
    </div>
    <?php
  }

  function select_form($label,$id,$prefijo,$from,$id_s){
    ?>
    <div class="form-group">
      <label><?php echo $label; ?></label>
      <select class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>">
    <?php
    $consulta ="SELECT ".$prefijo."id, ".$prefijo."nombre FROM ".$from;
    $rs = $this->fmt->query->consulta($consulta);
    $num=$this->fmt->query->num_registros($rs);
    echo "<option class='' value='0'>Sin selección (0)</option>";
    if($num>0){
      for($i=0;$i<$num;$i++){
        list($fila_id,$fila_nombre)=$this->fmt->query->obt_fila($rs);
        if ($fila_id==$id_s){  $aux="selected";  $aux1="disabled"; }else{ $aux1=""; $aux=""; }
        echo "<option class='' value='$fila_id' $aux $aux1 > ".$fila_nombre;
        echo "</option>";
      }
    }
    ?>
      </select>
    </div>
    <?php
  }

  function radio_activar_form($valor){
    ?>
    <div class="form-group">
      <label class="radio-inline">
        <input type="radio" name="inputActivar" id="inputActivar" value="0" <?php if ($valor==0){ echo "checked"; } ?> > Desactivar
      </label>
      <label class="radio-inline">
        <input type="radio" name="inputActivar" id="inputActivar" value="1" <?php if ($valor==1){ echo "checked"; $aux="Activo"; } else { $aux="Activar"; } ?> > <? echo $aux; ?>
      </label>
    </div>
    <?php
  }

  function botones_editar($fila_id,$fila_nombre,$nombre){
    ?>
    <div class="form-group form-botones">
       <button  type="button" class="btn btn-danger btn-eliminar color-bg-rojo-a" idEliminar="<? echo $fila_id; ?>" title="<? echo $fila_id; ?> : <? echo $fila_nombre; ?>" nombreEliminar="<? echo $fila_nombre; ?>" name="btn-accion" id="btn-eliminar" value="eliminar"><i class="icn-trash" ></i> Eliminar <? echo $nombre; ?></button>

       <button type="submit" class="btn btn-info  btn-actualizar hvr-fade btn-lg color-bg-celecte-c btn-lg" name="btn-accion" id="btn-activar" value="actualizar"><i class="icn-sync" ></i> Actualizar</button>
    </div>
    <?php
  }

  function botones_nuevo(){
    ?>
    <div class="form-group form-botones">
       <button type="submit" class="btn btn-info  btn-guardar color-bg-celecte-b btn-lg" name="btn-accion" id="btn-guardar" value="guardar"><i class="icn-save" ></i> Guardar</button>
       <button type="submit" class="btn btn-success color-bg-verde btn-activar btn-lg" name="btn-accion" id="btn-activar" value="activar"><i class="icn-eye-open" ></i> Activar</button>
    </div>
    <?php
  }

  function footer_page(){
    ?>
      </form>
    </div>
    <?php
  }

 function listar_directorios($ruta,$file){
	 if (is_dir($ruta)) {
		 if ($dh = opendir($ruta)) {
			 echo "<ul class='list-group'>";
				while (($file = readdir($dh)) !== false) {
					 if (is_dir($ruta . $file) && $file!="." && $file!=".."){
						 echo "<li class='list-group-item'style='cursor:pointer;' ".
						 'onclick="crear_space(\''.$ruta.$file.'/\',\''.$file.'\',\'/zundi/\');">'.
						 "$file <i class='icn-chevron-right' style='float:right;'></i></li>";
							echo "</li>";
					 }
				}
			 closedir($dh);
			 echo "</ul>";
		 }
		}
	}
	function listar_sub_directorios($ruta,$parent,$item){
    if (is_dir($ruta)) {
       if ($dh = opendir($ruta)) {
 				echo "<ul class='list-group'>";
          while (($file = readdir($dh)) !== false) {
 						if (is_dir($ruta . $file) && $file!="." && $file!=".."){
                echo "<li class='list-group-item'>
								<div style='cursor:pointer;' ". 'onclick="crear_space(\''.$ruta.$file.'/\',\''.$file.'\',\'/zundi/\');">'."
								$file <i class='icn-chevron-right' style='float:right;'></i></div></li>";

             }
          }
       	closedir($dh);
				$this->listar_archivos($ruta . $file . "/",$file);
 				echo "</ul></div>";
 			}
    }

	}
	function poner_ruta($ruta,$file)
	{
		$arr = explode('/',$ruta);
		$num = count($arr);
		$clave = array_search('sitios', $arr);  // $clave = 1;

		?>

			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="#" title="atras" onclick="go_back();" class="icn-chevron-left"></a></li>
				<?php
				for ($i=$clave+1; $i < $num ; $i++) {
					if ($arr[$i]==$file){ ?>
							<li class="active"><?=$arr[$i];?></li>
						<?php } else {?>
							<li><a href="#" title="<?=$arr[$i];?>" onclick="go_to();"><?=$arr[$i];?></a></li>
				<?php }
				} ?>
			</ol>

		<?php
	}

	function listar_archivos($ruta,$file){
		if (is_dir($ruta)) {
       if ($dh = opendir($ruta)) {
          while (($file = readdir($dh)) !== false) {
 						if($file!="." && $file!=".." && filetype($ruta . $file)!="dir"){
							echo "<li class='list-group-item' title='$file'>$file</li>";
 						}
          }
       	closedir($dh);
 			}
    }
	}

	function ventana_lista_directorio(){
		?>
			<div class="modal fade " id="modal_directorio" tabindex="-1" role="dialog" aria-labelledby="modal_directorio" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h3 class="modal-title" id="modal_directorio_titulo">Listado de Directorios</h3>
			      </div>
			      <div class="modal-body">
							<div class="container-fluid" id="contenedor_de_carpetas">
								<div class="col-md-3 container-fluid" style="width:200px; max-width=200px; height:300px; max-height:350px;">
										<h5> Directorio <small>sitios</small></h5>
										<div style="height:300px; overflow: scroll;" id="folder_01">
													<?php $this->listar_directorios(_RUTA_SERVER."sitios/" ); ?>
										</div>
								</div>
								<div class="col-md-9 container-fluid" style="height:300px; max-height:300px; overflow: scroll;" >
									<div id="ruta_carpeta">
										<a href="#" title="atras" class="icn-chevron-left"></a>
										Ruta: <ol class="breadcrumb" style="margin-bottom: 5px;">
										  <li><a href="#" title="atras" onclick="go_back();" class="icn-chevron-left"></a></li>
										  <li class="active"></li>
										</ol>
									</div>
									<div id="contenido_carpeta">
									</div>
								</div>
							</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Aceptar</button>
			      </div>
			    </div>
			  </div>
			</div>
			<script type="text/javascript">
					$('#modal_directorio').modal('show');

					function crear_space(ruta,file,raiz){
						var data = {"ruta":ruta, "file":file, "item":"1"};
								jQuery.ajax({
									url: raiz+'nucleo/ajax/ajax-contenido-carpeta.php',
									method: "post",
									data: data,
									success: function(data){
										jQuery('#contenido_carpeta').html(data);
									},
									error: function(){
										alert('error al cargar contenido de la carpeta.');
									}
								});
						var data1 = {"ruta":ruta, "file":file, "item":"2" };
								jQuery.ajax({
									url: raiz+'nucleo/ajax/ajax-contenido-carpeta.php',
									method: "post",
									data: data1,
									success: function(data){
										jQuery('#ruta_carpeta').html(data);
									},
									error: function(){
										alert('error al cargar contenido del breadcrumb.');
									}
								});
					}


			</script>
		<?php
	}

}
?>
