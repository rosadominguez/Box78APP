<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "php/Database.php";
require_once "Navbar.php";
require_once "clases/Usuario.php";
require_once "clases/EjerciciosC.php";

$id = $usu->getIdUSuario();
$peso = $_POST["peso"];

//conectamos con la base de datos

$db = Database::getInstance("root", "root", "box");

// buscamos los ejercicios y los mostramos luego
	$sql = "SELECT * FROM ejercicios ";
	$params = [];
	$db->query($sql, $params);
?>

<div class="ejercicios">
   <div class="row cards">
                     
	<?php
		while ($item = $db->getObject("Ejercicios")):
    //var_dump($item);
    ?>
	        <div class="col-md-6">
	            <div class="card" style="width: 27rem;">
	                <div class=" container video"><?=$item->getDemEjercicio()?></div>
	                    <div class="card-body">
	                       <h5 class="card-title"><?=$item->getNomEjercicio()?></h5>
	                       <p class="card-text"><?=$item->getDesEjercicio()?></p>
	                    </div>
	                </div>
	            </div>

	<?php
		endwhile;
	?>

   </div>
</div>

<!-- footer -->

</div>

<?php
require_once "Footer.php";
?>

</body>
</html>