<?php

	// Rosa Mª Domínguez Barrientos
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Horario
	{
		private $idHorario ;
		private $diaSemana ;
		private $hora ;
        private $monitor ;
        private $tipClase ;

		
		public function __construct() { }

	    public function getIdHorario()
	    {
	        return $this->idHorario;
	    }

	    
	    public function setIdHorario($idHorario)
	    {
	        $this->idHorario = $idHorario;

	        return $this;
		}
		
		public function getDiaSemana()
	    {
	        return $this->diaSemana;
	    }

	    public function setDiaSemana($diaSemana)
	    {
	        $this->diaSemana = $diaSemana;

	        return $this;
	    }

	    public function getHora()
	    {
	        return $this->hora;
	    }

	    public function setHora($hora)
	    {
	        $this->hora = $hora;

	        return $this;
	    }


        public function getMonitor()
	    {
	        return $this->monitor;
	    }


	    public function setMonitor($monitor)
	    {
	        $this->monitor = $monitor;

	        return $this;
	    }


	    public function getTipClase()
	    {
	        return $this->tipClase;
	    }

	    public function setTipClase($tipClase)
	    {
	        $this->tipClase = $tipClase;

	        return $this;
        }
        

	    public function __toString()
	    {
	    	return $this->hora." ".$this->monitor." ".$this->tipClase ;
	    }
	}
	