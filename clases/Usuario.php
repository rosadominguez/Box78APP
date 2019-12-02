<?php

	// Rosa Mª Domínguez Barrientos
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Usuario
	{
		private $idUsuario ;
		private $nombre ;
        private $apellido1 ;
        private $apellido2 ;
        private $telefono ;
        private $email ;
		private $foto ;
		private $es_admin ;
		private $apiKey ;


		public function __construct() { }

	    public function getIdUsuario()
	    {
	        return $this->idUsuario;
	    }

	    public function setIdUsuario($idUsuario)
	    {
	        $this->idUsuario = $idUsuario;

	        return $this;
	    }

	    public function getEmail()
	    {
	        return $this->email;
	    }

	    public function setEmail($email)
	    {
	        $this->email = $email;

	        return $this;
	    }

	    public function getNombre()
	    {
	        return $this->nombre;
	    }

	    public function setNombre($nombre)
	    {
	        $this->nombre = $nombre;

	        return $this;
	    }

	    public function getApellido1()
	    {
	        return $this->apellido1;
	    }

	    public function setApellido1($apellido1)
	    {
	        $this->apellido1 = $apellido1;

	        return $this;
        }
        
	    public function getApellido2()
	    {
	        return $this->apellido2;
	    }

	    public function setApellido2($apellido2)
	    {
	        $this->apellido2 = $apellido2;

	        return $this;
	    }

	    public function getTelefono()
	    {
	        return $this->telefono;
	    }

	    public function setTelefono($telefono)
	    {
	        $this->telefono = $telefono;

	        return $this;
	    }

	    public function getFoto()
	    {
	        return $this->foto;
	    }

	    public function setFoto($foto)
	    {
	        $this->foto = $foto;

	        return $this;
	    }

	    public function getAdmin()
	    {
	        return $this->admin;
	    }

	    public function setAdmin($admin)
	    {
	        $this->es_admin = $admin;

	        return $this;
		}
		
		public function getApiKey()
	    {
	        return $this->apiKey;
	    }

	    public function setApiKey($apiKey)
	    {
	        $this->apiKey = $apiKey;

	        return $this;
		}
		
	    public function __toString()
	    {
	    	return $this->nombre." ".$this->apellido1." ".$this->apellido2." ".$this->Telefono ;
	    }
	}
	