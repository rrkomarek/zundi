<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR;

require_once("header.pub.php");
?>
<div id="<? echo $nom;?>" class="Publicacion">
<?PHP   include($RutaHost.'admin/clases/editar_elemento.php');    ?>

<div id="carousel-m1" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators container">
    <li data-target="#carousel-m1" data-slide-to="0" class="tab-1 active" ></li>
    <li data-target="#carousel-m1" class="tab-2" data-slide-to="1"></li>
    <li data-target="#carousel-m1" class="tab-3" data-slide-to="2"></li>
    <li data-target="#carousel-m1" class="tab-4" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <div class="item active">
      <div class="caption">
        <h1>LA DIVERSIDAD ES NUESTRA ALMA</h1>
        <p>Expertos en Innovación, diseño y tecnología</p>
        <a href="http://tramontinastore.com/"  target="_blank" class="btn btn-primario" > <span>Ver más</span><div class="shadow-btn"></div> </a>
      </div>
      <div class="shadow-item"></div>
      <div class="imagen" style="background-image:url('sitios/utilar/images/bg-tramontina.jpg')" ></div>
    </div>

    <div class="item">
      <div class="caption">
        <h1>LA TEMPERATURA IDEAL EN TODO MOMENTO</h1>
        <p>Líderes en productos de conservación térmica</p>
        <a href="http://www.invictaonline.com.br/"   target="_blank" class="btn btn-primario" > <span>Ver más</span><div class="shadow-btn"></div> </a>
      </div>
      <div class="shadow-item"></div>
      <div class="imagen" style="background-image:url('sitios/utilar/images/bg-invicta.jpg')" ></div>
    </div>

    <div class="item">
      <div class="caption">
        <h1>LA MAYOR LÍNEA DE PLÁSTICOS</h1>
        <p>Líderes en productos de plásticos con diseños de alta calidad</p>
        <a href="http://www.plasutil.com.br/plasutil/pt/index.php"  target="_blank" class="btn btn-primario" > <span>Ver más</span><div class="shadow-btn"></div> </a>
      </div>
      <div class="shadow-item"></div>
      <div class="imagen" style="background-image:url('sitios/utilar/images/bg-plasutil.jpg')" ></div>
    </div>

    <div class="item">
      <div class="caption">
        <h1>LA PORCELANA CON TRADICIÓN</h1>
        <p>Vajillas de calidad hecha por manos artesanas</p>
        <a href="http://www.porcelanaschmidt.com.br/schmidt/site/index.php" target="_blank" class="btn btn-primario" > <span>Ver más</span><div class="shadow-btn"></div> </a>
      </div>
      <div class="shadow-item"></div>
      <div class="imagen" style="background-image:url('sitios/utilar/images/bg-i.jpg')" ></div>
    </div>


  </div>

  <!-- Controls -->
  <a class="left carousel-control"  href="#carousel-m1" role="button" data-slide="prev">
    <span class="icn-chevron-left" aria-hidden="true"></span>
  </a>
  <a class="right carousel-control" href="#carousel-m1" role="button" data-slide="next">
    <span class="icn-chevron-right" aria-hidden="true"></span>
  </a>
</div>
<script>
	$('.carousel').carousel({
    	pause: "false"
	});
</script>

<?php
require_once("footer.pub.php");
?>
