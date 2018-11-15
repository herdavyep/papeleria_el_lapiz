<?php 
	require_once('encabezado.php');
	$id=$_GET['id'];
	//conexion a la base de datos
	require_once('conexion.php');
	//instrucciones para mostrar los registros de la tabla usuarios
	$consulta=mysqli_query($conexion,"SELECT * FROM usuarios WHERE id = $id");
	$usuario=mysqli_fetch_array($consulta);

	if (mysqli_num_rows($consulta)): 	
 ?>

 <div class="container">

	<h2 class="text-center">Detalle Usuario <?php echo $usuario['nombre']." ".$usuario['apellido']; ?></h2>
	<div class="row">
	<div class="col-md-2"></div>
		<form class="col-md-8">

			<div class="form-group">
				
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" readonly placeholder="Ingrese El Nombre" required="" value="<?php echo $usuario['nombre'];?>">
			</div>	

			<div class="form-group">
				
				<label for="nombre">Apellido</label>
				<input type="text" name="apellido" class="form-control" readonly placeholder="Ingrese El Apellido" required="" value="<?php echo $usuario['apellido'];?>">
			</div>	

			<div class="form-group">
				
				<label for="nombre">Email</label>
				<input type="email" name="email" class="form-control" readonly placeholder="Ingrese El Email" required="" value="<?php echo $usuario['email'];?>">
			</div>	

			<div class="form-group">
				<label for="tipo-usuario">Tipo de Usuario</label>
				<input type="text" name="tipo_usuario" class="form-control" readonly placeholder="Ingrese tipo de usuario" required="" value="<?php echo $usuario['tipo_usuario'];?>">	
			</div>		

			<div class="text-center">
				<a href="listar_usuarios.php"  class="btn btn-success">Volver Atras</a>

			</div>		


		</form>	
	</div>
</div>
 <?php
    endif; 
	require_once('pie_pagina.php');
 ?>