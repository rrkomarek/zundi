<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
require_once("header.pub.php");
$consulta ="SELECT mul_id,mul_url,mul_descripcion,mul_orden FROM multimedia, multimedia_rel WHERE mul_rel_cat_id='2' and mul_id=mul_rel_mul_id and mul_activar='1' ORDER BY `multimedia`.`mul_orden` asc";
$rs =$this->fmt->query->consulta($consulta);
$num=$this->fmt->query->num_registros($rs);
if($num>0){
?>
<div class="container-fluid box-carousel" > <!-- Inicio de Bloque -->
    <div id="myCarousel" class="carousel slide carousel-fade" data-delay="800" data-ride="carousel">
        <!-- Carousel indicators -->
        <ul class="carousel-indicators">
          <?php
            for($i=0;$i<$num;$i++){
              if ($i==0){$aux ='active'; } else { $aux =""; }
          ?>
            <li data-target="#myCarousel" data-slide-to="<?php $i; ?>" class="<?php $aux; ?>"></li>
          <?php
            }

          ?>
        </ul>
       <!-- Carousel items -->
        <div class="carousel-inner" id="myImg">
          <?php
          for($i=0;$i<$num;$i++){
            list($fila_id,$fila_url,$fila_descripcion)=$this->fmt->query->obt_fila($rs);
            if ($i==0){$aux ='active'; } else { $aux =""; }
           ?>
            <div class="<? echo $aux; ?> item <? echo $i; ?>" style="background:url('<? echo _RUTA_WEB.$fila_url; ?>')" >
            </div>
            <?php
              }
            ?>
        </div>

        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="icon-angle-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="icon-angle-right"></span>
        </a>
    </div>

</div> <!-- Fin de Bloque -->
<?php  }  ?>
<script>
	$('.carousel').carousel({
    	pause: "false"
	});
</script>
<!--<div class="container-fluid mensaje-1 animated fadeInUp">
    <h2 class="col-xs-7 col-xs-offset-1"><b>LANDICORP</b> es el resultado de la unión de un grupo de empresas que trabajan bajo los principios de competitividad y ética empresarial.</h2>
    <a href="<? echo _RUTA_WEB; ?>contacto-landicorp" class="">CONTÁCTENOS</a>
</div>-->
<?
require_once("footer.pub.php");
?>
