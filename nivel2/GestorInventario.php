<?php
class Producto
{
    private string $nombre;
    private float $precio;
    private int $stock = 0;

    public function __construct(string $nombre, float $precio, int $stock)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

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
            echo "<div class='alert alert-danger'>
                    <strong>Error:</strong> La cantidad a vender debe ser mayor que cero.
                  </div>";
            return;
        }

        if ($cantidad > $this->stock) {
            echo "<div class='alert alert-danger'>
                    <strong>Stock insuficiente</strong> para vender $cantidad unidades de <em>$this->nombre</em>.<br>
                    <span>Stock disponible: $this->stock</span>
                  </div>";
            return;
        }

        $this->stock -= $cantidad;
    }

    public function reponerProducto(int $cantidad): void
    {
        if ($cantidad <= 0) {
            echo "<div class='alert alert-danger'>
                    <strong>Error:</strong> La cantidad a reponer debe ser mayor que cero.
                  </div>";
            return;
        }

        $this->stock += $cantidad;
    }
}