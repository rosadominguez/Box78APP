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

// buscamos los ejercicios

       $sql = "SELECT * FROM ejercicios ";
       $params = [];
       $db->query($sql, $params);
?>

       <div class="container divPesos">

<?php

//mediante el while mostramos todos los ejercicios de nuestra base de datos

       while ($item = $db->getObject("Ejercicios")):
              $idE = $item->getIdEjercicio();
              //var_dump($item);
?>

	       <div class="pesos"><?=$item->getNomEjercicio()?>
	              <a href="ConsultaPesos.php?idE=<?=$idE?>">click</a>
	       </div>

<?php

       endwhile;

?>
      
       </div>

</div>

<?php
require_once "Footer.php";
?>
</body>
</html>