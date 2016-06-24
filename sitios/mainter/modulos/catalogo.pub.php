<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
require_once("nav.pub.php");
?>
<div class="container-fluid catalogo">
  <div class="side-bar-m">
   <?php require_once("sidebar.pub.php"); ?>
  </div>
  <div class="body-page-m" id="body-page-m">
    <div class="page container">
      <div class="title-page">
	      <h2><?php echo $fmt->categoria->nombre_categoria($cat); ?></h2>
	      <span><?php echo $fmt->categoria->descripcion($cat,"categoria","cat_"); ?></span>
      </div>
    </div>
    <div class="categorias">
	      <div class="container">
		      <div class="title-cat">CATEGORIAS</div>
		      <div class="box-cat">
			      <?php
				  $sql="select mod_prod_cat_id from mod_productos_cat where mod_prod_cat_idcat='".$cat."' and mod_prod_cat_activar='1'";
					$rs=$fmt->query->consulta($sql);
          $fila = $fmt->query->obt_fila($rs);
          $id_cat =   $fila["mod_prod_cat_id"];
          $sql2="select mod_prod_cat_id,mod_prod_cat_nombre from mod_productos_cat where mod_prod_cat_id_padre='".$id_cat."' and mod_prod_cat_activar='1'";
          $rs2=$fmt->query->consulta($sql2);
          $num = $fmt->query->num_registros($rs2);
          if (empty($_GET['c'])){
            $aux="active";
          }else{
            $aux="";
            $cat_prod=$_GET['c'];
          }
          $url_todos = _RUTA_WEB.$fmt->categoria->ruta_amigable($cat);
            echo "<li class='".$aux."'><a class='btn btn-prod-cat' href='".$url_todos."'><span> Todos </span></a></li>";
				  	if($num>0){
				  		for($i=0;$i<$num;$i++){
				  			list($fila_id,$fila_nombre)=$fmt->query->obt_fila($rs2);
                $url = $url_todos."/c=".$fila_id;
                if ($cat_prod==$fila_id){ $aux1="active"; }else { $aux1=""; }
				  			echo "<li class='".$aux1."'><a class='btn btn-prod-cat' href='".$url."'><span>".$fila_nombre."</span></a></li>";
				  		}
				  	}
				  ?>
		      </div>
          <div class="box-buscar">
            <div class="title-cat">BUSCAR</div>
            <div class="buscador">
              <form id="form_id" class="" action="index.html" method="post">
                <input autocomplete="off" class="autocomplete-input clear-input clear-input-text ui-autocomplete-input autocomplete-input" data-field-type="product_auto" id="inputBuscar" name="inputBuscar" placeholder="Escribe el nombre de un producto, un cultivo, un problema fitosanitariio o un ingrediente activo" value="" type="text">
                <a href="" class="btn btn-prod-buscar">BUSCAR</a>
              </form>
            </div>
          </div>
	      </div>
    </div>
    <div class="box-productos container">
      <div class="ordenar">
        <label> ORDENAR POR </label>
        <select class="" id="InputOrden">
          <<option class="" value="0">Default</option>
          <<option class="" value="asc">(A-Z)</option>
          <<option class="" value="desc">(Z-A)</option>
        </select>
      </div>
      <div class="box-items">
      <?php

          $sql2="select mod_prod_id from mod_productos_rel where mod_prod_cat_id='".$cat_prod."'";
          $rs2=$fmt->query->consulta($sql2);
          $num = $fmt->query->num_registros($rs2);
          if($num>0){
            for($i=0;$i<$num;$i++){
              list($fila_id)=$fmt->query->obt_fila($rs2);
              $url = $url_todos."/c=".$cat_prod."&p=".$fila_id;
              $img=_RUTA_WEB. $fmt->class_modulo->fila_modulo($fila_id,"imagen","mod_productos","mod_prod_");
              $img_1= $fmt->class_modulo->cambiar_tumb($img);
              echo "<div class='item' style='background:url($img_1) center center'>";
              $cat_p= $fmt->categoria->nombre($cat_prod,"mod_productos_cat","mod_prod_cat_");
              echo "<div class='cat $cat_p'>".$cat_p."</div>";
              $nom= $fmt->categoria->nombre($fila_id,"mod_productos","mod_prod_");
              echo "<a href='".$url."'><span>".$nom."</span><div class='bg'></div></a>";
              echo "</div>";
            }
          }
      ?>
      </div>
    </div>
    <?php require_once("footer.pub.php"); ?>
  </div>
</div>
