<?php 
	//incluir encabezado html
	require_once('encabezado.php');
	require_once('conexion.php');
	//instrucciones para mostrar los registros de la tabla usuarios
	$consulta=mysqli_query($conexion,"SELECT * FROM usuarios");
	$usuarios=mysqli_fetch_all($consulta, MYSQLI_ASSOC);

	//recibir variable consulta
	if (isset($_GET['consulta'])) 
	{
		$consulta=$_GET['consulta'];
		if($consulta == 1)
			{
				?>
					 <div class="alert alert-success" >
				 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
				 		<strong>Alerta! </strong> El usuario fue actualizado con exito
				    </div>
				<?php
			}
			else
			{

				?>
					 <div class="alert alert-danger" >
				 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
				 		<strong>Alerta! </strong> El usuario no pudo ser actualizado, intentelo de nuevo.
				    </div>
				<?php				
			}
	}


	//recibir variable eliminar
	if (isset($_GET['eliminado'])) 
	{
		$eliminado=$_GET['eliminado'];
		if($eliminado == 1)
			{
				?>
					 <div class="alert alert-success" >
				 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
				 		<strong>Alerta! </strong> El usuario fue eliminado con exito
				    </div>
				<?php
			}
			else
			{

				?>
					 <div class="alert alert-danger" >
				 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
				 		<strong>Alerta! </strong> El usuario no pudo ser eliminado, intentelo de nuevo.
				    </div>
				<?php				
			}
	}
	//recibir la variable de inicio de sesion
	if (isset($_GET['login'])) 
	{
		?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Alerta</strong> Bienvenido, ha iniciado sesion correctamente
			</div>
		<?php
	}
?>

	<div class="container">

		<h2 class="text-center" >Listar usuarios</h2>

		<a href="crear_usuario.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Añadir Nuevo usuario</a>
		
		<table class="table table-striped table-bordered ">
		<tr>
			<th class="text-center">Id</th>	
			<th class="text-center">Nombre</th>
			<th class="text-center">Apellido</th>
			<th class="text-center">Email</th>
			<th class="text-center">Tipo Usuario</th>
			<th class="text-center">Fecha Creacion</th>
			<th class="text-center">Opciones</th>
		</tr>
		
		<?php foreach ($usuarios as $usuario): ?>
			<tr>
				<td class="text-center"><?php echo $usuario['id']; ?></td>
				<td class="text-center"> <?php echo $usuario['nombre']; ?> </td>
				<td class="text-center"><?php echo $usuario['apellido']; ?></td>
				<td class="text-center"><?php echo $usuario['email']; ?></td>
				<td class="text-center"><?php echo $usuario['tipo_usuario']; ?></td>
				<td class="text-center"><?php echo $usuario['fecha_creacion']; ?></td>
				<td class="text-center">

					<a href="ver_usuario.php?id=<?php echo $usuario['id'] ?> "class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>

					<a href="editar_usuario.php?id=<?php echo $usuario['id'] ?> "class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>

					<a href="eliminar_usuario.php?id=<?php echo $usuario['id'] ?> "class="btn btn-danger" onclick="return confirm('Esta seguro de querer eliminar este registro')" ><i class="fa fa-trash" aria-hidden="true"></i></a>

				</td>
			</tr>
		<?php endforeach; ?>	

		</table>

	</div>
	

 


 <?php 
 	//incluir pie de pagina html
 	require_once('pie_pagina.php');

  ?>


