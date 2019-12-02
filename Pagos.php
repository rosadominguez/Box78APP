<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "php/Database.php";
require_once "Navbar.php";
require_once "clases/Usuario.php";
require_once "clases/PagosC.php";

$db = Database::getInstance("root", "root", "box");
$nombre = $_POST["nombre"];

//buscamos los usuarios por su nombre

   $sql = "SELECT * FROM usuario  WHERE nombre = ? ";
   $params = [$nombre];
   $db->query($sql, $params);
?>

<div class="busNomPago">
   <form method="post">

            <div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="nombre">Nombre:</label>
					<input class="form-control" type="text" name="nombre" required />
				</div>
			</div>
            <div class="row form-group">
				<div class="col-md-4 mx-auto">
					<button class="btn btn-primary w-100" type="submit">Buscar</button>
				</div>
			</div>

	</form>
</div>

   <?php

      if ($db->query($sql, $params)):

   ?>

<div class="container-fluid">
<table class="tablaUsu container">
               <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellido1</th>
                        <th>Teléfono</th>
                        <th>Pagar</th>
               </tr>
   <?php

   //while para mostrar todos los ususarios con los datos que necesitamos

      while ($item = $db->getObject("Usuario")):
         $id = $item->getIdUsuario();
   
   ?>
	                     <tr>
	                        <td><img style="width:40px; height-40px;" src=<?=$item->getFoto()?>></td>
	                        <td><?=$item->getNombre()?></td>
	                        <td><?=$item->getApellido1()?></td>
	                        <td><?=$item->getTelefono()?></td>
	                        <td><a href="Pagar.php?id=<?=$id?>">click</a></td>
	                     </tr>

	                     <?php
      endwhile;
   ?>
         </table>
         </div>
         
   <?php
      endif;
   ?>


</div>

<?php
require_once "Footer.php";
?>

</body>
</html>