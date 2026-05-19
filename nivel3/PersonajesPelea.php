<?php 

class Personajes
{
    private string $nombre;
    private int $puntosVida;
    private int $puntosAtaque;

    public function __construct(string $nombre, int $puntosVida, int $puntosAtaque)
    {
        $this->nombre = $nombre;
        $this->puntosVida = $puntosVida;
        $this->puntosAtaque = $puntosAtaque;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getPuntosVida(): int
    {
        return $this->puntosVida;
    }
    
    public function getPuntosAtaque(): int
    {
        return $this->puntosAtaque;
    }

    public function recibirDanio(int $danio): void
    {
        $this->puntosVida -= $danio;
        if ($this->puntosVida <= 0) {
            $this->puntosVida = 0;
        }
    }

    public function atacar(Personajes $objetivo): void
    {
        $objetivo->recibirDanio($this->puntosAtaque);
    }
}