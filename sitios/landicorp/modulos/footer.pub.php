<?
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR;
?>
<div class="container-fluid" id="footer">
<div class="container">
  <div class="row">
    <div class="col-xs-4 box-text">
        <h3>FRASE</h3>
        <div class="textwidget"><p> <i> "Vivimos en un mundo de transformaciones permanentes y nos sentimos comprometidos con el idealismo empresarial, tomando la innovación como una forma de avanzar..."  </i>  <b>[Ing. Hugo Landivar C.]</b></p>
        </div>
    </div>
    <div class="col-xs-4 box-text">
        <h3>Dirección</h3>
        <div class="textwidget"><p>Av. Noel Kempff Mercado, Esq. Canal Isuto<br>
          Santa Cruz, Bolivia</p>
          <p>(+591 3) 3388 100<br>
            info@landicorp.com.bo</p>
        </div>
    </div>
    <div class="col-xs-4 box-text">
      <h3>Horarios oficina</h3>
      <div class="textwidget"><p>Lunes - Viernes: 8:00-18:00<br>
    Sábado: 8:00-12:00</p>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid box-footer" >
  <div class="container">
    <div class="pull-left">2016 © Copyright - Grupo Landicorp</div>
    <div class="pull-right menu-footer">
      <ul>
        <li><a href="<? echo _RUTA_WEB; ?>landicor" > Portada </a></li>
        <?php echo $fmt->nav->traer_cat_hijos("2");  ?>
      </ul>
    </div>
  </div>
</div>
