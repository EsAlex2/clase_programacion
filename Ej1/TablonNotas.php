<?php

class NotaEstudiante
{

    /* /////////////////////////////////////////////////////////////////////
    //
    //      ATRIBUTOS DE NUESTRA CLASE NOTAESTUDIANTE
    //
    *//////////////////////////////////////////////////////////////////////

    private string $nombreEstudiante;
    private string $materia;
    private float $calificacion;

    /* /////////////////////////////////////////////////////////////////////
    //
    //      METODO CONSTRUCTOR DE NUESTRA CLASE NOTAESTUDIANTE
    //
    *//////////////////////////////////////////////////////////////////////

    public function __construct(string $nombreEstudiante, string $materia, float $calificacion)
    {
        $this->nombreEstudiante = $nombreEstudiante;
        $this->materia = $materia;
        $this->setCalificacion($calificacion);
    }

    /* /////////////////////////////////////////////////////////////////////
    //
    //      METODOS GETTERS Y SETTERS DE NUESTRA CLASE NOTAESTUDIANTE
    //
    *//////////////////////////////////////////////////////////////////////


    //GETTERS

    public function getNombreEstudiante(): string
    {
        return $this->nombreEstudiante;
    }

    public function getMateria(): string
    {
        return $this->materia;
    }

    public function getCalificacion(): float
    {
        return $this->calificacion;
    }

    //SETTERS

    public function setNombreEstudiante(string $nombreEstudiante): void
    {
        $this->nombreEstudiante = $nombreEstudiante;
    }

    public function setMateria(string $materia): void
    {
        $this->materia = $materia;
    }

    public function setCalificacion(float $calificacion): void
    {
        if ($calificacion < 0 || $calificacion > 20) {
            
            throw new InvalidArgumentException("La calificación debe estar entre 0 y 20.");
        }

        $this->calificacion = $calificacion;
    }


    /* /////////////////////////////////////////////////////////////////////
    //
    //      METODOS DE NUESTRA CLASE NOTAESTUDIANTE
    //
    *//////////////////////////////////////////////////////////////////////


    public function obtenerEstado(): string
    {
        if ($this->calificacion >= 13) {
            return "Aprobado";
        } else {
            return "Reprobado";
        }
    }


}