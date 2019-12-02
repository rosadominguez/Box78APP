<?php

	// Rosa Mª Domínguez Barrientos
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	require ("php/Session.php") ;

	// instanciamos la sesión
	$ses = Sesion::getInstance() ;

	// comprobamos si hay sesión activa
	if ($ses->checkActiveSession())
		$ses->redirect("Home.php") ;

	// comprobar si hemos recibido información
	// a través del formulario ($_POST)
	if (!empty($_POST)):

		$email = $_POST["email"] ;
		$pass  = $_POST["contrasena"] ;

		// intentamos loguearnos
		$ok  = $ses->login($email, $pass) ;

		// si el login se ha hecho con éxito
		// redirigimos al home
		if ($ok) $ses->redirect("Home.php") ;

	endif ;

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>· BOX78 ·</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body style="background-color: black">
<div class="formulario">
<div class="row">
<div class="col-md-5">
	<div class="logo">

	</div>
</div>
<div class="col-md-7">
	<div class="container formu">

		<!-- formulario de login -->
		<form method="post">

			<!-- email -->
			<div class="row mt-5 form-group">
				<div class="col-md-12">
					<input class="form-control mx-auto" style="width: 300px; height:40px;" type="text" 
						   name="email" placeholder="email@box78.com" required />
				</div>
			</div>

			<!-- contraseña -->
			<div class="row form-group">
				<div class="col-md-12">
					<input class="form-control mx-auto" style="width: 300px; height:40px;" type="password" 
						   name="contrasena" placeholder="contraseña" required />
				</div>
			</div>

			<?php
				if ((isset($ok)) && (!$ok)):
			?>
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="alert alert-danger w-50" role="alert">
					  Usuario o contraseña incorrectas.
					</div>
				</div>
			</div>
			<?php
				endif ;
			?>

			<!-- botón LOGIN -->
			<div class="row form-group">
				<div class="col-md-12 text-center">
					<button class="btn btn-primary w-25 " style="margin-top: 4px;" type="submit">Entrar</button>
				</div>
			</div>

		</form>

		<!-- acceso REGSISTRO -->
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="php/Registro.php" class="btn btn-link">registrar</a>
			</div>
		</div>

	</div> <!-- container -->
	</div> <!-- columnas -->
	</div> <!-- columna formulario -->
	</div> <!-- formulario -->
</body>
</html>