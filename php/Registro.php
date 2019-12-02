<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "Database.php";

function redirect(string $url)
{
    header("Location: $url");
    die();
}

if (!empty($_POST)):

    echo "<pre>" . print_r($_POST, true) . "</pre>";

    // capturamos los datos del formulario

    $nom = $_POST["nombre"];
    $ape1 = $_POST["apellido1"];
    $ape2 = !empty($_POST["apellido2"]) ? $_POST["apellido2"] : null;
    $pas = $_POST["contrasena"];
    $conf = $_POST["conf"];
    $tel = $_POST["telefono"];
    $ema = $_POST["email"];

    // comprobar que las contraseñas son iguales
    if ($pas == $conf):

        $db = Database::getInstance("root", "root", "box");

        // construimos la sentecia para introducir los datos del usuario en la base de datos

        $sql = "INSERT INTO usuario (nombre,apellido1,apellido2,contrasena,telefono,email) VALUES (?, ?, ?, ?, ?, ?)  ";
        $params = [$nom, $ape1, $ape2, md5($pas), $tel, $ema];

        // si la consulta falla mandamos un mensaje de error

        if (!$db->query($sql, $params)):
            $error = "Se ha producido un error en la creación del usuario";
            echo "hay problemassss";
        endif;

    else:
        $error = "Las contraseñas no coinciden";
	endif;
	
	//redirigimos al home

    redirect("../Home.php");
endif;

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>· BOX78 ·</title>
	<meta charset="utf8" />
	<link rel="stylesheet" type="text/css" href="../css/registro.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body>

	<div class="container-fluid registrar">

	<?php
		//si existe el error lo mostramos en modo de alerta
		if (isset($error)):
    		echo "<div class=\"alert alert-danger w-50 mx-auto\">";
    		echo $error;
    		echo "</div>";
		endif;
?>

<div class="row">
<div class="col-md-4">

<img class="logRegistro" src="../img/logo.PNG"/>

</div>

<div class="col-md-8 reg">

<h2 style="color:white">Are you ready!!!</h2>
		<!-- formulario de registro -->
		<form method="post">

			<!-- nombre de usuario -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="email">Email de usuario:</label>
					<input class="form-control" type="email" name="email"
						   placeholder="email@flixnet.com" required />
				</div>
			</div>

			<!-- nombre -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="nombre">Nombre:</label>
					<input class="form-control" type="text" name="nombre" required />
				</div>
			</div>

			<!-- apellido 1 -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="apellido1">Apellido1:</label>
					<input class="form-control" type="text" name="apellido1" required />
				</div>
			</div>

            <!-- apellido 2 -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="apellido2">Apellido2:</label>
					<input class="form-control" type="text" name="apellido2" required />
				</div>
			</div>

			<!-- contraseña -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="contrasena">Contraseña:</label>
					<input class="form-control" type="password" name="contrasena"
						   required />
				</div>
			</div>

			<!-- confirmación contraseña -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="conf">Confirmación contraseña:</label>
					<input class="form-control" type="password" name="conf"
						   required />
				</div>
			</div>

			<!-- telefono -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="telefono">Telefono: </label>
					<input class="form-control" type="tel" name="telefono" />
				</div>
			</div>

			<!-- registrar -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<button class="btn btn-primary w-100" type="submit">Registrar</button>
				</div>
			</div>
		</form>

		<!-- volver atrás -->
		<div class="row">
			<div class="col-md-4 mx-auto text-center">
				<a href="http://localhost:8888/box78/index.php" class="btn btn-link">volver atrás</a>
			</div>
		</div>
	</div>
	</div>
	</div> <!-- container -->

</body>

</html>