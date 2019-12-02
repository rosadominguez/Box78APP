<?php

	// Rosa Mª Domínguez Barrientos
	// Desarrollo Web en Entorno Servidor
	// curso 2019/20

	class Pagos
	{
        private $idPago ;
        private $mes ;
        private $anio ;
        private $tarifa ;
        private $fecha ;


		public function __construct() { }


	    public function getIdPago()
	    {
	        return $this->idPago;
	    }

	    public function setIdPago($idPago)
	    {
	        $this->idPago = $idPago;

	        return $this;
	    }

	    public function getMes()
	    {
	        return $this->mes;
	    }

	    public function setMes($mes)
	    {
	        $this->mes = $mes;

	        return $this;
	    }

	    public function getAnio()
	    {
	        return $this->anio;
	    }

	    public function setAnio($anio)
	    {
	        $this->anio = $anio;

	        return $this;
	    }

	    public function getTarifa()
	    {
	        return $this->tarifa;
	    }

	    public function setTarifa($tarifa)
	    {
	        $this->tarifa = $tarifa;

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
	    	return $this->idPago." ".$this->mes." ".$this->anio." ".$this->tarifa." ".$this->fecha ;
	    }
	}
	