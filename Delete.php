<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20
    
require_once "php/Database.php" ;
require_once "Navbar.php" ;
require_once "clases/Usuario.php" ;
require_once "clases/Peso.php" ;
require_once "clases/EjerciciosC.php" ;

//conectamos con la base de datos

$db = Database::getInstance("root","root","box") ;

    $idE = $_GET["idE"];
    $fecha = $_GET["fecha"];
    $idUsu = $usu->getIdUsuario();

    //esto lo utilizamos en la consulta de los pesos para eliminarlos
    //eliminamos de la tabla peso el seleccionado por el usuario
    //aquí tenemos en cuenta la fecha que también forma parte de la primary key

     $sql = "DELETE FROM peso WHERE idEjercicio = ? AND idUsuario = ? AND fecha =? " ;
    $params =[$idE,$idUsu,$fecha]; 
        if($db->query($sql,$params)): 
            
            //si la eliminación ha ido correcta redirigimos a la misma página
             $ses->redirect("ConsultaPesos.php?idE=$idE") ;

         endif;

   $idU = $_GET["idU"];

   //utilizamos este delete para la eliminación del usuario
   //eliminamos el usuario que corresponde a su id
   //en la base de datos he selecciónado null para cuando se elimine el usuario no se pierdan todos los datos 
   //en las demás tablas
 
   $sql = "DELETE FROM usuario WHERE idUsuario = ? " ;
   $params =[$idU]; 

   if($db->query($sql,$params)): 
    $ses->close();
    $ses->redirect("index.php") ;

   endif;




?>