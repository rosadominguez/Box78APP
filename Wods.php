<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "php/Database.php";
require_once "Navbar.php";

$tipo = $_POST["tipoWod"];
$wod = $_POST["wod"];
$fecha = $_POST["fecWod"];

//insertamos el wod a realizar en la fecha indicada

$sql = "INSERT INTO wod (tipoWod,wod,fecWod) VALUES (?, ?, ?) ";
$params = [$tipo, $wod, $fecha];
$db->query($sql, $params);

?>

        <div class="wod">
        <form action="Wods.php" method="post">
            Tipo de wod:<select name="tipoWod">
               <option value="ForTime">ForTime</option>
               <option value="AMRAP">AMRAP</option>
               <option value="EMON">EMON</option>
               <option value="Rondas">Rondas</option>
            </select><br>
            Wod: <input type="text" name="wod"><br>
            Fecha: <input type="date" name="fecWod"><br>
            
            <input type="submit" value="Enviar">
</form>
</div>

</div>

<?php
require_once "Footer.php";
?>

</body>
</html>