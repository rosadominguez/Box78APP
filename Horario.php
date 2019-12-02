<?php

  // Rosa Mª Domínguez Barrientos
	// Desarrollo Web en Entorno Servidor
  // curso 2019/20
  
    require_once "Navbar.php" ;
    require_once "php/Database.php" ;
    require_once "clases/HorarioC.php";
 
    $db = Database::getInstance("root","root","box") ;
                
                // buscamos los usuarios
                $sql = "SELECT tipClase FROM horario " ;
                $params =[]; 
                $db->query($sql,$params) ;
                $item = $db->getObject("Horario");
              
    
?>
<div class="container ">
<table class="horario">
  <tr>
    <th class="thHora">HORAS</th>
    <th class="thHora">LUNES</th>
    <th class="thHora">MARTES</th>
    <th class="thHora">MIERCOLES</th>
    <th class="thHora">JUEVES</th>
    <th class="thHora">VIERNES</th>
    <th class="thHora">SABADO</th>
  </tr>
  <tr>
    <td>9:00</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    
  </tr>
  <tr>
    <td>10:00</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Yoga</td>
    <td>OpenWod</td>
  </tr>
  <tr>
   <td>11:00</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Yoga</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>OpenWod</td>
  </tr>
  <tr>
    <td>12:00</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>OpenWod</td>

  </tr>
  <tr>
    <td>13:00</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>OpenWod</td>
  </tr>
  <tr>
    <td>17:00</td>
    <td>OpenWod</td>
    <td>OpenWod</td>
    <td>OpenWod</td>
    <td>OpenWod</td>
    <td>Niños</td>
  </tr>
  <tr>
    <td>18:00</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
  </tr>
  <tr>
    <td>19:00</td>
    <td>Wod</td>
    <td>Técnica</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Técnica</td>
  </tr>
  <tr>
    <td>20:00</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
    <td>Wod</td>
  </tr>


</table>

</div>

</div>

<?php
require_once "Footer.php";
?>

</body>
</html>