<?php 

$respuesta['estado'] = false;

try{
	require 'meta.php';
	$id = $_POST['id'];

	$consulta = Meta::Consulta_Unico('SELECT * FROM destacados WHERE id_destacado='.$id);

	if ($consulta['id_destacado']!=''){
		$respuesta['descripcion'] = $consulta['descripcion'];
		$respuesta['precio'] = number_format(floatval($consulta['precio']), 2);
		$respuesta['imagen'] = $consulta['imagen'];
		$respuesta['id_destacado'] = $consulta['id_destacado'];
	}

	$respuesta['estado'] = true;	
}catch(Exception $e){
	$respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);