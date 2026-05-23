<?php

// 1. Definición de la Clase Abstracta
abstract class DispositivoInteligente {
    protected string $nombre;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    // Método abstracto que obliga a las clases hijas a implementarlo
    abstract public function ejecutarModoNoche(): void;
}

// ==========================================
// 2. Implementación de las Clases Hijas
// ==========================================

class Lampara extends DispositivoInteligente {
    public function ejecutarModoNoche(): void {
        echo "[{$this->nombre}]: Cambiando estado a 'Luz tenue al 10%'.\n";
    }
}

class CerraduraElectronica extends DispositivoInteligente {
    public function ejecutarModoNoche(): void {
        echo "[{$this->nombre}]: Activando el 'Cerrojo de alta seguridad pasón 2'.\n";
    }
}

class AireAcondicionado extends DispositivoInteligente {
    public function ejecutarModoNoche(): void {
        echo "[{$this->nombre}]: Configurado en 'Modo Eco a 24°C' y programado apagado en 4 horas.\n";
    }
}

// ==========================================
// 3. Clase de Control Central (Polimorfismo)
// ==========================================

class ControlCentral {
    /** @var DispositivoInteligente[] */
    private array $dispositivos = [];

    // Método para agregar cualquier dispositivo que herede de DispositivoInteligente
    public function agregarDispositivo(DispositivoInteligente $dispositivo): void {
        $this->dispositivos[] = $dispositivo;
    }

    // El método solicitado para recorrer y activar el Modo Noche de forma masiva
    public function botonApagarTodo(): void {
        echo "--- Activando el 'Modo Noche' desde el Control Central ---\n";
        
        foreach ($this->dispositivos as $dispositivo) {
            // PHP sabe exactamente qué método ejecutar gracias al polimorfismo
            $dispositivo->ejecutarModoNoche();
        }
        
        echo "---------------------------------------------------------\n";
    }
}

// ==========================================
// 4. Prueba del Sistema
// ==========================================

// Creamos las instancias de nuestros dispositivos
$lamparaSalon = new Lampara("Lámpara del Salón");
$cerraduraPrincipal = new CerraduraElectronica("Cerradura Puerta Principal");
$aireHabitacion = new AireAcondicionado("Aire Acondicionado Recámara");

// Instanciamos el control central y registramos los dispositivos
$control = new ControlCentral();
$control->agregarDispositivo($lamparaSalon);
$control->agregarDispositivo($cerraduraPrincipal);
$control->agregarDispositivo($aireHabitacion);

// Simulamos que el usuario presiona el botón al irse a dormir
$control->botonApagarTodo();