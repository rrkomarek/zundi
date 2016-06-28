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
    $sub_dominio ="zundi/";
    define("_RUTA_WEB",_RUTA_WEB_temp.$sub_dominio);
    define("_RUTA_SERVER",str_replace(_RUTA_DEFAULT."/","",_RUTA_HOST));
    //echo _RUTA_WEB;
?>
