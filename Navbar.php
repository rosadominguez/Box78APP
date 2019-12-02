<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once "php/Session.php";

//instanciamos la sesión.

$ses = Sesion::getInstance();

//si no hay sesión redirigimos al index.

if (!$ses->checkActiveSession()) {
    $ses->redirect("index.php");
}

$usur = $ses->getUsuario();

$id = $usur->getIdUsuario();

//conectamos con la base de datos

$db = Database::getInstance("root", "root", "box");

//buscamos al usuario por su id

$sql = "SELECT * FROM usuario WHERE idUsuario = ?  ; ";
$params = [$id];
if ($db->query($sql, $params)) {
    $usu = $db->getObject("Usuario");
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
	<title>Box78</title>
	<meta charset="utf8" />
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="stylesheet" type="text/css" href="css/navbar.css" />
  <link rel="stylesheet" type="text/css" href="css/menu.css" />
  <link rel="stylesheet" type="text/css" href="css/listUsuarios.css" />
  <link rel="stylesheet" type="text/css" href="css/home.css" />
  <link rel="stylesheet" type="text/css" href="css/galeria.css" />
  <link rel="stylesheet" type="text/css" href="css/perfil.css" />
  <link rel="stylesheet" type="text/css" href="css/pagos.css" />
  <link rel="stylesheet" type="text/css" href="css/tarifas.css" />
  <link rel="stylesheet" type="text/css" href="css/pesos.css" />
  <link rel="stylesheet" type="text/css" href="css/wod.css" />
  <link rel="stylesheet" type="text/css" href="css/ejercicios.css" />
  <link rel="stylesheet" type="text/css" href="css/pagar.css" />
  <link rel="stylesheet" type="text/css" href="css/horario.css" />
  <link rel="stylesheet" type="text/css" href="css/footer.css" />
  <link rel="stylesheet" type="text/css" href="css/consultaPesos.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg" style="background-color: black;padding-left:40px">
  <a style="margin-left: 20px;margin-right: 10px" href="Home.php"><img src="img/logoP.png" alt="LogoBox78"></a>
  <h1> Box78</h1>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav iconos">
      <a href="https://www.facebook.com/Box78malaga/"><img src="img/facebook.png" alt="Facebook"></a>
      <a href="https://www.instagram.com/box78malaga/"><img src="img/instagram.png" alt="Instagram"></a>
      <a href="#"><img src="img/twitter.png" alt="Twitter"></a>
      <a class="nav-item nav-link salir" href="logout.php">Salir</a>
    </div>
</nav>

<div class="container-fluid foto parallax">
<div class="topnav">
  <a href="Home.php">Inicio</a>
  <a href="Horario.php">Horario</a>
  <a href="Tarifas.php">Tarifas</a>
  <a href="Galería.php">Galería</a>
  <a href="Ejercicios.php">Ejercicios</a>
<?php if ($usu->getAdmin() == 1) {?><a href="Menu.php">Administración</a> <?php }?>
</div>
</div>

</head>
<body>

<div class="container-fluid fondo">
<div class="row">
<div class="col-md-3">
<div class="container lateral">

<div class="container-fluid fotoPerfil">

<?php
if (is_null($usu->getFoto())):
?>
	<img class="avatar" src="img/logo.JPG"/>
<?php
else:
?>

<img class="avatar" src="<?=$usu->getFoto()?>">

<?php
endif;
?>

</div>
<div class="vertical-menu">
  <a href="Perfil.php">Perfíl</a>
  <a href="Pesos.php">Mis pesos</a>
  <a href="#">Mis Héroes</a>

</div>
</div>
</div>
<div class="col-md-9">





