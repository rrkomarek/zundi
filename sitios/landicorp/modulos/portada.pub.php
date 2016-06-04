<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR;

require_once("header.pub.php");
?>
<div class="container-fluid box-carousel" > <!-- Inicio de Bloque -->
    <div id="myCarousel" class="carousel slide carousel-fade" data-delay="1000" data-ride="carousel">
        <!-- Carousel indicators -->
        <ul class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ul>
       <!-- Carousel items -->
        <div class="carousel-inner" id="myImg">
            <div class="active item item0">
              <img class="img-responsive" alt="" src="<? echo _RUTA_WEB; ?>sitios/landicorp/images/mainter.jpg" />
            </div>
            <div class="item item1">
              <img class="img-responsive" alt="" src="<? echo _RUTA_WEB; ?>sitios/landicorp/images/utilar.jpg" />
            </div>
            <div class="item item2">
              <img class="img-responsive" alt="" src="<? echo _RUTA_WEB; ?>sitios/landicorp/images/semexa.jpg" />
            </div>
            <div class="item item3">
              <img class="img-responsive" alt="" src="<? echo _RUTA_WEB; ?>sitios/landicorp/images/carrera.jpg" />
            </div>
            <div class="item item4">
              <img class="img-responsive" alt="" src="<? echo _RUTA_WEB; ?>sitios/landicorp/images/rodaria.jpg" />
            </div>
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

<!--<div class="container-fluid mensaje-1 animated fadeInUp">
    <h2 class="col-xs-7 col-xs-offset-1"><b>LANDICORP</b> es el resultado de la unión de un grupo de empresas que trabajan bajo los principios de competitividad y ética empresarial.</h2>
    <a href="<? echo _RUTA_WEB; ?>contacto-landicorp" class="">CONTÁCTENOS</a>
</div>-->
<?
require_once("footer.pub.php");
?>
