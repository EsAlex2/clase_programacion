<?php
include 'relojDigital.php';

$reloj = new Reloj(0, 0, 0); //creamos un objeto reloj con la hora inicial 00:00:00
$horaActual = $reloj->mostrarHora(); // Obtenemos la hora actual para mostrarla en la pantalla
$reloj->ticTac(3600); // Avanzamos los segundos correspondientes a una hora (3600 segundos)
$reloj->ticTac(60 * 59); // Avanzamos 60 segundos para avanzar un minuto
$reloj->ticTac(60); // Avanzamos 59 segundos para avanzar un minuto
$reloj->ticTac(0); // Avanzamos 0 segundos
$reloj->ticTac(60 * 59); // Avanzamos 60 segundos para avanzar un minuto
$reloj->ticTac(59); // Avanzamos 59 segundos para avanzar un minuto

$horaActual = $reloj->mostrarHora(); 


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
            background-color: #000000;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
            background-color: #000000;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(218, 36, 60, 0.67);
        }

        a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header style="position: fixed; top: 10px; width: 100%; text-align: center; color: white;">
        <hr style="border: 1px solid white; margin-bottom: 10px;">
        <p>Ejercicio 1 - Molde Basico (Reloj Digital)</p>
    </header>

    <div class="container">
        <h1 style="color: white;">Reloj Digital</h1>

        <p id="pantalla-reloj" style="font-size: 2em; color: white;">

            <?php
            echo $horaActual; // Mostramos la hora actual en el elemento con id "pantalla-reloj"
            ?>

        </p>
    </div>

    <footer style="position: fixed; bottom: 10px; width: 100%; text-align: center; color: white;">
        <hr style="border: 1px solid white; margin-bottom: 10px;">
        <p>Desarrollado por <a href="https://github.com/EsAlex2/clase_programacion" target="_blank">Alex Madrid</a></p>
        <p>
            Asignatura: Programación II modulo I - Programacion Orientada a Objetos
            <br>
            Docente: Franklin Chacon
            <br>
            Grupo: 3468 (Martes de 5:00 PM a 7:00 PM)
        </p>
    </footer>
</body>

</html>