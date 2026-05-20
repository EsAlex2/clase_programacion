<?php 

abstract class GestorBaseDatos {
    protected string $host;
    protected string $usuario;
    protected string $password;
    protected string $tabla;

    public function __construct(string $host, string $usuario, string $password, string $tabla)
    {
        $this->host = $host; 
        $this->usuario = $usuario; 
        $this->password = $password;
        $this->tabla = $tabla; 
    }

    public function setTabla(string $tabla): void
    {
        $this->tabla = $tabla;
    }


    abstract public function conectar(): string;
    abstract public function consultarTodo(): string;
    abstract public function insertar(string $datos): string;
}

class GestorMySql extends GestorBaseDatos {

    #[Override]
    public function conectar(): string
    {
        return "Se ha establecido una conexión a la Base de Datos con las siguientes credenciales: <br> <p>Host: {$this->host} | Usuario: {$this->usuario} | Pass: {$this->password}</p>";
    }

    #[Override]
    public function consultarTodo(): string
    {

        return "<p>SELECT * FROM {$this->tabla};</p>";
    }

    #[Override]
    public function insertar(string $datos): string
    {
        return "<p>INSERT INTO {$this->tabla} VALUES ($datos);</p>";
    }
}

$sql1 = new GestorMySql('127.0.0.1', 'root', '1234', 'Usuarios');

echo $sql1->conectar() . "<br>";
echo $sql1->consultarTodo() . "<br>";
echo $sql1->insertar("'Alex Madrid', '27391753', 'Dev Junior'") . "<br>";


echo "<strong>Cambiando de tabla...</strong><br>";
$sql1->setTabla('Auditorias');
echo $sql1->consultarTodo();