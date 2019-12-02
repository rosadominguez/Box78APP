<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "php/Database.php";
require_once "Navbar.php";
require_once "clases/Usuario.php";
require_once "clases/Peso.php";
require_once "clases/EjerciciosC.php";

$db = Database::getInstance("root", "root", "box");

$idEj = $_POST["idEjercicio"];
$idUsua = $_POST["idUsuario"];
$peso = $_POST["peso"];
$fecha = $_POST["fecha"];
$idE = $_GET["idE"];
$idUsu = $usu->getIdUsuario();

//buscar ejercicios por su id
    $sql = "SELECT *  FROM ejercicios WHERE idEjercicio = ? ";
    $params = [$idE];
    $db->query($sql, $params);

  if (!$item = $db->getObject("Ejercicios")):
     echo "Lo sentimos, ha ocurrido un error,intentelo de nuevo.";
  else:

?>

<div class="modPesos">

    <h2><?=$item->getNomEjercicio()?></h2>

  <div class="videoPeso"><?=$item->getDemEjercicio()?></div>

<!-- Boton modal -->

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
       Registra tu peso
  </button>

  <?php

    //insertamos los datos en la tabla de peso
      $sql = "INSERT INTO peso (idEjercicio,idUsuario,peso,fecha) VALUES (?, ?, ?, ?) ";
      $params = [$idEj, $idUsua, $peso, $fecha];
  
      // if ($db->query($sql, $params)):
      // endif;

?>

<!-- Empieza el modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=$item->getNomEjercicio()?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action ="ConsultaPesos.php?idE=<?=$idE?>" method="post">

        <input type="hidden" name="idUsuario" value="<?=$idUsu?>"/>
        <input type="hidden" name="idEjercicio" value="<?=$idE?>"/>
        Peso:  <input type="text" name="peso">
        Fecha: <input type="date" name="fecha">

      <button class="btn btn-primary bo" type="submit">Registrar</button>

      </form>
      </div>
    </div>
  </div>
</div>


<!-- Termina el modal -->


<table  class="tablaPesos">

    <?php

    //buscamos los pesos correspondientes del ususario para el ejercicio en concreto

      $sql = "SELECT *  FROM peso WHERE idUsuario = ? AND idEjercicio = ?";
      $params = [$idUsu, $idE];
      $db->query($sql, $params);

      if (!$db->query($sql, $params)):

          echo "<br>No tienes peso registrado para este ejercicio.";

      else:
    
    ?>
                        <tr>
                        <th>Fecha:</th>
                        <th>Peso:</th>
                        </tr>

    <?php
        //mientras tengamos respuesta de los pesos los vamos mostrado
        while ($item = $db->getObject("Peso")):
          $fecha = $item->getFecha();
    ?>
	                     <tr>
	                        <td><?=$item->getFecha()?></td>
	                        <td><?=$item->getPeso()?> kg</td>
	                        <td><button class="btn btn-warning btn-sm"><a href="Delete.php?idE=<?=$idE?>&fecha=<?=$fecha?>">Eliminar</a></button></td>
	                     </tr>

	<?php

        endwhile;

  endif;

  ?>
         </table>

<?php

endif;

?>

</div>


<!-- footer -->

</div>

<?php
require_once "Footer.php";
?>

</body>
</html>