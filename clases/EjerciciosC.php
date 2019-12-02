<?php

	// Rosa Mª Domínguez Barrientos
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Ejercicios
	{
		private $idEjercicio ;
		private $nomEjercicio ;
        private $desEjercicio ;
        private $demEjercicio ;

		
		public function __construct() { }

	    public function getIdEjercicio()
	    {
	        return $this->idEjercicio;
	    }

	    
	    public function setIdEjercicio($idEjercicio)
	    {
	        $this->idEjercicio = $idEjercicio;

	        return $this;
	    }

	    public function getNomEjercicio()
	    {
	        return $this->nomEjercicio;
	    }

	    public function setNomEjercicio($nomEjercicio)
	    {
	        $this->nomEjercicio = $nomEjercicio;

	        return $this;
	    }


        public function getDesEjercicio()
	    {
	        return $this->desEjercicio;
	    }


	    public function setDesEjercicio($desEjercicio)
	    {
	        $this->desEjercicio = $desEjercicio;

	        return $this;
	    }


	    public function getDemEjercicio()
	    {
	        return $this->demEjercicio;
	    }

	    public function setDemEjercicio($demEjercicio)
	    {
	        $this->demEjercicio = $demEjercicio;

	        return $this;
        }
        

	    public function __toString()
	    {
	    	return $this->nomEjercicio." ".$this->desEjercicio." ".$this->demEjercicio ;
	    }
	}
	