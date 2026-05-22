<?php 

class componenteBase 
{
    private string $nombre; 
    private string $tamaño;

    public function __construct(string $nombre, string $tamaño)
    {
        $this->nombre = $nombre;
        $this->tamaño = $tamaño;
    }

    public function detalles(): string
    {
        return $this->tamaño . "Kb" . " " .  $this->nombre;
    }
}

class Archivo extends componenteBase 
{   
    private string $extension; 
    public function __construct(string $nombre, string $tamaño, string $extension)
    {
        parent::__construct($nombre, $tamaño);
        $this->extension = $extension;
    }

    public function detalles(): string
    {
        return parent::detalles() . $this->extension;
    }
}

class ArchivoImagen extends Archivo 
{
    private int $ancho; 
    private int $largo;
    public function __construct(string $nombre, string $tamaño, string $extension, int $ancho, int $largo)
    {
        parent::__construct($nombre, $tamaño, $extension);
        $this->ancho = $ancho;
        $this->largo = $largo;
    }

    public function detalles(): string
    {
        return parent::detalles() . " " . $this->ancho ."x". $this->largo ."px";
    }
}

echo "--- Probando el Sistema de Archivos ---\n\n" . "<br><br>";

$miFoto = new ArchivoImagen("vacaciones_2026", 2400, ".jpg", 1920, 1080);
echo $miFoto->detalles(); 

