<?php 

    class Producto{

        /* /////////////////////////////////////////////////////////////////////
        //
        //      ATRIBUTOS DE NUESTRA CLASE NOTAESTUDIANTE
        //
        *//////////////////////////////////////////////////////////////////////

        private int $id;
        private string $nombre;
        private float $precio;
        private int $cantidad;

        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODO CONSTRUCTOR DE NUESTRA CLASE PRODUCTO
        //
        *//////////////////////////////////////////////////////////////////////

        public function __construct(int $id, string $nombre, float $precio, int $cantidad)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->cantidad = $cantidad;
        }

        
        public function getId(): int
        {
            return $this->id;
        }

        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function getPrecio(): float
        {
            return $this->precio;
        }

        public function getCantidad(): int
        {
            return $this->cantidad;
        }
    }