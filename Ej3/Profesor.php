<?php 
    include_once 'Personal.php';
    class Profesor extends Personal {

        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODOS DE NUESTRA CLASE PROFESOR
        //
        *//////////////////////////////////////////////////////////////////////
        private float $horasExtras; // Horas extras trabajadas por el profesor

        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODO CONSTRUCTOR DE NUESTRA CLASE PROFESOR
        //
        *//////////////////////////////////////////////////////////////////////

        public function __construct(string $nombre, string $cedula, float $salarioBase, float $horasExtras)
        {
            parent::__construct($nombre, $cedula, $salarioBase);
            $this->horasExtras = $horasExtras;
        }

        /* /////////////////////////////////////////////////////////////////////
        //     
        //      METODO GETTERS Y SETTERS NUESTRA CLASE PROFESOR
        //
        *///////////////////////////////////////////////////////////////////////

        // GETTERS
        public function getHorasExtras(): float
        {
            return $this->horasExtras;
        }

        // SETTERS
        public function setHorasExtras(float $horasExtras): void
        {
            $this->horasExtras = $horasExtras;
        }

        public function calcularSalario(): float
        {
            $salarioBase = $this->getSalarioBase();
            $salarioTotal = $salarioBase + ($this->horasExtras * 10);
            return $salarioTotal;
        }
    }