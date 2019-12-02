<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "php/Database.php";
require_once "Navbar.php";
require_once "clases/Usuario.php";

//Datos que vamos a enviar por el formulario

$nom = $_POST["nombre"];
$ape1 = $_POST["apellido1"];
$ape2 = $_POST["apellido2"];
$tel = $_POST["telefono"];
$ema = $_POST["email"];
$foto = $_POST["foto"];
$id = $usu->getIdUsuario();

//creamos una api_key para el usuario y la introducimos en su base de datos
	if (is_null($usu->getApiKey())):

    	$api_key = md5($usu->getEmail() . time());

    	$sql = "UPDATE usuario SET apiKey = ? WHERE idUsuario= ?";
		$params = [$api_key, $id];
		
    	if ($db->query($sql, $params)):
       		//echo "api key disponible";
		endif;
	
	endif;

//Conectamos con la base de datos

$db = Database::getInstance("root", "root", "box");

//Buscamos el usuario por su id , hacemos esto cada vez que el usuario modifique su perfil para actualizarlo

	$sql = "SELECT * FROM usuario WHERE idUsuario = ?  ; ";
	$params = [$id];
		if ($db->query($sql, $params)):
    		$usu = $db->getObject("Usuario");
		endif;

//Modificamos los datos del usuario y actualizamos volviendo a buscarlo

	$sql = "UPDATE usuario SET nombre= ?, apellido1= ?, apellido2=?, telefono=?, email=? WHERE idUsuario= ?";
	$params = [$nom, $ape1, $ape2, $tel, $ema, $id];
		if ($db->query($sql, $params)):
    		$sql = "SELECT * FROM usuario WHERE idUsuario = ?  ; ";
    		$params = [$id];
    			if ($db->query($sql, $params)):
        		$usu = $db->getObject("Usuario");
			endif;
		endif;

//Modificamos la foto del usuario

if (!empty($_FILES)):

    $path_ini = $_FILES["img"]["tmp_name"];
    $path_fin = "img/avatares/" . $_FILES["img"]["name"];
    $foto2 = "img/avatares/" . $_FILES["img"]["name"];

    	if (!move_uploaded_file($path_ini, $path_fin)):
       		 echo "Se ha producido un error al cargar la imagen del usuario";
		else:
			
        	$sql = "UPDATE usuario SET foto = ? WHERE idUsuario = ? ";
        	$params = [$foto2, $id];
        		if ($db->query($sql, $params)):
            			$usu->setFoto($path_fin);
            //si se modifica redirigimos a esta misma pagina para cargar el navbar y actualizar la foto
            			$ses->redirect("Perfil.php");
				endif;
    	endif;
endif;
?>

<div class="tarjeta">
	<div class="row">
		<div class="col-md-5">
			<div class="container fot">
	<?php
		if (is_null($usu->getFoto())):
	?>
			<img class="avatar" src="img/logo.JPG"/>
	<?php
		else:
	?>

			<img class="avatar" src="<?=$usu->getFoto()?>">

	<?php
		endif;
	?>

<!-- Empieza el modal -->

<button type="button" class="btn btn-primary btn-sm botFoto" data-toggle="modal" data-target="#exampleModal">
  Cambiar foto
</button>

<!-- Modal para cambiar la foto del ususario -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      		<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Elige tu foto</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        			</button>
      		</div>
      		<div class="modal-body">
	  				<form method="post" action="Perfil.php" enctype="multipart/form-data">
	  					<div class="row">
							<div class="col form-group">
								<input type="file" class="form-control-file" id="img" name="img"
				    	   		accept="image/jpg, image/png" />
							</div>
						</div>
						<div class="row">
							<div class="col form-group">
				    			<button class="btn btn-primary" type="submit">Guardar datos</button>
							</div>
						</div>
					</form>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      		</div>
    	</div>
  	</div>
</div>
</div>
</div>

<div class="col-md-7">
	<div class="container datos">

		<ul>
	<!-- Mostramos los datos del usuario -->

    		<li><strong>Nombre: </strong><?=$usu->getNombre()?></li>
    		<li><strong>Apellido1: </strong><?=$usu->getApellido1()?></li>
    		<li><strong>Apellido2: </strong><?=$usu->getApellido2()?></li>
    		<li><strong>Email: </strong><?=$usu->getEmail()?></li>
			<li><strong>Telefono: </strong><?=$usu->getTelefono()?></li>
			<li><strong>ApiKey: </strong><?=$usu->getApiKey()?></li>

    <button class="btn btn-primary btn-sm bo" type="button" data-toggle="collapse" data-target="#camPer" aria-expanded="false" aria-controls="camPer">
               MODIFICAR
		 </button>
	<button class="btn btn-warning btn-sm bo"><a href="Delete.php?idU=<?=$id?>">Eliminar Perfil</a></button>

		</ul>
	</div>
</div>
</div>
</div>


<div class="collapse" id="camPer">

<form method="post">

			<!-- Email de usuario -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="email">Email de usuario:</label>
					<input class="form-control" type="email" name="email"
					value="<?=$usu->getEmail()?>" required />
				</div>
			</div>

			<!-- Nombre del usuario-->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="nombre">Nombre:</label>
					<input class="form-control" type="text" name="nombre" value="<?=$usu->getNombre()?>" required />
				</div>
			</div>

			<!-- Apellido 1 -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="apellido1">Apellido1:</label>
					<input class="form-control" type="text" name="apellido1" value="<?=$usu->getApellido1()?>" required />
				</div>
			</div>

            <!-- Apellido 2 -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="apellido2">Apellido2:</label>
					<input class="form-control" type="text" name="apellido2" value="<?=$usu->getApellido2()?>" required />
                </div>
            </div>

            <!-- Telefono del usuario -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="telefono">Telefono: </label>
					<input class="form-control" type="tel" name="telefono" value="<?=$usu->getTelefono()?>" />
				</div>
			</div>
            <div class="row form-group">
				<div class="col-md-4 mx-auto">

					<button class="btn btn-primary w-100" type="submit">Enviar</button>
				</div>
			</div>
		</form>
	</div>
</div>


</div>

<?php
require_once "Footer.php";
?>

</body>
</html>