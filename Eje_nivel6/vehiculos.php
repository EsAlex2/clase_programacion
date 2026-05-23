<?php

// 1. CLASE BASE
class Vehiculo {
    public string $marca;
    public int $modelo; // Representa el año
    public float $precioBase;

    public function __construct(string $marca, int $modelo, float $precioBase) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->precioBase = $precioBase;
    }

    // Método base: 5% del precio base
    public function calcularImpuesto(): float {
        return $this->precioBase * 0.05;
    }
}

// 2. CLASES HIJAS (SOBRESCRITURA Y POLIMORFISMO)

class Auto extends Vehiculo {
    public function calcularImpuesto(): float {
        // Se calcula el impuesto base (5%)
        $impuesto = parent::calcularImpuesto();
        
        // Si el año es menor a 2010, se aplica un 10% de descuento al impuesto
        if ($this->modelo < 2010) {
            $impuesto -= ($impuesto * 0.10);
        }
        
        return $impuesto;
    }
}

class Camion extends Vehiculo {
    public float $capacidadToneladas;

    // Sobrescribimos el constructor para añadir la nueva propiedad del camión
    public function __construct(string $marca, int $modelo, float $precioBase, float $capacidadToneladas) {
        parent::__construct($marca, $modelo, $precioBase);
        $this->capacidadToneladas = $capacidadToneladas;
    }

    public function calcularImpuesto(): float {
        // 8% del precio base + $50 por cada tonelada
        return ($this->precioBase * 0.08) + ($this->capacidadToneladas * 50);
    }
}

class MotoElectrica extends Vehiculo {
    public function calcularImpuesto(): float {
        // Tarifa ecológica fija de $10
        return 10.0;
    }
}

// 3. LA PRUEBA DEL POLIMORFISMO
// Esta función acepta CUALQUIER objeto que sea o herede de Vehiculo
function imprimirRecibo(Vehiculo $v) {
    echo "-------------------------------------------\n";
    echo "RECEPCIÓN DE IMPUESTO - VEHÍCULO\n";
    echo "Marca: " . $v->marca . "\n";
    echo "Modelo (Año): " . $v->modelo . "\n";
    // Aquí ocurre la magia del polimorfismo: PHP sabe dinámicamente qué método ejecutar
    echo "Impuesto a pagar: $" . number_format($v->calcularImpuesto(), 2) . "\n";
    echo "-------------------------------------------\n\n";
}

// --- EJECUCIÓN Y PRUEBAS ---

// Creamos los diferentes objetos
$autoClasico = new Auto("Ford", 2008, 15000); 
$autoModerno = new Auto("Toyota", 2022, 25000);
$camionPesado = new Camion("Volvo", 2018, 80000, 12); // 12 toneladas
$motoEco = new MotoElectrica("Tesla", 2025, 8000);

// Enviamos todos los objetos a la MISMA función
imprimirRecibo($autoClasico);
imprimirRecibo($autoModerno);
imprimirRecibo($camionPesado);
imprimirRecibo($motoEco);

?>