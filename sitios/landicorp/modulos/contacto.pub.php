<?php
header("Content-Type: text/html;charset=utf-8");
require_once(_RUTA_HOST."nucleo/clases/class-constructor.php");
$fmt = new CONSTRUCTOR;

require_once("header.pub.php");
?>

<div id="map" ></div>

<div class="container-fluid form-contacto">
  <div class="col-xs-8 col-xl-offset-1">
    <h3 class="">CONTÁCTANOS</h3>
    <div class="ref"><p>QUEREMOS ESCUCHARTE</p></div>
    <span class="hr-inner"></span>
    <form action="" method="post" class="form" data-avia-form-id="1">
      <fieldset>
        <h3 class="title">Ingresa los siguientes datos:</h3>
        <div class="form-group" >
          <p class="col-xs-6">
            <label>Nombre <abbr class="required" title="required">*</abbr></label>
            <input name="inputNombre" class="form-control input-lg" type="text" id="inputNombre" value="">
          </p>
          <p class="col-xs-6" >
            <label>E-Mail <abbr class="required" title="required">*</abbr></label>
            <input name="inputEmail" class="form-control input-lg" type="text" id="inputEmail" value="">
          </p>
        </div>
        <div class="form-group">
          <p class="col-xs-6">
            <label>Teléfono celular o fijo <abbr class="required" title="required">*</abbr></label>
            <input name="inputTelf" class="form-control input-lg" type="text" id="input" value="">
          </p>
          <p class="col-xs-6">
            <label>Motivo mensaje <abbr class="required" title="required">*</abbr>
            </label>
            <select name="inputMotivo" class="form-control input-lg" id="inputMotivo">
              <option value="Acerca de Nuestros Productos">Acerca de Nuestros Productos</option>
              <option value="Comprar Productos">Comprar Productos</option>
              <option value="Vender Productos">Vender Productos</option>
              <option value="Comentarios y Sugerencias">Comentarios y Sugerencias</option>
            </select>
          </p>
      </div>
        <p class="form-group">
          <label>Consulta <abbr class="required" title="required">*</abbr>
          </label>
          <textarea name="inputConsulta" class="form-control input-lg" cols="40" rows="7" id="inputConsulta"></textarea>
        </p>
        <p class="form-group">
          <input type="submit" class="btn btn-primary" value="Enviar" class="button" data-sending-label="Enviando">
        </p>
      </fieldset>
    </form>
  </div>
  <div class="col-xs-4 col-xl-offset-8">
    <div class="flex_column av_one_third  av-animated-generic bottom-to-top  flex_column_div av-zero-column-padding   avia-builder-el-5  el_after_av_two_third  avia-builder-el-last   avia_start_animation avia_start_delayed_animation" style="border-radius:0px; "><div style="padding-bottom:0px;" class="av-special-heading av-special-heading-h3  blockquote modern-quote  avia-builder-el-6  el_before_av_hr  avia-builder-el-first  "><h3 class="av-special-heading-tag" itemprop="headline">Otras formas de contactarse con nosotros</h3><div class="special-heading-border"><div class="special-heading-inner-border"></div></div></div>
<div style=" margin-top:10px; margin-bottom:10px;" class="hr hr-custom hr-left hr-icon-no  avia-builder-el-7  el_after_av_heading  el_before_av_textblock "><span class="hr-inner   inner-border-av-border-fat" style=" width:50px; border-color:#efbb20;"><span class="hr-inner-style"></span></span></div>
<section class="av_textblock_section" itemscope="itemscope" itemtype="https://schema.org/CreativeWork"><div class="avia_textblock " itemprop="text"><p>Vía telefónica o mediante la siguiente dirección, podrás&nbsp; conocer más acerca del Grupo Landicorp.</p>
</div></section>
<div style=" margin-top:10px; margin-bottom:10px;" class="hr hr-custom hr-left hr-icon-no  avia-builder-el-9  el_after_av_textblock  el_before_av_textblock "><span class="hr-inner   inner-border-av-border-fat" style=" width:50px; border-color:#efbb20;"><span class="hr-inner-style"></span></span></div>
<section class="av_textblock_section" itemscope="itemscope" itemtype="https://schema.org/CreativeWork"><div class="avia_textblock " itemprop="text"><p><strong>Dirección</strong><br>
Tercer Anillo interno, Zona Zoológico<br>
Santa Cruz, BOLIVIA</p>
<p><strong>Contáctenos </strong><br>
info@landicorp.com.bo<br>
(+591 3) 3380100</p>
<p><strong>Abierto:</strong><br>
Lun – Vie: 8:00-16:00<br>
Sáb: 8:00-12:00<br>
Dom: Cerrado</p>
</div></section></div>
  </div>
</div>

<script type="text/javascript" >
function initMap() {
  var myLatLng = {lat: -17.761810, lng: -63.190900};
  // Specify features and elements to define styles.
    var styleArray = [
      {
        featureType: "all",
        stylers: [
         { saturation: -80 }
        ]
      },{
        featureType: "road.arterial",
        elementType: "geometry",
        stylers: [
          { hue: "#00ffee" },
          { saturation: 50 }
        ]
      },{
        featureType: "poi.business",
        elementType: "labels",
        stylers: [
          { visibility: "off" }
        ]
      }
    ];
  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('map'), {
    center: myLatLng,
    scrollwheel: false,
    styles: styleArray,
    mark: marker,
    zoom: 17
  });

  // Create a marker and set its position.
  var marker = new google.maps.Marker({
    map: map,
    position: myLatLng,
    title: 'Landicorp'
  });


}
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
       async defer></script>

<?
require_once("footer.pub.php");
?>
