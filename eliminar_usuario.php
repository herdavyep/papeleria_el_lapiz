<?php 
	$id = $_GET['id'];
	//incluir conexion con base de datos
	require_once('conexion.php');
	$eliminar = mysqli_query($conexion, "DELETE FROM usuarios WHERE id = '$id'");
	$eliminado = mysqli_affected_rows($conexion);
	header("Location: listar_usuarios.php?eliminado=". $eliminado);

 ?>