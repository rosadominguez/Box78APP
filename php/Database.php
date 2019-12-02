<?php

	// Rosa Mª Domínguez Barrientos
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Database 
	{
		private $host = "localhost" ;
		private $charset = "charset=utf8" ;

		private $dbName ;
		private $dbUser ;
		private $dbPass ;

		private $pdo = null ;
		private $result = null ;
		private $result2 = null ;
		private $result3 = null ;
		private static $instance = null ;

		private function __construct($dbu, $dbp, $dbn) 
		{
			$this->dbUser = $dbu ;
			$this->dbPass = $dbp ;
			$this->dbName = $dbn ;

			$this->connect() ;
		}

		//destruimos la clase
		
		public function __destruct()
		{
			$this->sqli->close() ;
		}

		//función para controlar la instancia de la base de datos
		//utilizamos el método singleton

		public static function getInstance($dbu, $dbp, $dbn)
		{
			// si no existe instancia la creamos
			if (Database::$instance==null) 
				Database::$instance = new Database($dbu, $dbp, $dbn) ;

			// devolvemos la instancia
			return Database::$instance ;
		}

		
		//hacemos privado el método para que no se pueda clonar
		 
		private function __clone() { }

		//conectamos con el motor de la base de datos

		private function connect()
		{
			//utilizamos PDO

			try {
				$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName","$this->dbUser","$this->dbPass") ;
			} catch (PDOException $e) {
				die("ERROR:: ".$e->getMessage()) ;
			}
		}

		//Realizamos una consulta y nos devolvera true o false dependiendo del resultado
		public function query($sql,$params):bool
		{
			$this->result = $this->pdo->prepare($sql) ;
			$this->result->execute($params);

			//contamos las filas de la respuesta
			if ($this->result->rowCount() > 0)
				return true;

			return false ;
		}

		
		//devolvemos el resultado en formato Objeto
		//$cls (optativo, valor por defecto stdClass)
	
		public function getObject($cls = "StdClass")
		{
			if (is_null($this->result)) return null ;

			// si tenemos un resultado, lo devolvemos
			return $this->result->fetchObject($cls) ;
		}

		
		public function getNumRows():int
		{
			return $this->result->rowCount() ; 
		}

		
		//Cuando el objeto se deserializa, conectamos de nuevo con el motor de base de datos.
		
		public function __wakeup()
		{
			$this->connect() ;
		}

	}











