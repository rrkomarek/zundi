<?php
  require_once("../clases/class-constructor.php");
  $fmt = new CONSTRUCTOR();

  $output_dir = _RUTA_HOST.$_POST["inputRutaArchivos"];
  if(isset($_FILES["inputArchivos"])){

    $error = $_FILES["inputArchivos"]["error"];
    if(!is_array($_FILES["inputArchivos"]["name"])){ //un archivo

      $file = $_FILES["inputArchivos"];
      $nombre = strtolower ( $file["name"]);
      $var = array ('.jpg','.gif','.png','.mp3','.mp4','quicktime');
      $inputNombre = str_replace($var,'',$fmt->get->convertir_url_amigable($nombre));
      $tipo = $file["type"];
      $var_tipo = array ('image/','audio/','video/');
      $inputTipo = str_replace($var_tipo,'',$tipo);
      $ruta_provisional = $file["tmp_name"];
      $size = $file["size"];
      $inputSize = $fmt->archivos->formato_size_archivo($size);
      $dimensiones = getimagesize($ruta_provisional);
      $width = $dimensiones[0];
      $height = $dimensiones[1];
      $dimension = $width." x ".$height;
      if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif' && $tipo != 'audio/mp3' && $tipo != 'video/mp4' && $tipo != 'audio/quicktime'){
        echo "Error, el archivo no es valido (jpg,jpeg,png,gif)";
      }else if ($size > 1024*1024*8){
        echo "Error, el tamaño máximo permitido es un 8MB";
      }else if ($width > 1900 || $height > 1900){
        echo "Error la anchura y la altura maxima permitida es 500px";
      }else if($width < 60 || $height < 60){
        echo "Error la anchura y la altura mínima permitida es 60px";
      }else{
        move_uploaded_file($_FILES["inputArchivos"]["tmp_name"],$output_dir."/".$nombre);
        $src = $_POST["inputRutaArchivos"]."/".$nombre;
        $nombre_t=$fmt->archivos->convertir_nombre_thumb($nombre);
        $fmt->archivos->crear_thumb(_RUTA_HOST.$src,_RUTA_HOST.$_POST["inputRutaArchivos"].'/'.$nombre_t,'100','100',1);
        //$src, $dst, $width, $height, $crop=0


        if (!isset($_POST["inputId"])){
          echo "<img width='100%' src='"._RUTA_WEB.$src."'></br></br>";
          $fmt->form->input_form('<span class="obligatorio">*</span> Nombre archivo:','inputNombre','',$inputNombre,'','','En minúsculas');
          $fmt->form->input_form('Url archivo:','inputUrl','',$_POST["inputRutaArchivos"]."/".$nombre,'');
          $fmt->form->input_form('Tipo archivo:','inputTipo','',$inputTipo,'');
          $fmt->form->input_form('Leyenda:','inputLeyenda','','','','',''); //$label,$id,$placeholder,$valor,$class,$class_div,$mensaje
          $fmt->form->input_form('Texto Alternativo:','inputTextoalternativo','','','','','');
          $fmt->form->textarea_form('Descripción:','inputDescripcion','','','','3',''); //$label,$id,$placeholder,$valor,$class,$class_div,$rows,$mensaje
          $fmt->form->input_form('Dimensión:','inputDimension','',$dimension,'','','');
          $fmt->form->input_form('Tamaño:','inputTamano','',$inputSize,'','','');
        } else {
          $url =$_POST["inputRutaArchivos"]."/".$nombre;
          $rt .= "editar";
          $rt .= ':'.$url;
          $rt .= ':inputNombre,'.$inputNombre;
          $rt .= ':inputUrl,'.$url;
          $rt .= ':inputTipo,'.$inputTipo;
          $rt .= ':inputLeyenda,';
          $rt .= ':inputTextoalternativo,';
          $rt .= ':inputDescripcion,';
          $rt .= ':inputDimension,'.$dimension;
          $rt .= ':inputTamano,'.$inputSize;
          echo $rt;
        }

      }
    }else{ // varios archivos
      $ret = array();
      $ret = $_FILES["inputArchivos"]["name"];
      $num = count($ret);
    }
  }

?>
