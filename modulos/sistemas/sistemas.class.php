<?php

header("Content-Type: text/html;charset=utf-8");

class SISTEMAS{

	var $fmt;
	var $id_mod;

	function SISTEMAS($fmt){
		$this->fmt = $fmt;
		$this->fmt->get->validar_get($_GET['id_mod']);
		$this->id_mod=$_GET['id_mod'];
	}

  function busqueda(){
      $botones = $this->fmt->class_pagina->crear_btn("sistemas.adm.php?tarea=form_nuevo&id_mod=$this->id_mod","btn btn-primary","icn-plus","Nuevo Sistema");  // link, tarea, clase, icono, nombre
      $this->fmt->class_pagina->crear_head( $this->id_mod, $botones); // bd, id modulo, botones
      ?>
      <div class="body-modulo">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nombre del Sistema</th>
              <th>Tipo</th>
							<th>Modulos</th>
              <th>Publicación</th>
              <th class="col-xl-offset-2">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql="select sis_id, sis_nombre, sis_descripcion, sis_icono, sis_tipo, sis_activar, sis_orden from sistemas	ORDER BY sis_id desc";
              $rs =$this->fmt->query-> consulta($sql);
              $num=$this->fmt->query->num_registros($rs);
              if($num>0){
              for($i=0;$i<$num;$i++){
                list($fila_id,$fila_nombre,$fila_descripcion,$fila_icono,$fila_tipo,$fila_activar,$fila_orden)=$this->fmt->query->obt_fila($rs);
              ?>
              <tr>
                <td  class="col-nombre"><i class="icn <?php echo $fila_icono; ?>"></i> <?php echo $fila_nombre; ?></td>
                <?php // if($fila_tipo=="2"){ $aux ="disabled"; } ?>
                <td class="col-tipo-modulo"><?php echo $this->tipo_sistema($fila_tipo); ?></td>
								<td ><?php echo $this->fmt->class_sistema->modulos_sistema($fila_id); ?> </td>
                <td class="estado">
                  <?php
                    $this->fmt->class_modulo->estado_publicacion($fila_activar,"modulos/sistemas/sistemas.adm.php", $this->id_mod,$aux, $fila_id ); // query, id item, ruta, id modulo, aux disabled
                  ?>
                </td>
                <td class="col-xl-offset-2 acciones">

                  <a  id="btn-editar-modulo" class="btn btn-accion btn-editar <?php echo $aux; ?>" href="sistemas.adm.php?tarea=form_editar&id=<? echo $fila_id; ?>&id_mod=<? echo $this->id_mod; ?>" title="Editar <? echo $fila_id."-".$fila_url; ?>" ><i class="icn-pencil"></i></a>
                  <a  title="eliminar <? echo $fila_id; ?>" type="button" idEliminar="<? echo $fila_id; ?>" nombreEliminar="<? echo $fila_nombre; ?>" class="btn btn-eliminar btn-accion <?php echo $aux; ?>"><i class="icn-trash"></i></a>
                </td>
              </tr>
              <?php
               } // Fin for query1
              }// Fin if query1
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php
        $this->fmt->class_modulo->script_form("modulos/sistemas/sistemas.adm.php",$this->id_mod);
  }  // fin busqueda

  function form_nuevo(){
		$botones = $this->fmt->class_pagina->crear_btn("sistemas.adm.php?tarea=busqueda&id_mod=$this->id_mod","btn btn-link  btn-volver","icn-chevron-left","volver"); // link, clase, icono, nombre
		$this->fmt->class_pagina->crear_head_form("Nuevo Sistema", $botones,"");// nombre, botones-left, botones-right
		echo "<a href='javascript:location.reload()'><i class='icn-sync'></i></a>";
		?>
		<div class="body-modulo col-xs-6 col-xs-offset-3">
			<form class="form form-modulo" action="sistemas.adm.php?tarea=ingresar&id_mod=<? echo $this->id_mod; ?>"  method="POST" id="form-nuevo">
				<div class="form-group" id="mensaje-login"></div> <!--Mensaje form -->

				<div class="form-group control-group">
					<label>Nombre Sistema</label>
					<div class="input-group controls">
						<span class=" color-border-gris-a  color-text-gris input-group-addon form-input-icon"><i class="<? echo $this->fmt->class_modulo->icono_modulo($this->id_mod); ?>"></i></span>
						<input class="form-control input-lg color-border-gris-a color-text-gris form-nombre"  id="inputNombre" name="inputNombre" placeholder=" " type="text" autofocus />
					</div>
				</div>

				<div class="form-group form-descripcion">
					<label>Descripción</label>
					<textarea class="form-control" rows="5" id="inputDescripcion" name="inputDescripcion" placeholder=""></textarea>
				</div>

				<div class="form-group">
					<label>Icono Sistema</label>
					<input class="form-control" id="inputIcono" name="inputIcono"  placeholder="" />
				</div>
				<div class="form-group">
					<label>Modulos:  </label>
					<?php echo $this->fmt->class_sistema->opciones_modulos("");  ?>
				</div>
				<div class="form-group">
					<label>Tipo Sistema:  </label>
					<select class="form-control form-select" name="inputTipo" id="inputTipo">
							<?php echo $this->opciones_tipo("");  ?>
					</select>
				</div>
				<div class="form-group form-botones">
					 <button type="submit" class="btn btn-info  btn-guardar color-bg-celecte-b btn-lg" name="btn-accion" id="btn-guardar" value="guardar"><i class="icn-save" ></i> Guardar</button>
					 <button type="submit" class="btn btn-success color-bg-verde btn-activar btn-lg" name="btn-accion" id="btn-activar" value="activar"><i class="icn-eye-open" ></i> Activar</button>
				</div>
			</form>
		</div>
		<?php
	}

