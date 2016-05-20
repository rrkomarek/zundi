<?php
header('Content-Type: text/html; charset=utf-8');

class CONSTRUCTOR{

  var $query;
  var $autentificacion;
  var $get;
  var $sesion;
  var $plantilla;
  var $brand;
  var $mensaje;
  var $error;
  var $usuario;

  function __construct() {

    header('Content-Type: text/html; charset=utf8');
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
    ini_set('display_errors','On');

    /* VARIABLES DEL SITIO */
    define('_RUTA_HOST',str_replace("/nucleo/clases","",str_replace("\\", "/", dirname(__FILE__)))."/");
    define('_RUTA_WEB',"http://".str_replace("\\", "/", $_SERVER['SERVER_NAME'])."".str_replace(str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']), "", _RUTA_HOST));

    if(isset($_GET["mod_id"])){
      if (!is_numeric($_GET["mod_id"])){
        define('_ID_MODULO', $_GET["mod_id"]);
      }
    }

    if(isset($_GET["id"])){
    	if (!is_numeric($_GET["id"])){
    		header("Location:../index.php?s="._RUTA_DEFAULT."&cat=".$cat."&pla=".$pla."&tarea=error-id");
    	}
    }

    define('_VZ', "Zundi 2.0.1");

    require_once(_RUTA_HOST."nucleo/config.php");


    // echo "host:"._HOST."</br>";
    // echo "us:"._USUARIO."</br>";
    // echo "pw:"._PASSWORD."</br>";
    // echo "bd:"._BASE_DE_DATOS."</br>";
    // echo "ruta-host:"._RUTA_HOST."</br>";
    // echo "ruta-web:"._RUTA_WEB."</br>";
    // echo "version:"._VZ."</br>";
    // echo "ruta-default:"._RUTA_DEFAULT."</br>";

    require_once(_RUTA_HOST."nucleo/clases/class-sesion.php");
    require_once(_RUTA_HOST."nucleo/clases/class-mysql.php");
    require_once(_RUTA_HOST."nucleo/clases/class-get.php");
    require_once(_RUTA_HOST."nucleo/clases/class-plantilla.php");
    require_once(_RUTA_HOST."nucleo/clases/class-errores.php");
    require_once(_RUTA_HOST."nucleo/clases/class-redireccion.php");
    require_once(_RUTA_HOST."nucleo/clases/class-mensajes.php");
    require_once(_RUTA_HOST."nucleo/clases/class-autentificacion.php");
    require_once(_RUTA_HOST."nucleo/clases/class-brand.php");
    require_once(_RUTA_HOST."nucleo/clases/class-usuarios.php");

    $sesion = new SESION($this);
    $query = new MYSQL();
    $query->conectar(_BASE_DE_DATOS,_HOST,_USUARIO,_PASSWORD);

    $get = new GET($this);
    $autentificacion = new AUTENTIFICACION($this);
    $plantilla = new PLANTILLA($this);
    $brand = new BRAND($this);
    $error = new ERROR($this);
    $redireccion = new REDIRECCION($this);
    $mensaje = new MENSAJE($this);
    $usuario = new USUARIO($this);

    $this->sesion = $sesion;
    $this->query = $query;
    $this->get = $get;
    $this->autentificacion = $autentificacion;
    $this->plantilla = $plantilla;
    $this->brand = $brand;
    $this->mensaje = $mensaje;
    $this->error = $error;
    $this->usuario = $usuario;

  }


}


?>
