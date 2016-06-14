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
    <div class="page container">
      <div class="title-page"><h2>Conozca Mainter</h2></div>
      <div class="row">
        <div class="col-md-6 text-left">
          <p>Lorem ipsum dolor sit <strong>amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p><p> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Donec elementum ligula eu sapien consequat eleifend. </p><p>Donec nec dolor erat, condimentum sagittis sem. Praesent porttitor porttitor risus, dapibus rutrum ipsum gravida et. Integer lectus nisi.</p>
        </div>
        <div class="col-md-6 img-right">
          <img class="img-responsive" src="sitios/mainter/images/img-conozca-mainter.jpg" alt=""  />
          <div class="row">
            <a href="#" class="col-md-6"><span>compartir</span><i class="icon-comments-alt"></i></a>
            <a href="#" class="col-md-6"><span>imprimir</span><i class="icon-print"></i></a>
          </div>
        </div>
      </div>
    </div>
    <?php require_once("footer.pub.php"); ?>
  </div>
</div>