	function form_editar(){

		$botones = $this->fmt->class_pagina->crear_btn("sistemas.adm.php?tarea=busqueda&id_mod=$this->id_mod","btn btn-link  btn-volver","icn-chevron-left","volver"); // link, clase, icono, nombre
		$this->fmt->class_pagina->crear_head_form("Editar Sistema", $botones,"");// nombre, botones-left, botones-right
		$this->fmt->get->validar_get ( $_GET['id'] );
		$id = $_GET['id'];

		$sql="select sis_id, sis_nombre, sis_descripcion, sis_tipo, sis_icono, sis_activar from sistemas	where sis_id='".$id."'";
		$rs=$this->fmt->query->consulta($sql);
		$num=$this->fmt->query->num_registros($rs);
			if($num>0){
				for($i=0;$i<$num;$i++){
					list($fila_id,$fila_nombre,$fila_descripcion,$fila_tipo,$fila_icono,$fila_activar)=$this->fmt->query->obt_fila($rs);
				}
			}
		?>
		<div class="body-modulo col-xs-6 col-xs-offset-3">
			<form class="form form-modulo" action="sistemas.adm.php?tarea=modificar&id_mod=<? echo $this->id_mod; ?>"  method="POST" id="form-nuevo">
				<div class="form-group" id="mensaje-login"></div> <!--Mensaje form -->

				<div class="form-group control-group">
					<label>Nombre Sistema</label>
					<div class="input-group controls">
						<span class=" color-border-gris-a  color-text-gris input-group-addon form-input-icon"><i class="<? echo $fila_icono; ?>"></i></span>
						<input class="form-control input-lg color-border-gris-a color-text-gris form-nombre"  id="inputNombre" name="inputNombre" value="<? echo $fila_nombre; ?>" placeholder=" " type="text" autofocus />
						<input type="hidden" id="inputId" name="inputId" value="<?php echo $fila_id; ?>" />
					</div>
				</div>

				<div class="form-group form-descripcion">
					<label>Descripción</label>
					<textarea class="form-control" rows="5" id="inputDescripcion" name="inputDescripcion" placeholder=""><? echo $fila_descripcion; ?></textarea>
				</div>
				<div class="form-group">
					<label>Icono modulo</label>
					<input class="form-control" id="inputIcono" name="inputIcono"  placeholder="" value="<? echo $fila_icono; ?>"/>
				</div>

				<div class="form-group">
					<label>Modulos:  </label>
					<?php echo $this->fmt->class_sistema->opciones_modulos($fila_id);  ?>
				</div>

				<div class="form-group">
					<label>Tipo Sistema:  </label>
					<select class="form-control form-select" name="inputTipo" id="inputTipo">
						<?  echo $this->opciones_tipo($fila_tipo);  ?>
					</select>
				</div>
				<div class="form-group">
					<label class="radio-inline">
						<input type="radio" name="inputActivar" id="inputActivar" value="0" <?php if ($fila_activar==0){ echo "checked"; } ?> > Desactivar
					</label>
					<label class="radio-inline">
						<input type="radio" name="inputActivar" id="inputActivar" value="1" <?php if ($fila_activar==1){ echo "checked"; $aux="Activo"; } else { $aux="Activar"; } ?> > <? echo $aux; ?>
					</label>
				</div>
				<div class="form-group form-botones">
					 <button  type="button" class="btn btn-danger btn-eliminar color-bg-rojo-a" idEliminar="<? echo $fila_id; ?>" nombreEliminar="<? echo $fila_nombre; ?>" name="btn-accion" id="btn-eliminar" value="eliminar"><i class="icn-trash" ></i> Eliminar Sistema</button>

					 <button type="submit" class="btn btn-info  btn-actualizar hvr-fade btn-lg color-bg-celecte-c btn-lg" name="btn-accion" id="btn-activar" value="actualizar"><i class="icn-sync" ></i> Actualizar</button>
				</div>
			</form>
		</div>
		<?php
		 $this->fmt->class_modulo->script_form("modulos/sistemas/sistemas.adm.php",$this->id_mod);
	}

