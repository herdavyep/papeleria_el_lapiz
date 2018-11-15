<?php 
	//incluir encabezado html
	require_once('encabezado.php');
	//validar si las variables estan inicializadas
	if (isset($_POST['nombre'])
	 && isset($_POST['referencia']) 
	 && isset($_POST['fecha_vencimiento']) 
	 && isset($_POST['valor']) 
	 && isset($_FILES['adjunto_producto'])
	 ) 
	{
		$nombre=$_POST['nombre'];
		$referencia=$_POST['referencia'];
		$fecha_vencimiento=$_POST['fecha_vencimiento'];
		$valor=$_POST['valor'];
		$adjunto_producto=$_FILES['adjunto_producto']['name'];
		$carpeta = "adjunto_producto/";
		$direccion = $carpeta.basename($adjunto_producto);

		if (move_uploaded_file($_FILES['adjunto_producto']['tmp_name'] , $direccion)) 
		{
			
			require_once('conexion.php');
			$insertar=mysqli_query($conexion,  "INSERT INTO productos(nombre, referencia, fecha_vencimiento, valor, adjunto_producto) VALUES ('$nombre', '$referencia', '$fecha_vencimiento', '$valor', '$adjunto_producto')");
			//instruccion para saber si se afecto alguna columna
			$consulta=mysqli_affected_rows($conexion);
			if($consulta == 1)
			{
				?>
					 <div class="alert alert-success" >
					 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
					 	<strong>Alerta! </strong> El producto fue registrado con exito
				   	 </div>
				<?php
			}
			else
			{
				?>
				   	 <div class="alert alert-danger" >
					 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
					 	<strong>Alerta! </strong> El producto no pudo ser registrado, intentelo de nuevo.
				    	</div>
				<?php				
			}
		}
		else
		{
			?>
			   	 <div class="alert alert-danger" >
				 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
					 <strong>Alerta! </strong> El adjundo del producto no pudo ser procesado, intentelo de nuevo.
			    	</div>
			<?php	
		}
	}
?>

<div class="container">

	<h2 class="text-center">Crear Nuevo Producto</h2>
	<div class="row">
	<div class="col-md-2"></div>
		<form action="crear_producto.php" class="col-md-8" method="post" enctype="multipart/form-data">

			<div class="form-group">
				
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Ingrese El Nombre" required="">
			</div>	

			<div class="form-group">
				
				<label for="nombre">Referencia</label>
				<input type="text" name="referencia" class="form-control" placeholder="Ingrese la referencia" required="">
			</div>	

			<div class="form-group">
				
				<label for="nombre">Fecha vencimiento</label>
				<input type="text" name="fecha_vencimiento" class="form-control" placeholder="Ingrese fecha vencimiento" required="">
			</div>	

			<div class="form-group">
				
				<label for="nombre">Valor</label>
				<input type="number" name="valor" class="form-control" placeholder="Ingrese valor" required="">
			</div>	
			<input type="hidden" name="usuario_id" value="<?php echo $_SESSION['id'];  ?>"> 

			<div class="form-group">
				
				<label for="nombre">Adjunto producto</label>
				<input type="file" name="adjunto_producto" class="form-control"  required="">
			</div>	

			<div class="text-center">
				<button type="submit" class="btn btn-primary">Crear Producto</button>
				<a href="listar_productos.php"  class="btn btn-success">Volver Atras</a>

			</div>		
		</form>	
	</div>


</div>


 <?php 
 	//incluir pie de pagina html
 	require_once('pie_pagina.php');

  ?>
