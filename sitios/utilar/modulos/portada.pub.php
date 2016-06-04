<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR;

require_once("header.pub.php");
?>

<div id="<? echo $nom;?>" class="Publicacion">
<?PHP   include($RutaHost.'admin/clases/editar_elemento.php');    ?>
<div class="BloqueTitulo"><?  echo $TituloPub;  ?></div>
<div class="Bloque" >
<?php

?>

