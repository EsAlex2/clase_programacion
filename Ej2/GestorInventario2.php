<?php 
    
    include "GestorProductos.php";
    class Inventario extends Producto
    {
        /* /////////////////////////////////////////////////////////////////////
        //
        //      ATRIBUTOS DE NUESTRA CLASE INVENTARIO
        //
        *//////////////////////////////////////////////////////////////////////
        private array $productos = [];

        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODO CONSTRUCTOR DE NUESTRA CLASE INVENTARIO
        //
        *//////////////////////////////////////////////////////////////////////
        
        public function __construct(int $id, string $nombre, float $precio, int $cantidad)
        {
            parent::__construct($id, $nombre, $precio, $cantidad);
            $this->productos = [];
        }   
        

        /* /////////////////////////////////////////////////////////////////////
        //
        //      METODOS DE NUESTRA CLASE INVENTARIO
        //
        *//////////////////////////////////////////////////////////////////////

        public function agregarProducto(Producto $producto): void
        {
            $this->productos[] = $producto;
        }

        public function calcularValorTotal(): float
        {
            $total = 0;
            foreach ($this->productos as $producto) {
                $total += $producto->getPrecio() * $producto->getCantidad();
            }
            return $total;
        }

        public function MostrarLista(): string
        {
            $html = "<h2>Lista de Productos en el Inventario</h2><ul>";
            foreach ($this->productos as $producto) {
                $html .= "<li>{$producto->getNombre()} - Precio: $" . number_format($producto->getPrecio(), 2) . " - Cantidad: {$producto->getCantidad()}</li>";
            }
            $html .= "</ul>";
            return $html;
        }


    }