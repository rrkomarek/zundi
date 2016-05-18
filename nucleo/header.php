<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL & ~E_NOTICE);
require("config.php");
require_once("clases/class-sesion.php");
require_once("clases/class-mysql.php");

$sesion= new SESION();
$sesion->iniciar_sesion();

$query = new MYSQL();
$query ->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);

?>
<!DOCTYPE HTML>
<html id="pagina-modulo" lang="ES">
<head>
  <title><?php   ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/font-awesome.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/animate.css" rel="stylesheet" type="text/css">
  
  <!--  Codigo css estandar Zundi  -->
  <link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/estilos.adm.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/theme.adm.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/color.adm.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/icon-font.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo _RUTA_WEB; ?>css/lato-font.css" rel="stylesheet" type="text/css">

  <script type="text/javascript" language="javascript" src="<?php echo _RUTA_WEB; ?>js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo _RUTA_WEB; ?>js/bootstrap.js"></script>
</head>
<body class="body-page container-fluid animated fadeIn">
