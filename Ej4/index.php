<?php
require_once 'metodoPago.php';

    $metodosDePago = [$pagoMovil, $transferencia, $paypal];
    $montos = [250.00, 600.00, 400.00];
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
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 590px;
            width: 100%;
        }
        h2 {
            color: #333;
            margin-top: 0;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 10px;
        }

        .resultado {
            margin-top: 25px;
            background-color: #e9ecef;
            padding: 15px;
            border-left: 5px solid #28a745;
            border-radius: 4px;
            white-space: pre-line;
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
        
        <?php
           finalizarTransaccion($metodosDePago[0], $montos[0]);

           echo "<br>";

           finalizarTransaccion($metodosDePago[1], $montos[1]);

           echo "<br>";

           finalizarTransaccion($metodosDePago[2], $montos[2]);
        ?>
    
</div>

</body>
</html>