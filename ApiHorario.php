
<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20

header("Content-Type: application/json");

require_once "php/Database.php";
require_once "clases/HorarioC.php";
require_once "clases/Usuario.php";
//require_once "Navbar.php" ;
require_once "FuncionesApi.php";

// ejemplo de consulta Api_key:
//   http://localhost:8888/box78/ApiHorario.php?api_Key=80a38f314fe2e5e7f47c967032126fdd&op=monitor&monitor=Rosa

//si no has introducido ninguna aki key muestra el mensaje

    if (!$api = $_GET["api_Key"]):
          $info = [
                "cod" => 0,
                 "mensaje" => "Disculpa, no has introducido ninguna API.",
        ];
    $msg = "la has liadoooo";

    else:

    //conectamos con la base de datos

    $db = Database::getInstance("root", "root", "box");
    $sql = "SELECT * FROM usuario WHERE apiKey = ? ";
    $params = [$api];

    //si todavía no tienes akiKey te manda un mensaje para que visites tu perfil y crearla

    if (!$db->query($sql, $params)):
        $info = [
            "cod" => 1,
            "mensaje" => "Disculpa, no tienes API, visita tu perfil para obtenerla.",
        ];
        $msg = "la has liadoooo";

    else:
        //si no has introducido ninguna operación te muestra el mensaje correspondiente

        if (!$op = $_GET["op"]):
            $msg = "la has liadoooo ahoraaaa";
            $info = [
                "cod" => 2,
                "mensaje" => "Disculpa, necesitas introducir una operación.",
            ];
        else:

            //switch que realiza una acción según la operación elegida

            switch ($op) {
                case 'todo':
                    $info = todo();
                    $msg = "lo has hecho perfecto";
                    break;

                case 'monitor':

                    //si introduces la operación pero no introduces el dato a consultar te muestra el mensaje

                    if (!($_GET["monitor"])):
                        $info = [
                            "cod" => 3,
                            "mensaje" => "Debes introducir el monitor a consultar.",
                        ];
                        $msg = "la has liadoooo";
                    else:
                        $info = monitor($_GET["monitor"]);
                        $msg = "lo has hecho perfecto";
                    endif;
                    break;

                case 'clase':
                    if (!($_GET["clase"])):
                        
                        //si introduces la operación pero no introduces el dato a consultar te muestra el mensaje

                        $info = [
                            "cod" => 3,
                            "mensaje" => "Debes introducir la clase a consultar.",
                        ];
                        $msg = "la has liadoooo";
                    else:
                        $info = clase($_GET["tipClase"]);
                        $msg = "lo has hecho perfecto";
                    endif;
                    break;

                case 'dia':
                    if (!($_GET["dia"])):
                        
                        //si introduces la operación pero no introduces el dato a consultar te muestra el mensaje

                        $info = [
                            "cod" => 3,
                            "mensaje" => "Debes introducir el dia a consultar.",
                        ];
                        $msg = "la has liadoooo";
                    else:
                        $info = dia($_GET["dia"]);
                        $msg = "lo has hecho perfecto";
                    endif;
                    break;

                default:
                    $data = [
                        "cod" => 4,
                        "mensaje" => "Código de operación incorrecto.",
                    ];
                    break;
            }
        endif;

    endif;

endif;

//guardamos los resultados obtenidos para luego mostrarlos por json

$resultado = [
    "Mensaje" => $msg,
    "Datos" => $info,
];

//mostrams los resultados en formato json

echo json_encode($resultado);

// DEJO ESTO AQUÍ PORQUE A VECES ME DA PROBLEMA FUERA (POR SI ACASO)
// function todo()
//     {
//         $data=[];

//         $db = Database::getInstance("root", "root", "box");
//         $sql = "SELECT * FROM horario " ;
//         $params =[];

//     if($db->query($sql,$params)):

//         while($hor = $db->getObject("Horario")):
//         $info = [
//                     "dia"       => $hor->getDiaSemana(),
//                     "hora"     => $hor->getHora(),
//                     "clase"    => $hor->getTipClase()
//                 ] ;

//         array_push($data,$info);
//         endwhile;

//     else:
//         echo "ups, algo va mal!! Vueve a introducir otro dato.";
//     endif;
//             return $data;

//     }

//     function clase($tipClase)
//     {
//         $data=[];

//         $db = Database::getInstance("root", "root", "box");
//         $sql = "SELECT * FROM horario WHERE tipClase LIKE ? " ;
//         $params =[$tipClase];

//     if($db->query($sql,$params)):

//         while($hor = $db->getObject("Horario")):
//         $info = [
//                     "dia"       => $hor->getDiaSemana(),
//                     "hora"     => $hor->getHora(),
//                     "monitor"    => $hor->getMonitor()
//                 ] ;

//         array_push($data,$info);
//         endwhile;

//     else:
//         echo "ups, algo va mal!! Vueve a introducir otro dato.";
//     endif;
//             return $data;

//     }

//     function monitor($monitor)
//     {
//         $data=[];

//         $db = Database::getInstance("root", "root", "box");
//         $sql = "SELECT * FROM horario WHERE monitor LIKE ? " ;
//         $params =[$monitor];

//     if($db->query($sql,$params)):

//         while($hor = $db->getObject("Horario")):
//         $info = [
//                     "dia"       => $hor->getDiaSemana(),
//                     "hora"     => $hor->getHora(),
//                     "clase"    => $hor->getTipClase()
//                 ] ;

//         array_push($data,$info);
//         endwhile;

//     else:
//         echo "ups, algo va mal!! Vueve a introducir otro dato.";
//     endif;
//             return $data;

//     }

//     function dia($dia)
//     {
//         $data=[];

//         $db = Database::getInstance("root", "root", "box");
//         $sql = "SELECT * FROM horario WHERE diaSemana LIKE ? " ;
//         $params =[$dia];

//     if($db->query($sql,$params)):

//         while($hor = $db->getObject("Horario")):
//         $info = [
//                     "hora"     => $hor->getHora(),
//                     "clase"    => $hor->getTipClase(),
//                     "monitor"    => $hor->getMonitor()

//                 ] ;

//         array_push($data,$info);
//         endwhile;

//     else:
//         echo "ups, algo va mal!! Vueve a introducir otro dato.";
//     endif;
//             return $data;

//     }

?>
