<?php

	// Rosa Mª Domínguez Barrientos
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Wod
	{
		private $idWod;
		private $tipoWod ;
        private $wod ;
        private $fecWod ;

		
		public function __construct() { }

	    public function getIdWod()
	    {
	        return $this->idWod;
	    }

	    
	    public function setIdWod($idWod)
	    {
	        $this->idWod = $idWod;

	        return $this;
	    }

	    public function getTipoWod()
	    {
	        return $this->tipoWod;
	    }

	    public function setTipoWod($tipoWod)
	    {
	        $this->tipoWod = $tipoWod;

	        return $this;
	    }


        public function getWod()
	    {
	        return $this->wod;
	    }


	    public function setWod($wod)
	    {
	        $this->wod = $wod;

	        return $this;
	    }


	    public function getFecWod()
	    {
	        return $this->fecWod;
	    }

	    public function setFecWod($fecWod)
	    {
	        $this->fecWod = $fecWod;

	        return $this;
        }
        

	    public function __toString()
	    {
	    	return $this->tipoWod." ".$this->wod." ".$this->fecWod ;
	    }
	}