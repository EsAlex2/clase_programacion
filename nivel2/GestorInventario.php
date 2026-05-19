<?php
class Producto
{
    /* /////////////////////////////////////////
        //  Atributos de la clase Producto
        */ /////////////////////////////////

    private string $nombre;
    private float $precio;
    private int $stock = 0;

    ////////////////////////////////////////////

    /* /////////////////////////////////////////
        //  Metodo constructor de la clase Producto
        */ ////////////////////////////////////////

    public function __construct(string $nombre, float $precio, int $stock)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    /* ////////////////////////////////////////////
        //  Metodos para la clase Producto
        */ ////////////////////////////////////////

        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function getPrecio(): float
        {
            return $this->precio;
        }

        public function getStock(): int
        {
            return $this->stock;
        }

    public function venderProducto(int $cantidad): void
    {
        if ($cantidad <= 0) {
            echo "<div class='container mt-4'>
                    <p class='text-danger'>La cantidad a vender debe ser mayor que cero.</p>
                </div>";
            return;
        }

        if ($cantidad > $this->stock) {
            echo "<div class='container mt-4'>
                    <p class='text-danger'>Stock insuficiente para vender $cantidad unidades de $this->nombre.
                    <br>
                    <strong>Stock disponible:</strong> $this->stock</p>
                </div>";
            return;
        }

        $this->stock -= $cantidad;
    }

    public function reponerProducto(int $cantidad): void
    {
        if ($cantidad <= 0) {
            echo "<div class='container mt-4'>
                    <p class='text-danger'>La cantidad a reponer debe ser mayor que cero.</p>
                </div>";
            return;
        }

        $this->stock += $cantidad;
        
    }
}
