<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
require_once("nav.pub.php");
?>
<div class="container-fluid portada">
  <div class="side-bar-m">
   <?php require_once("sidebar.pub.php"); ?>
  </div>
  <div class="body-page-m" id="body-page-m">
    <div class="page">
      <div class="title-page"><h1><img src="sitios/mainter/images/logo-mainter-o.svg" ></h1></div>
      <ul>
        <? echo $fmt->nav->traer_cat_hijos_menu("3"); ?>
      </ul>
    </div>
    <?php require_once("footer.pub.php"); ?>
  </div>
</div>
<script>
  $( document ).ready(function() {
    $( ".page ul li" ).append( "<div class='bg'></div>" );
    $( ".page ul li a" ).append( "<div class='mas'>MAS</div>" );
  });
</script>
