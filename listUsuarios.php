
<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "php/Database.php";
require_once "Navbar.php";
require_once "clases/Usuario.php";
require_once "clases/PagosC.php";

$mes = $_POST["mes"];
$anio = $_POST["anio"];

// conectamos con la base de datos
$db = Database::getInstance("root", "root", "box");

// buscamos los usuarios
      $sql = "SELECT * FROM usuario ";
      $params = [];
      $db->query($sql, $params);
      $total = $db->getNumRows();

?>

   <div class="listaBotones1">
         Lista Socios
         <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#cajaTabla" aria-expanded="false" aria-controls="cajaTabla">
           VER
         </button>
   </div>

   <div class="collapse container-fluid" id="cajaTabla">
         <table  class="tablaUsuarios">
               <tr>
                     <div class="th">
                        <th>IdUsuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                     </div>
               </tr>
      <?php
            //mostramos los datos del respectivo usuario hasta que acabe el while
            while ($item = $db->getObject("Usuario")):

      ?>
                     <tr>
                        <td><?=$item->getIdUsuario()?></td>
                        <td><?=$item->getNombre()?></td>
                        <td><?=$item->getApellido1()?></td>
                        <td><?=$item->getTelefono()?></td>
                        <td><?=$item->getEmail()?></td>
                     </tr>
      <?php

            endwhile;

      ?>
         
            </table>

   </div>

      <?php

// buscamos los usuarios por mes y año

            $sql = "SELECT *  FROM usuario JOIN pagos ON usuario.idUsuario = pagos.idUsuario WHERE mes = ? AND anio = ?";
            $params = [$mes, $anio];
            $db->query($sql, $params);
      ?>


<div class="listaBotones2">

      <form action="listUsuarios.php" method="POST">
      Lista socios por mes y año <br>
         <select name="mes">
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
         <select name="anio">
               <option value="2019">2019</option>
               <option value="2020">2020</option>
               <option value="2021">2021</option>
               <option value="2022">2022</option>
               <option value="2023">2023</option>

         </select>
               <button class="btn btn-primary btn-sm" type="submit" >
           VER
         </button>
      </form>
   </div>
   <?php
            //si la consulta no falla  listamos los usuarios de ese mes y año en concreto
            if ($db->query($sql, $params)):
      
      ?>



   <div class="cajaTabla2">
         <table class="tablaUsuarios">
               <tr>
                     <th>Nombre</th>
                     <th>Apellido</th>
                     <th>Teléfono</th>
                     <th>Correo Electrónico</th>
               </tr>
      <?php

            while ($item = $db->getObject("Usuario")):

      ?>

      <tr>
         <td><?=$item->getNombre()?></td>
         <td><?=$item->getApellido1()?></td>
         <td><?=$item->getApellido2()?></td>
         <td><?=$item->getTelefono()?></td>
     </tr>

      <?php

            endwhile;
      ?>

         </table>

      </div>

      <?php

            endif;
      ?>

<!-- footer -->
</div>

<?php
require_once "Footer.php";
?>

</body>
</html>

