<?php 
	require_once('encabezado.php');

	//resibir variables del formulario
	if (isset($_POST['email']) && isset($_POST['contrasena'])) 
	{
		//$email = $_POST['email'];
		//$contrasena = sha1($_POST['contrasena']); 

		$servidor_LDAP = "192.168.10.1";      //=> ip del servidor de Active Directory (LDAP)
		$servidor_dominio = "coffee.com"; //=> dominio completo
		$ldap_dn = "dc=coffee,dc=com"; //=> DN
		$usuario_LDAP = $_POST['email'];  //=> usuario del dominio
		$contrasena_LDAP = sha1($_POST['contrasena']);  //=> password del usuario
	
		$conectando_LDAP = ldap_connect($servidor_LDAP);
		ldap_set_option($conectando_LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($conectando_LDAP, LDAP_OPT_REFERRALS, 0);

		if ($conectando_LDAP) {
			
			$autenticado_LDAP = ldap_bind($conectando_LDAP,
			$usuario_LDAP . "@" . $servidor_dominio, $contrasena_LDAP);
			if ($autenticado_LDAP) {
				echo "autenticacion correcta";
			}else{
				echo "autenticacion incorrecta";
			}
		}else{
			echo "no se a podido autenticar con servidor ldap: ". $servidor_LDAP .", verifique user y passw ";
		}

		//incluir archivos de la configuracion de la base de datos
		//incluir conexion con base de datos
		/*require_once('conexion.php');

		$consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email = '$email' AND contrasena = '$contrasena'");
		$usuario = mysqli_fetch_array($consulta);
		if (mysqli_num_rows($consulta)) 
		{
			session_start();
			$_SESSION['email'] = $usuario['email'];
			$_SESSION['nombre'] = $usuario['nombre'];
			$_SESSION['apellido'] = $usuario['apellido'];
			$_SESSION['id'] = $usuario['id'];
			$login = 1;
			header("Location: listar_usuarios.php?login =".$login);
			

		}
		else
		{
			?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Alerta</strong> El usuario y la contraseña no coinciden, por favor intentelo de nuevo
				</div>

			<?php

		}*/

	}

?>

<div class="container-fluid">
<div class="col-md-2"></div>
	<form action="iniciar_sesion.php" method="POST" class="text-center col-md-8">
		<legend>Iniciar Sesión</legend>
		<?php 
			if (isset($_GET['login'])) 
			{

				?>
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Alerta</strong>Haz cerrado sesion correctamente
					</div>

				<?php
			}
		 ?>
		<div class="form-group">
			<label for="">Correo Electronico</label>
			<input type="text" name="email" class="form-control" placeholder="Ingrese correo elctronico" required="">
		</div>	

		<div class="form-group">
			<label for="">Contraseña</label>
			<input type="password" name="contrasena" class="form-control" placeholder="Ingrese contraseña" required="">
		</div>		

		<button type="submit" class="btn btn-primary">Iniciar Sesión</button>

	</form>		
</div>

 <?php 
	require_once('pie_pagina.php');
 ?>