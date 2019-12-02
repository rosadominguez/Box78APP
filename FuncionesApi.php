<?php

	// Rosa Mª Domínguez Barrientos
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20
	
  require_once "clases/HorarioC.php";

  function todo()
		{
			$data=[];

			//conectamos con la base de datos

			$db = Database::getInstance("root", "root", "box");

			//buscamos el horario
			$sql = "SELECT * FROM horario " ;
			$params =[]; 

		if($db->query($sql,$params)):

			//seleccionamos los datos que vamos a querer mostrar cuando usemos la api

			while($hor = $db->getObject("Horario")):
			$info = [
						"dia"       => $hor->getDiaSemana(),
                        "hora"     => $hor->getHora(),
                        "monitor"    => $hor->getMonitor(),
						"clase"    => $hor->getTipClase()
					] ;
			//guardamos en el array $data los resultados que esta obteniendo $info
			array_push($data,$info);
			endwhile;

		else:
			echo "ups, algo va mal!! Vueve a introducir otro dato.";
		endif;
				return $data;
			
		}

		function clase($tipClase)
		{
			$data=[];

			$db = Database::getInstance("root", "root", "box");
			$sql = "SELECT * FROM horario WHERE tipClase LIKE ? " ;
        	$params =[$tipClase]; 

		if($db->query($sql,$params)):

			while($hor = $db->getObject("Horario")):
			$info = [
						"dia"       => $hor->getDiaSemana(),
						"hora"     => $hor->getHora(),
						"monitor"    => $hor->getMonitor()
					] ;

			array_push($data,$info);
			endwhile;

		else:
			echo "ups, algo va mal!! Vueve a introducir otro dato.";
		endif;
				return $data;
			
		}

		function monitor($monitor)
		{
			$data=[];

			$db = Database::getInstance("root", "root", "box");
			$sql = "SELECT * FROM horario WHERE monitor LIKE ? " ;
        	$params =[$monitor]; 

		if($db->query($sql,$params)):

			while($hor = $db->getObject("Horario")):
			$info = [
						"dia"       => $hor->getDiaSemana(),
						"hora"     => $hor->getHora(),
						"clase"    => $hor->getTipClase()
					] ;

			array_push($data,$info);
			endwhile;

		else:
			echo "ups, algo va mal!! Vueve a introducir otro dato.";
		endif;
				return $data;
			
		}

		function dia($dia)
		{
			$data=[];

			$db = Database::getInstance("root", "root", "box");
			$sql = "SELECT * FROM horario WHERE diaSemana LIKE ? " ;
        	$params =[$dia]; 

		if($db->query($sql,$params)):

			while($hor = $db->getObject("Horario")):
			$info = [
						"hora"     => $hor->getHora(),
						"clase"    => $hor->getTipClase(),
						"monitor"    => $hor->getMonitor()

					] ;

			array_push($data,$info);
			endwhile;

		else:
			echo "ups, algo va mal!! Vueve a introducir otro dato.";
		endif;
				return $data;
			
		}
?>