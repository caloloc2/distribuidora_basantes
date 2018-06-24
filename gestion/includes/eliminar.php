<?php 

$respuesta['estado'] = false;

try{
	require 'meta.php';
	$id = $_POST['id'];

	$eliminar = Meta::Ejecutar_SQL('DELETE FROM destacados WHERE id_destacado='.$id);

	$respuesta['estado'] = true;	
}catch(Exception $e){
	$respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);