<?php 
	//incluir encabezado html
	require_once('encabezado.php');
	require_once('conexion.php');
	//instrucciones para mostrar los registros de la tabla usuarios
	$consulta=mysqli_query($conexion,"SELECT * FROM productos");
	$productos=mysqli_fetch_all($consulta, MYSQLI_ASSOC);
?>

	<div class="container">
		<h2 class="text-center" >Listar productos</h2>
		<a href="crear_producto.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Añadir Nuevo producto</a>
		<table class="table table-striped table-bordered ">
		<tr>
			<th class="text-center">Id</th>	
			<th class="text-center">Nombre</th>
			<th class="text-center">Referencia</th>
			<th class="text-center">Fecha vencimiento</th>
			<th class="text-center">Valor</th>
			<th class="text-center">Adjunto Producto</th>
			<th class="text-center">Opciones</th>
		</tr>
		
		<?php foreach ($productos as $producto): ?>
			<tr>
				<td class="text-center"><?php echo $producto['id']; ?></td>
				<td class="text-center"> <?php echo $producto['nombre']; ?> </td>
				<td class="text-center"><?php echo $producto['referencia']; ?></td>
				<td class="text-center"><?php echo $producto['fecha_vencimiento']; ?></td>
				<td class="text-center"><?php echo $producto['valor']; ?></td>
				<td class="text-center"> <img src="adjunto_productos/<?php echo $producto['adjunto_producto']; ?>" class="img-responsive " width="30%" > </td>
				<td class="text-center">

					<a href="ver_producto.php?id=<?php echo $producto['id'] ?> "class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>

					<a href="editar_producto.php?id=<?php echo $producto['id'] ?> "class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>

					<a href="eliminar_producto.php?id=<?php echo $producto['id'] ?> "class="btn btn-danger" onclick="return confirm('Esta seguro de querer eliminar este producto')" ><i class="fa fa-trash" aria-hidden="true"></i></a>

				</td>
			</tr>
		<?php endforeach; ?>	

		</table>

	</div>
 <?php 
 	//incluir pie de pagina html
 	require_once('pie_pagina.php');

  ?>