	function ingresar(){

		if ($_POST["btn-accion"]=="activar"){
			$activar=1;
		}
		if ($_POST["btn-accion"]=="guardar"){
			$activar=0;
		}

		$ingresar ="sis_nombre, sis_descripcion, sis_tipo, sis_icono, sis_activar";
		$valores  ="'".$_POST['inputNombre']."','".
									 $_POST['inputDescripcion']."','".
									 $_POST['inputTipo']."','".
									 $_POST['inputIcono']."','".
									 $activar."'";

		$sql="insert into sistemas (".$ingresar.") values (".$valores.")";
		$this->fmt->query->consulta($sql);

		$sql="select max(sis_id) as id_sis from sistemas";
		$rs= $this->fmt->query->consulta($sql);
		$fila = $this->fmt->query->obt_fila($rs);
	  $id = $fila ["id_sis"];

		$mod = $_POST['inputModulo'];
		$cont_mod= count($mod);
		$ingresar1 ="sistemas_sis_id, modulos_mod_id";
		for($i=0; $i < $cont_mod; $i++){
			$valores1 = "'".$id."','".$mod[$i]."'";
			$sql1="insert into sistemas_modulos (".$ingresar1.") values (".$valores1.")";
			$this->fmt->query->consulta($sql1);
		}

		header("location: sistemas.adm.php?id_mod=".$this->id_mod);
	} // fin funcion ingresar

	function modificar(){
		if ($_POST["btn-accion"]=="eliminar"){}
		if ($_POST["btn-accion"]=="actualizar"){

			$sql="UPDATE sistemas SET
						sis_nombre='".$_POST['inputNombre']."',
						sis_descripcion='".$_POST['inputDescripcion']."',
						sis_tipo='".$_POST['inputTipo']."',
						sis_icono='".$_POST['inputIcono']."',
						sis_activar='".$_POST['inputActivar']."'
	          WHERE sis_id='".$_POST['inputId']."'";
			$this->fmt->query->consulta($sql);

			$sql1="DELETE FROM sistemas_modulos WHERE sistemas_sis_id='".$_POST['inputId']."'";
			$this->fmt->query->consulta($sql1);

			$mod = $_POST['inputModulo'];
			$cont_mod= count($mod);
			$ingresar1 ="sistemas_sis_id, modulos_mod_id";
			for($i=0; $i < $cont_mod; $i++){
				$valores1 = "'".$_POST['inputId']."','".$mod[$i]."'";
				$sql1="insert into sistemas_modulos (".$ingresar1.") values (".$valores1.")";
				$this->fmt->query->consulta($sql1);
			}

		}
		header("location: sistemas.adm.php?id_mod=".$this->id_mod);
	}

	function eliminar(){
		$this->fmt->get->validar_get ( $_GET['id'] );
		$id= $_GET['id'];

		$sql1="DELETE FROM sistemas_modulos WHERE sistemas_sis_id='".$id."'";
		$this->fmt->query->consulta($sql1);

		$sql="DELETE FROM sistemas WHERE sis_id='".$id."'";
		$this->fmt->query->consulta($sql);

		$up_sqr6 = "ALTER TABLE sistemas AUTO_INCREMENT=1";
		$this->fmt->query->consulta($up_sqr6);
		header("location: sistemas.adm.php?id_mod=".$this->id_mod);
	}

	function activar(){
		$this->fmt->get->validar_get ( $_GET['estado'] );
		$this->fmt->get->validar_get ( $_GET['id'] );
		$sql="update sistemas set
				sis_activar='".$_GET['estado']."' where sis_id='".$_GET['id']."'";
		$this->fmt->query->consulta($sql);
		header("location: sistemas.adm.php?id_mod=".$this->id_mod);
	}

	function tipo_sistema($sis_tipo){

		switch ($sis_tipo) {
			case '0':
				$sis_tipo="Multiproposito";
				break;
			case '1':
				$sis_tipo="CMS";
				break;
			case '2':
				$sis_tipo="CRM";
			break;
			case '3':
				$sis_tipo="ERP";
				break;
			case '4':
				$sis_tipo="RRHH";
				break;
			case '5':
				$sis_tipo="PROYECTOS";
				break;
			case '6':
				$sis_tipo="FINANZAS";
				break;
			case '7':
				$sis_tipo="GERENCIA";
				break;
			case '8':
				$sis_tipo="TIC";
				break;
			case '9':
				$sis_tipo="ADM";
				break;
			case '10':
				$sis_tipo="E-commerce";
				break;
			default:
				$sis_tipo="no definido";
				break;
		}
		return $sis_tipo;
	}

	function opciones_tipo($fila_tipo){
		$tipos = Array();
		for ($i = 0; $i <= 10; $i++) {
			$tipos [$i]= $this->tipo_sistema($i);
		}

		for ($i = 0; $i <= 10; $i++) {
			if (!empty($fila_tipo)){
				if ($fila_tipo==$i){ $sel="selected"; } else {$sel="";}
			}else {
			$sel="";
			}
			$aux .='<option value="'.$i.'" '.$sel.'>'.$tipos[$i].'</option>';
		}
		return $aux;

	}

} // fin clase
?>
