<?
  header('Content-Type: text/html; charset=utf-8');
  define(_EDITANDO,"true");

  echo "Aqui";

  require_once(_RUTA_HOST."nucleo/clases/class-brand.php");
  $brand = new BRAND();
  $id_usu = $sesion->get_variable("usu_id");
  $id_rol = $sesion->get_variable("usu_rol");
  $sql ="SELECT usu_nombre,usu_apellidos,usu_imagen FROM usuarios WHERE usu_id='$id_usu'";
  $rs = $this->query->consulta($sql);
  $fila = $this->query->obt_fila($rs);
  $usu_nombre=$fila["usu_nombre"];
  $usu_apellidos=$fila["usu_apellidos"];
  $usu_imagen=_RUTA_WEB.$fila["usu_imagen"];

  $sql ="SELECT rol_nombre  FROM roles WHERE rol_id='$id_rol'";
  $rs = $this->query-> consulta($sql);
  $fila = $this->query->obt_fila($rs);
  $rol_nombre=$fila["rol_nombre"];
  echo "\n\n";



  if ($id_rol==2){
    $ref_inicio="index.php";
    $menu_config .= construir_title_menu("Administración");

    $menu_config .= construir_menu_sidebar("icn-conf","Configuración Sitio","btn-menu-sidebar btn-config btn-menu-ajax","config","#");

    $menu_config .= construir_menu_sidebar("icn-shortcut","Atajos","btn-menu-sidebar btn-atajos-config btn-menu-ajax","atajos","#");

    $menu_config .= construir_menu_sidebar("icn-box","Modulos","btn-menu-sidebar btn-modulos btn-menu-ajax","2");

    $menu_config .= construir_menu_sidebar("icn-system","Sistemas","btn-menu-sidebar btn-sistemas btn-menu-ajax","1");

    $menu_atajos .= construir_menu_atajo("icon-copy","Editar Página","btn-submenu btn-editar-pagina btn-menu-ajax","btn-editar-pagina","#");
  }

  function construir_menu_atajo ($icono, $nombre, $clase, $id_mod){
    $aux ='<li class="dropdown">';
    $aux .='  <a  class="'.$clase.'"  title="'.$nombre.'"  icn="'.$icono.'" id="btn-m'.$id_mod.'" id_mod="'.$id_mod.'">';
    $aux .='  <i class="'.$icono.'"></i>  '.$nombre.' </a>';
    $aux .='</li>';
    return $aux;
  }
  function construir_menu_sidebar($icono, $nombre, $clase, $id_mod){
    $aux ="<li>";
    $aux .='<a  class="'.$clase.'"  title="'.$nombre.'"  icn="'.$icono.'" id="btn-m'.$id_mod.'" id_mod="'.$id_mod.'">';
    $aux .= "<i class='".$icono."'></i> ".$nombre." </a>";
    $aux .= "</li>";
    return $aux;
  }
  function construir_title_menu( $nombre){
    $aux ="<div class='title-menu'>$nombre</div>";
    return $aux;
  }
?>
<style>
  #page-content-wrapper{ margin-top: 43px; }
