<?php 

class Dispositivo {

    protected string $marca;
    protected bool $encendido = false; 


    public function __construct(string $marca = "Genérico") {
        $this->marca = $marca;
    }


    public function encender()
    {       
        $this->encendido = true;
        echo "El dispositivo se ha encendido.<br>";
    }


    public function apagar()
    {   
        $this->encendido = false;
        echo "El dispositivo se ha apagado.<br>";
    }
}

class SmartTV extends Dispositivo {
    
    private int $canalActual = 1;
    private bool $netflixAbierto = false;

    public function abrirNetflix()
    {

        if ($this->encendido) {
            $this->netflixAbierto = true;
            echo "Bienvenido de nuevo a Netflix.<br>";
        } else {

            echo "Advertencia: El televisor está apagado. Enciéndelo primero.<br>";
        }
    }
}


$tv = new SmartTV("Samsung");


echo "--- Intento 1 (Apagado) ---<br>";
$tv->abrirNetflix(); 

echo "<br>--- Intento 2 (Encendiendo...) ---<br>";
$tv->encender();

$tv->abrirNetflix();