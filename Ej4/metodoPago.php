<?php

// 1. Definición de la Interfaz
interface MetodoPago {
    public function procesarPago(string $monto);
}

// 2. Implementación de las Clases

class PagoMovil implements MetodoPago {
    public function procesarPago(string $monto) {
        echo "Procesando pago de $$monto mediante Pago Móvil... [Verificando teléfono y CI]\n";
    }
}

class Transferencia implements MetodoPago {
    public function procesarPago(string $monto) {
        echo "Procesando pago de $$monto mediante Transferencia Bancaria... [Esperando confirmación de fondos]\n";
    }
}

class PayPal implements MetodoPago {
    public function procesarPago(string $monto) {
        echo "Procesando pago de $$monto mediante PayPal... [Conectando con la API segura]\n";
    }
}

// 3. Función Externa (Polimorfismo en acción)
function finalizarTransaccion(MetodoPago $metodo, string $monto) {
    echo "Iniciando transacción...\n";
    // No importa qué clase sea, sabemos con certeza que tiene este método
    $metodo->procesarPago($monto);
    echo "Transacción finalizada con éxito.\n";
    echo "-------------------------------------------\n";
}

// 4. Pruebas de ejecución

// Instanciamos los diferentes métodos de pago
$pagoMovil = new PagoMovil();
$transferencia = new Transferencia();
$paypal = new PayPal();

// Monto simulado para la inscripción o compra
$montoTotal = 150;
