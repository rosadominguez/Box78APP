<?php

	// Rosa Mª Domínguez Barrientos
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Peso
	{
		private $peso ;
		private $fecha ;


		/**
		 */
		public function __construct() { }

	    public function getPeso()
	    {
	        return $this->peso;
	    }


	    public function setPeso($peso)
	    {
	        $this->peso = $peso;

	        return $this;
		}

	    public function getFecha()
	    {
	        return $this->fecha;
	    }


	    public function setFecha($fecha)
	    {
	        $this->fecha = $fecha;

	        return $this;
	    }


	    public function __toString()
	    {
	    	return $this->peso." ".$this->fecha ;
	    }
	}
	