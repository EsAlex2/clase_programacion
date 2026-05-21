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
        return $this->tamaño . " " .  $this->nombre;
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
    private string $resolucion; 
    public function __construct(string $nombre, string $tamaño, string $extension, string $resolucion)
    {
        parent::__construct($nombre, $tamaño, $extension);
        $this->resolucion = $resolucion;
    }

    public function detalles(): string
    {
        return parent::detalles() . " " . $this->resolucion;
    }
}
