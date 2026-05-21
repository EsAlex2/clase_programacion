<?php 

abstract class Notificacion
{
    protected string $mensaje;

    public function __construct(string $mensaje)
    {
        $this->mensaje = $mensaje;
    }

    abstract public function enviar(): string;
}

class NotificacionEmail extends Notificacion
{
    private string $correoDestino;

    public function __construct(string $mensaje, string $correoDestino)
    {
        parent::__construct($mensaje);
        $this->correoDestino = $correoDestino;
    }

    #[Override]
    public function enviar(): string
    {
        return "Enviando Email a {$this->correoDestino} con el mensaje: {$this->mensaje}";
    }

}

class NotificacionSMS extends Notificacion
{
    private string $numeroTelefono;
    public function __construct(string $mensaje, string $numeroTelefono)
    {
        parent::__construct($mensaje);
        $this->numeroTelefono = $numeroTelefono;
    }

    #[Override]
    public function enviar(): string
    {
        return "Enviando SMS a {$this->numeroTelefono} con el mensaje: {$this->mensaje}";
    }

}

class NotificacionPush extends Notificacion
{
    private string $idDispositivo;

    public function __construct(string $mensaje, string $idDispositivo)
    {
        parent::__construct($mensaje);
        $this->idDispositivo = $idDispositivo;
    }

    public function enviar(): string
    {
        return "Enviando una alerta push a {$this->idDispositivo} con el mensaje: {$this->mensaje}";
    }

}

