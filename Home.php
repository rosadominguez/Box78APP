<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "php/Database.php";
require_once "Navbar.php";
require_once "clases/Wod.php";

$hoy = date('Y/m/d');

//conectamos con la base de datos
$db = Database::getInstance("root", "root", "box");

//buscamos si hay guardado wod para ese día y lo mostramos, si no hay para ese dia mostramos una frase.

    $sql = "SELECT * FROM wod WHERE fecWod = ? ";
    $params = [$hoy];
    $db->query($sql, $params);
    $item = $db->getObject("Wod");
?>

<div class="container-fluid fondoHome">

    <div class="pizarra">
     <p>WOD</p>

    <?php

        if ($db->query($sql, $params)):

    ?>

    <p><?=$item->getTipoWod()?></p>
    <p><?=$item->getWod()?></p>

    <?php

        else:
            echo "Hoy no tienes que hacer nada!!!";
        endif;

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
