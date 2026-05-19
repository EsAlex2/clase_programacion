<?php
require_once 'metodoPago.php';

$mensajeResultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $monto = isset($_POST['monto']) ? $_POST['monto'] : "";
    $metodoSeleccionado = isset($_POST['metodo_pago']) ? $_POST['metodo_pago'] : "";

    if (!empty($monto) && is_numeric($monto) && $monto > 0) {
        
        switch ($metodoSeleccionado) {
            case 'pagomovil':
                $objetoPago = new PagoMovil();
                break;
            case 'transferencia':
                $objetoPago = new Transferencia();
                break;
            case 'paypal':
                $objetoPago = new PayPal();
                break;
            default:
                $objetoPago = null;
                break;
        }

        if ($objetoPago !== null) {
            ob_start();
            finalizarTransaccion($objetoPago, $monto);
            $mensajeResultado = ob_get_clean();
        } else {
            $mensajeResultado = "<span class='error'>Por favor, selecciona un método de pago válido.</span>";
        }
    } else {
        $mensajeResultado = "<span class='error'>Por favor, introduce un monto numérico válido mayor a 0.</span>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesador de Pagos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
        }
        h2 {
            color: #333;
            margin-top: 0;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="number"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #0056b3;
        }
        .resultado {
            margin-top: 25px;
            background-color: #e9ecef;
            padding: 15px;
            border-left: 5px solid #28a745;
            border-radius: 4px;
            white-space: pre-line; /* Mantiene los saltos de línea (\n) del código original */
            font-family: monospace;
            color: #333;
        }
        .error {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pasarela de Pago</h2>
    
    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="monto">Monto a pagar ($):</label>
            <input type="number" id="monto" name="monto" step="0.01" min="0.01" placeholder="Ej: 150.00" required>
        </div>

        <div class="form-group">
            <label for="metodo_pago">Método de Pago:</label>
            <select id="metodo_pago" name="metodo_pago" required>
                <option value="">-- Selecciona una opción --</option>
                <option value="pagomovil">Pago Móvil</option>
                <option value="transferencia">Transferencia Bancaria</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>

        <button type="submit">Procesar Transacción</button>
    </form>

    <?php if (!empty($mensajeResultado)): ?>
        <div class="resultado">
            <?php echo $mensajeResultado; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>