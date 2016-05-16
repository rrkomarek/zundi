<?php

  /*  VARIABLES PARA LA CONEXION A LA BASE DE DATOS */
    $db="landicorp";
    if ($db=="landicorp"){
      define('_RUTA_DEFAULT','landicorp');
      define('_HOST','localhost');
      define('_USUARIO','root');
      define('_PASSWORD','asdf123A');
      define('_BASE_DE_DATOS','landicorp');
    }

  /* VARIABLES DEL SITIO */
    define('_RUTA_HOST',str_replace("/nucleo","",str_replace("\\", "/", dirname(__FILE__)))."/");
    define('_RUTA_WEB',"http://".str_replace("\\", "/", $_SERVER['SERVER_NAME'])."".str_replace(str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']), "", _RUTA_HOST));

    if(isset($_GET["s"])){
    define('_RUTA_DEFAULT', $_GET["s"]);
    }

    if(isset($_GET["mod_id"])){
    define('_ID_MODULO', $_GET["mod_id"]);
    }

    if(isset($_GET["id"])){
    	if (!is_numeric($_GET["id"])){
    		header("Location:../index.php?s="._RUTA_DEFAULT."&cat=".$cat."&pla=".$pla."&tarea=error-id");
    	}
    }

    define('_VZ', "Zundi 2.0.1");

    // echo "ruta-host:"._RUTA_HOST."</br>";
    // echo "ruta-web:"._RUTA_WEB."</br>";
    // echo "version:"._VZ."</br>";
    // echo "ruta-default:"._RUTA_DEFAULT."</br>";
    // echo "host:"._HOST."</br>";
    // echo "us:"._USUARIO."</br>";
    // echo "pw:"._PASSWORD."</br>";
    // echo "bd:"._BASE_DE_DATOS."</br>";

?>
