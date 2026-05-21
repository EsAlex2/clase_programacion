<?php 

class Usuario {

    protected string $username;
    protected string $email;
    private string $password;

    public function __construct(string $username, string $email, string $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function obtenerDatos()
    {   
        if(empty($this->username) || !isset($this->email)){
            return "<span>Credenciales Invalidas!</span>";
        }else{
            
            $obtenerDatos = "<span>Bienvenido al Sistema!, </span> " . $this->username;

            return $obtenerDatos;
        }
    }
}

class Administrador extends Usuario {

    protected array $permisos;

    public function __construct(string $username, string $email, string $password, array $permisos)
    {   
        parent::__construct($username, $email, $password);
        $this->permisos = $permisos;
    }

    public function generarReporte()
    {
        return "Generando reporte con los siguientes permisos: " . implode(", ", $this->permisos) . "<br>" . "Reporte generado exitosamente por: " . $this->username . "<br>" . "Correo de contacto: " . $this->email;
    }
}

$instancia = new Administrador("AdminUser", "alexmadrid326@gmail.com", "123456789", ['crear_usuario', 'editar_usuario', 'eliminar_usuario']);
echo $instancia->generarReporte();
