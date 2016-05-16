<?php /**
   * @file
   * Zundi CMS
   * Todo codigo de Zundi esta lanzando bajo GNU General Public License.
   * http://wappcom.com/zundi
   * Creator: @hermany
   * Devs.: Ariel Velazques, Ariel Ortuño, Cidar Veizaga, Cristian Grageda, Carolina Sanchez, Marcelo Garcia
   */
  header('Content-Type: text/html; charset=utf8');
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
  ini_set('display_errors','On');
  //phpinfo();
  require_once("nucleo/config.php");
  require_once("nucleo/clases/class-sesion.php");

  $sesion= new SESION();
  $sesion->iniciar_sesion();
  //echo "inicio de sesión ok </br>";

  //echo $sesion->get_nombre();


  require_once("nucleo/clases/class-mysql.php");
  require_once("nucleo/plantilla.php");

  $query = new MYSQL;
  $query->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);
  //echo "conexión ok </br>";

  // nueva plantilla
  $plantilla = new PLANTILLA($query);

  // Trabajo de autentificación e ingreso
  require_once("nucleo/funciones/funciones-autentificacion.php");


?>
