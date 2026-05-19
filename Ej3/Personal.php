<?php 

    class Personal
    {
        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODOS DE NUESTRA CLASE PERSONAL
        //
        *//////////////////////////////////////////////////////////////////////

        private string $nombre;
        private string $cedula; 
        private float $salarioBase; 

        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODO CONSTRUCTOR DE NUESTRA CLASE PERSONAL
        //
        *//////////////////////////////////////////////////////////////////////

        public function __construct(string $nombre, string $cedula, float $salarioBase)
        {
            $this->nombre = $nombre;
            $this->cedula = $cedula;
            $this->salarioBase = $salarioBase;
        }

        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODO GETTERS Y SETTERS NUESTRA CLASE PERSONAL
        //
        *///////////////////////////////////////////////////////////////////////

        // GETTERS

        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function getCedula(): string
        {
            return $this->cedula;
        }
        public function getSalarioBase(): float
        {
            return $this->salarioBase;
        }

        // SETTERS
        public function setNombre(string $nombre): void
        {
            $this->nombre = $nombre;
        }

        public function setCedula(string $cedula): void
        {
            $this->cedula = $cedula;
        }

        public function setSalarioBase(float $salarioBase): void
        {
            $this->salarioBase = $salarioBase;
        }

        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODOS DE NUESTRA CLASE PERSONAL
        //
        *///////////////////////////////////////////////////////////////////////

        public function calcularSalario(): float
        {
            return $this->salarioBase;
        }
    }
