<?php

require_once "TablonNotas.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablón de Notas</title>
    <style>
        :root {
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --primary: #4f46e5;
            --primary-light: #e0e7ff;
            --border-color: #e2e8f0;
            --radius: 10px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);


            --success-bg: #dcfce7;
            --success-text: #15803d;
            --danger-bg: #fee2e2;
            --danger-text: #b91c1c;
        }


        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        /* --- CONTENEDOR PRINCIPAL --- */
        .container {
            width: 100%;
            max-width: 800px;
            background-color: var(--bg-card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 30px;
            border: 1px solid var(--border-color);
        }

        /* --- CABECERA --- */
        header {
            margin-bottom: 25px;
            text-align: center;
        }

        header h1 {
            font-size: 1.8rem;
            color: var(--text-main);
            position: relative;
            display: inline-block;
            padding-bottom: 8px;
        }

        header h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 25%;
            width: 50%;
            height: 3px;
            background-color: var(--primary);
            border-radius: 2px;
        }

        /* --- DISEÑO DE LA TABLA --- */
        .table-responsive {
            overflow-x: auto;
            /* Permite scroll horizontal en móviles si la tabla es muy grande */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            text-align: left;
            font-size: 0.95rem;
        }

        /* Cabecera de la tabla */
        th {
            background-color: #f1f5f9;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            padding: 14px 16px;
            border-bottom: 2px solid var(--border-color);
        }

        /* Celdas del cuerpo */
        td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-main);
        }

        /* Efecto hover en las filas */
        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Estilo especial para la columna del Nombre (Negrita sutil) */
        td:first-child {
            font-weight: 500;
        }

        /* Estilo para la columna de Calificación */
        td:nth-child(3) {
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            color: var(--primary);
        }

        /* --- ESTILOS DINÁMICOS PARA EL ESTADO --- */

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
        }

        .aprobado {
            background-color: var(--success-bg);
            color: var(--success-text);
        }

        .reprobado {
            background-color: var(--danger-bg);
            color: var(--danger-text);
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Tablón de Notas</h1>
        </header>

        <main>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre del Estudiante</th>
                            <th>Materia</th>
                            <th>Calificación</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $notas = [];

                        try {   
                            $nota1 = new NotaEstudiante("Juan Perez", "Matemáticas", 15);
                            $nota1->setCalificacion(21);
                        } catch (InvalidArgumentException $e) {
                            $nota1 = new NotaEstudiante("Juan Perez", "Matemáticas", 0);
                            $notas[] = $nota1;
                            echo "<div class='alert alert-danger'>❌ <strong>Error de actualización:</strong> " . $e->getMessage() . " Nota de " . $nota1->getNombreEstudiante() . " se mantiene en 0.</div>";
                        }

                        $nota2 = new NotaEstudiante("María Gómez", "Historia", rand(0.00, 10.00));
                        $nota3 = new NotaEstudiante("Carlos Sánchez", "Ciencias", rand(0.00, 10.00));
                        $notas[] = $nota2;
                        $notas[] = $nota3;


                        $notas = [$nota1, $nota2, $nota3];

                        foreach ($notas as $nota) {

                            $estado = $nota->obtenerEstado();
                            $claseEstado = (strtolower($estado) === 'aprobado') ? 'aprobado' : 'reprobado';

                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($nota->getNombreEstudiante()) . "</td>";
                            echo "<td>" . htmlspecialchars($nota->getMateria()) . "</td>";
                            echo "<td>" . number_format($nota->getCalificacion(), 2) . "</td>";
                            echo "<td><span class='status-badge {$claseEstado}'>" . htmlspecialchars($estado) . "</span></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>

</html>