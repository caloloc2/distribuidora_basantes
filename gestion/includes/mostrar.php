<?php 

$respuesta['estado'] = false;

try{
	require 'meta.php';
	$id = $_POST['id'];

	$consulta = Meta::Consulta_Unico('SELECT estado FROM destacados WHERE id_destacado='.$id);

	if ($consulta['estado']==0){
		$modificar = Meta::Actualizar_Campo('destacados', 'estado', 1, 'id_destacado', $id);
	}else{
		$modificar = Meta::Actualizar_Campo('destacados', 'estado', 0, 'id_destacado', $id);
	}

	$respuesta['estado'] = true;	
}catch(Exception $e){
	$respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);