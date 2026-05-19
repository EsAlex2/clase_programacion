<?php 
    include_once 'Personal.php';
    class Administrativo extends Personal {

        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODOS DE NUESTRA CLASE ADMINISTRATIVO
        //
        *//////////////////////////////////////////////////////////////////////
        private float $bonoRendimiento; // Bono adicional para el administrativo

        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODO CONSTRUCTOR DE NUESTRA CLASE ADMINISTRATIVO
        //
        *//////////////////////////////////////////////////////////////////////

        public function __construct(string $nombre, string $cedula, float $salarioBase, float $bono)
        {
            parent::__construct($nombre, $cedula, $salarioBase);
            $this->bonoRendimiento = $bono;
        }

        /* /////////////////////////////////////////////////////////////////////
        //     
        //      METODO GETTERS Y SETTERS NUESTRA CLASE ADMINISTRATIVO
        //
        *///////////////////////////////////////////////////////////////////////

        // GETTERS
        public function getBono(): float
        {
            return $this->bonoRendimiento;
        }

        // SETTERS
        public function setBono(float $bono): void
        {
            $this->bonoRendimiento = $bono;
        }

        public function calcularSalario(): float
        {
            return $this->getSalarioBase() + $this->bonoRendimiento;
        }
    }
