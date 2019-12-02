<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "Navbar.php";

?>

    <div class="row columnas">
        <div class="col-md-6 col">
            <a class="boton" href="listUsuarios.php" style="background-image: url(img/lista.jpg) ;"> SOCIOS </a>
        </div>
    <div class="col-md-6 col">
        <a class="boton" href="Wods.php" style="background-image: url(img/ejercicios.jpg) ;">
            WODS
        </a>
    </div>
    <div class="col-md-6">
        <a class="boton" href="Pagos.php" style="background-image: url(img/dinero.jpg) ;">
        PAGOS 
        </a>
    </div>
    <div class="col-md-6">
        <a class="boton" href="#" style="background-image: url(img/fuerte.jpg) ;"> </a>
    </div>
    </div>

<!-- footer -->

</div>

<?php
require_once "Footer.php";
?>

</body>
</html>