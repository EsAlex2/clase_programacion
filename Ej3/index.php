<?php
include_once 'Personal.php';
include_once 'Profesor.php';
include_once 'Administrativo.php';

$nombres = ["Alex Madrid", "Maria Gomez", "Juan Perez"];
$cedulas = ["27391753", "15715208", "14261656"];
$salariosBase = [240.00, 300.00, 280.00];

$personalObrero = new Personal($nombres[0], $cedulas[0], $salariosBase[0]);
$personalDocente = new Profesor($nombres[1], $cedulas[1], $salariosBase[1], 5);
$personalAdministrativo = new Administrativo($nombres[2], $cedulas[2], $salariosBase[2], 100.00);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Inventario 2</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>

</head>

<body>

    <header>
        <div class="header-content">
            <h1>Sistema de Nomina Escolar</h1>
            <p>Ejemplo de herencia en PHP con clases Personal, Profesor y Administrativo.</p>
        </div>
    </header>

    <main>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <th>Salario Base</th>
                        <th>Salario Total</th>
                    </tr>
                </thead>
                <?php
                $personalList = [$personalObrero, $personalDocente, $personalAdministrativo];
                foreach ($personalList as $personal) {
                    echo "<tr>";
                    echo "<td>" . $personal->getNombre() . "</td>";
                    echo "<td>" . $personal->getCedula() . "</td>";
                    echo "<td>$" . number_format($personal->getSalarioBase(), 2) . "</td>";
                    echo "<td>$" . number_format($personal->calcularSalario(), 2) . "</td>";
                    echo "</tr>";
                }
                ?>

            </table>
        </div>
    </main>

</body>

</html>