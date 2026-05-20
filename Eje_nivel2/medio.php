<?php

class Medio
{

    private string $titulo;
    private int $añoPublicacion;

    public function __construct(string $titulo, int $añoPublicacion)
    {
        $this->titulo = $titulo;
        $this->añoPublicacion = $añoPublicacion;
    }

    public function obtenerResumen()
    {
        return "<h4><em>{$this->titulo}</em> <strong>{$this->añoPublicacion}</strong></h4>";
    }

}

class Libro extends Medio
{

    private string $autor;
    private int $numeroPaginas;

    public function __construct(string $titulo, int $añoPublicacion, string $autor, int $numeroPaginas)
    {
        parent::__construct($titulo, $añoPublicacion);
        $this->autor = $autor;
        $this->numeroPaginas = $numeroPaginas;
    }

    #[Override]
    public function obtenerResumen()
    {
        return parent::obtenerResumen() . "<strong>{$this->autor}</strong> pp.{$this->numeroPaginas}"; 
    }
}

class Pelicula extends Medio
{
    private string $director;
    private float $duracion;

    public function __construct(string $titulo, int $añoPublicacion, string $director, float $duracion)
    {
        parent::__construct($titulo, $añoPublicacion);
        $this->director = $director;
        $this->duracion = $duracion;
    }

    #[Override]
    public function obtenerResumen()
    {
        return parent::obtenerResumen() . "<strong>{$this->director}</strong> Hrs. {$this->duracion}"; 
    }
}

$libro = new Libro("Juego de Tronos", 1996, "George R. R. Martin", 800);


$pelicula = new Pelicula("Game of Thrones", 2011, "David Benioff y D. B. Weiss", 1.5);