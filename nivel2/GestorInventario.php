<?php 
    require_once 'connectionBD.php';
    class Producto {
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

        /* /////////////////////////////////////////
        //  Metodos para la clase Producto
        */ ////////////////////////////////////////

        public function venderProducto(int $cantidad): void
        {

            if ($cantidad > $this->stock) {

                echo "";

                return;
            }

            $connectionBd = new ConnectionBD();
            $connection = $connectionBd->getConnection();

            $sql = "UPDATE productos SET stock = stock - $cantidad WHERE nombre = '$this->nombre'";
            $connection->query($sql);
            $connectionBd->closeConnection();
        }

    }
?>