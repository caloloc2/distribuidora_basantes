<?php 

$respuesta['estado'] = false;

try{
	require 'meta.php';
	
	$descripcion = $_POST['descripcion_nuevo'];
	$precio = $_POST['precio_nuevo'];

	if (isset($_FILES["imagen_nuevo"]))
	{
	    $file = $_FILES["imagen_nuevo"];
	    $nombre = $file["name"];
	    $tipo = $file["type"];
	    $ruta_provisional = $file["tmp_name"];
	    $size = $file["size"];
	    $dimensiones = getimagesize($ruta_provisional);
	    $width = $dimensiones[0];
	    $height = $dimensiones[1];
	    $carpeta = "../../img/destacados/";

	    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
	    {
	      $respuesta['error'] =  "Error, el archivo no es una imagen"; 
	    }
	    else if ($size > 1024*1024)
	    {
	      $respuesta['error'] =  "Error, el tamaño máximo permitido es un 1MB";
	    }
	    /*else if ($width > 500 || $height > 500)
	    {
	        $respuesta['error'] =  "Error la anchura y la altura maxima permitida es 500px";
	    }
	    else if($width < 60 || $height < 60)
	    {
	        $respuesta['error'] =  "Error la anchura y la altura mínima permitida es 60px";
	    }*/
	    else
	    {
	        $src = $carpeta.$nombre;
	        move_uploaded_file($ruta_provisional, $src);

	        $nuevo = Meta::Nuevo($nombre, $descripcion, $precio);
	        $respuesta['estado'] = true;	
	    }
	}

	
}catch(Exception $e){
	$respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);