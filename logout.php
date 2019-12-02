<?php

// Rosa Mª Domínguez Barrientos
// Desarrollo Web en Entorno Servidor
// curso 2019/20


	require_once "php/Session.php" ;

	// obtenemos la instancia de la sesión
	$ses = Sesion::getInstance() ;

	// cerramos la sesión
	$ses->close() ;

	// redirigimos al inicio
	$ses->redirect("index.php") ;
