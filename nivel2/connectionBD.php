<?php 
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'inventario');
    define('PORT', '3306');

    class ConnectionBD {
        private $connection;

        public function __construct() {
            $this->connection = new mysqli(HOST, USER, PASS, DB, PORT);
            if ($this->connection->connect_error) {
                die("Error de conexión: " . $this->connection->connect_error);
            }else{
                echo "Conexión exitosa a la base de datos.";
            }
        }

        public function getConnection() {
            return $this->connection;
        }

        public function closeConnection() {
            $this->connection->close();
        }
    }

    
?>