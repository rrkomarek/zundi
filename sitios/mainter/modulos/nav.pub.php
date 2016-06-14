<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
?>
<div class="nav-bar-m fixed">
 <div class="btn-menu-m" id="btn-menu-m">
   <i class="icon-reorder"></i>
   <i class="icon-remove"></i>
 </div>
 <div class="brand"><img src="sitios/mainter/images/logo-mainter.svg" ></div>
 <div class="social">
  <i class="icon-facebook"></i>
  <i class="icon-linkedin"></i>
  <i class="icon-twitter"></i>
  <i class="icon-comments-alt"></i>
 </div>
 <div class="buscar"> <span>Buscar</span> <i class="icon-search"></i></div>
</div>
<script>
  $( document ).ready(function() {
    console.log( "document loaded" );
    $(".btn-menu-m").click(function() {
      console.log('click buscar');
      $( "#body-page-m" ).toggleClass( "on" );
      $( "#btn-menu-m" ).toggleClass( "on" );
    });

  });
</script>
