<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
?>

<!-- inicio menu-top -->
<div class="container-fluid menu-top">
	<div class="datos pull-left">
		<span class="text">Parte de la Familia :</span> 
		<a href="http://landicorp.com.bo" target="_blank">
			<img class="brand-top" src="sitios/landicorp/images/logo-landicorp-small.png" />
		</a>	
	</div>
	<div class="pull-right rs-top">
		<a href="#"> <i class="icon-facebook"></i></a>
		<a href="#"> <i class="icon-twitter"></i></a>
		<a href="mailto:utilar@utilar.com.bo"> <i class="icon-envelope"></i></a>				
	</div>
</div>

<div class="container-fluid menu">
	<div class="container">
		
		<!-- inicio menu-general -->
		<nav class="navbar">
		  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <i class="icn-reorder"></i>
		      </button>
		      <div class="brand"><img src="sitios/utilar/images/logo-utilar.svg"></div>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="<? echo _RUTA_WEB; ?>utilar">Portada</a></li>
		        <? echo $fmt->nav->traer_cat_hijos_menu("4"); ?>
		      </ul>
		      <!--<ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><i class="icon-search"></i></a></li>
		      </ul>-->
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		
	</div>
</div>