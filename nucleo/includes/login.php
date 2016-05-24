<?
if( $_GET["tarea"]=="salir" ){
	require_once("../clases/class-constructor.php");
	$fmt = new CONSTRUCTOR();
	$fmt->sesion->iniciar_sesion();
	$fmt->sesion->cerrar_sesion();

	$fmt->get->validar_get($_GET["cat"]);
	$fmt->get->validar_get($_GET["pla"]);
	$cat =$_GET["cat"];
	$pla =$_GET["pla"];
	$link="../../index.php?&cat=".$cat."&pla=".$pla;
	header("Location:".$link);
}
//echo "login";
?>
<!-- --------------  Index login  --------------- -->
<div class="key-index" onclick="toggleId('block-login');">
	<i class="icn-key color-border-naranja color-text-naranja color-bg-blanco"></i>
</div>
<div class="block-login" id="block-login" style="display:none">
	<?php require_once(_RUTA_HOST."modulos/login/login.form.php"); ?>
	<div class="login-footer color-text-gris-a"> 2016 ® Wappcom &nbsp; | &nbsp; Terminos de Uso &nbsp; |  &nbsp; Privacidad  &nbsp;| &nbsp;  power <i class="icn-cc"> <?php echo _VZ; ?></i> </div>
	<div class="bg-shadow color-bg-negro" onclick="toggleId('block-login');"></div>
</div>