</style>
<!-- inicio navbar  -->
<div  class="navbar navbar-default navbar-fixed-top color-bg-blanco" role="navigation">
  <div class="navbar-inner"> <!-- incicio navbar-inner -->
    <div class="dropdown_container">
      <div class="navbar-header">
        <a class="navbar-brand" href="dashboard.php" >
					<?php echo  $brand->brand($cat,"navbar-logo"); ?>
				</a>
      </div><!-- fin header -->
      <div class="collapse navbar-collapse" id="bs-menu">
        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a class="btn-navbar btn-search" href="#" ><i class="icn-search"></i></a>
          </li>
          <li class="">
            <a class="btn-navbar btn-alarma" href="#" ><i class="icn-alarm"></i></a>
          </li>
          <li class="">
            <a class="btn-navbar btn-mensajes" href="#" ><i class="icn-bubble"></i></a>
          </li>

          <li class="dropdown" id="Atajos">
            <a href="#" class="dropdown-toggle btn-navbar btn-atajos" data-toggle="dropdown" data-hover="dropdown" data-delay="10" data-close-others="false">
                <i class="icn-shortcut"></i>
                <i class="icn-chevron-donw btn-donw"></i>
              </a>
              <ul class="dropdown-menu menu-user">
                <?php echo $menu_atajos; ?>
              </ul>
          </li>

          <li class="dropdown" id="Perfil">
            <a href="#" class="dropdown-toggle btn-navbar btn-user" data-toggle="dropdown" data-hover="dropdown" data-delay="10" data-close-others="false">
                <i class="icn-user-a"></i>
                <i class="icn-chevron-donw btn-donw"></i>
              </a>
              <ul class="dropdown-menu menu-user">
                <li class="dropdown" id="Perfil">
                  <img class="img-user"alt="" src="<? echo $usu_imagen; ?>">
                  <h6 class="name-user"><? echo $usu_nombre." ".$usu_apellidos; ?>
                  <a href="#" target="_blank" class="btn btn-xs btn-default btn-perfil">Editar perfil</a></h6>
                </li>
                <li class="dropdown">
                  <a  class="btn-submenu btn-rol" href="" >
                  <i class="icn-credential"></i> <?php echo $rol_nombre ;?>
                  </a>
                </li>
                <li>
                  <a  class="btn-submenu btn-salir" href="<? echo _RUTA_WEB; ?>nucleo/includes/login.php?tarea=salir&cat=<?php echo $cat;?>&pla=<?php echo $pla;?>" >
                  <i class="icn-off"></i> Cerrar Sesión
                  </a>
                </li>
              </ul>
          </li>

      <li>
        <a id="btn-navicon" class="btn-navbar btn-menu" >
          <i class="icn-reorder"></i>
          <i class="icn-close"></i>
        </a>
      </li>
      </ul>
      </div><!--    navbar-collapse -->
    </div>
  </div> <!-- fin navbar-inner -->
</div><!-- fin navba -->
<?php
  echo "\n\n";
?>

<!--     Publicacion  Sidebar      -->
<div class="sidebar" style="right: -250px;" >
	<ul class="sidebar-inner">
    <div class="title-menu title-menu-general"> Menu General</div>
    <li>
      <a class="btn-menu-sidebar btn-menu-sidebar-active" href="<? echo $ref; ?>"><i class="icn-home"></i> Inicio </a>
    </li>
    <?php echo $menu_config; ?>
	</ul>
</div>

<!--     SCRIPT     -->
<script>
$( "#btn-navicon" ).click(function() {
	sidebar_on_off();

});
 function sidebar_on_off(){
   $(".sidebar").toggleClass("on");
 	$(".btn-menu .icon-close").toggleClass("on");
 	$(".btn-menu .icon-recorder").toggleClass("on");
 	$("#btn-navicon").toggleClass("on");
 	$(".sidebar").animate({
 					right: parseInt($(".sidebar").css("right"))== 0 ?"-="+$(".sidebar").outerWidth() : 0
 			},300);
 }
$(document).ready(function()
{
    $(".btn-menu-ajax").click(function () {
      var id = this.id;
      var id_mod = $( this ).attr("id_mod");

      $(".popup-div").addClass("on");
      //alert("Bien!!!, la edad seleccionada es: "+ id_mod );
      //alert("Bien!!!, la edad seleccionada es: " + $(this).val());
      $.ajax({
  			url:"<?php echo _RUTA_WEB; ?>nucleo/includes/ajax-adm.php",
  			type:"post",
  			data:{ inputId:id_mod },
  			success: function(msg){
          //alert(msg);
          $("#popup-div").html(msg);
  			}
  		});
      sidebar_on_off();
    });
});

</script>
