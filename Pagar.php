<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "php/Database.php";
require_once "Navbar.php";
require_once "clases/Usuario.php";
require_once "clases/PagosC.php";

$db = Database::getInstance("root", "root", "box");
$mes = $_POST["mes"];
$anio = $_POST["anio"];
$tarifa = $_POST["tarifa"];
$id = $_POST["idUsuario"];
$idI = $_GET["id"];

//insertamos en la base de datos el pago del usuario seleccionamod anteriormente en pagos

      $sql = "INSERT INTO pagos (idUsuario,mes,anio,tarifa) VALUES (?, ?, ?, ?) ";
      $params = [$id, $mes, $anio, $tarifa];

      if ($db->query($sql, $params)):
?>

                  <div class="alert alert-warning alertaPago" role="alert">
                   El pago se ha realizado correctamente!!
                  </div>
      <?php
      endif;
      ?>

<div class="pagar">
<form action="Pagar.php" method="post">

        <input type="hidden" name="idUsuario" value="<?=$idI?>"/>

         <select class="select1" name="mes">
               <option value="Enero">Enero</option>
               <option value="Febrero">Febrero</option>
               <option value="Marzo">Marzo</option>
               <option value="Abril">Abril</option>
               <option value="Mayo">Mayo</option>
               <option value="Junio">Junio</option>
               <option value="Julio">Julio</option>
               <option value="Agosto">Agosto</option>
               <option value="Septiembre">Septiembre</option>
               <option value="Octubre">Octubre</option>
               <option value="Noviembre">Noviembre</option>
               <option value="Diciembre">Diciembre</option>
         </select>
         <select class="select1" name="anio">
               <option value="2019">2019</option>
               <option value="2020">2020</option>
               <option value="2021">2021</option>
               <option value="2022">2022</option>
               <option value="2023">2023</option>

         </select>
         <select class="select1" name="tarifa">
               <option value="5 sesiones">5 Sesiones</option>
               <option value="9 sesiones">9 Sesiones</option>
               <option value="13 sesiones">13 Sesiones</option>
               <option value="1 sesion">1 Sesion</option>
               <option value="yoga">Yoga</option>
               <option value="ninio">Niño</option>

         </select>

         <button class="btn btn-primary botonPag" type="submit">Pagar</button>

      </form>
      </div>

</div>

<?php
require_once "Footer.php";
?>

</body>
</html>