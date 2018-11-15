<?php 

//incluir conexion con base de datos
	require_once('configuracion.php');

	$conexion=mysqli_connect($configuracion['servidor'],
	$configuracion['usuario'],
	$configuracion['contrasena'],
	$configuracion['base_datos']);

	if(!$conexion)
	{
		die("Error de conexion a la base de datos. ".mysqli_connect_error());
	}
 ?>