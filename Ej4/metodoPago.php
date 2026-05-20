<?php

interface MetodoPago {
    public function procesarPago(string $monto);
}


class PagoMovil implements MetodoPago {
    public function procesarPago(string $monto) {
        echo "Procesando pago de $$monto mediante <span style='color: red'>Pago Móvil</span>... <br> <span>[Verificando teléfono y CI]</span>\n" . "<br>";
    }
}

class Transferencia implements MetodoPago {
    public function procesarPago(string $monto) {
        echo "Procesando pago de $$monto mediante <span style='color: red'>Transferencia Bancaria</span>... <br> <span>[Esperando confirmación de fondos]</span>\n" . "<br>";
    }
}

class PayPal implements MetodoPago {
    public function procesarPago(string $monto) {
        echo "Procesando pago de $$monto mediante <span style='color: red'>PayPal</span>... <br> <span>[Conectando con la API segura]</span>\n" . "<br>";
    }
}

function finalizarTransaccion(MetodoPago $metodo, string $monto) {
    echo "<span style='color: #000000'>Iniciando transacción...</span>\n" . "<br>";

    $metodo->procesarPago($monto);
    echo "<span style='color: #219652'>Transacción finalizada con éxito.</span>\n" . "<br>";
    echo "-------------------------------------------\n";
}


$pagoMovil = new PagoMovil();
$transferencia = new Transferencia();
$paypal = new PayPal();
