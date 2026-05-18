<?php 
    include 'relojDigital.php'; 

    $reloj = new Reloj(0, 0, 0); //creamos un objeto reloj con la hora inicial 00:00:00
    $horaActual = $reloj->mostrarHora(); // Obtenemos la hora actual
    $reloj->ticTac(12);
    // Simulamos el tic tac del reloj cada segundo
    $horaActual = $reloj->mostrarHora(); // Actualizamos la hora actual después de avanzar un segundo
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reloj Digital Local</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Reloj Digital</h1>

        <p id="pantalla-reloj" style="font-size: 2em;">
            
        <?php 

            echo $horaActual; // Mostramos la hora actual en el elemento con id "pantalla-reloj"
        ?>
    
        </p>
    </div>
</body>
</html>