<?php 
    include_once "GestorInventario2.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Inventario 2</title>
    <style>
        /* Estilos Generales y Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 30px;
        }

        /* Título generado por tu método HTML */
        .container h2 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            text-align: center;
        }

        /* Lista de Productos */
        .container ul {
            list-style: none;
            margin-bottom: 25px;
        }

        .container li {
            background-color: #f8f9fa;
            border-left: 4px solid #2ecc71;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 0 8px 8px 0;
            display: flex;
            justify-content: space-between;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .container li:hover {
            transform: translateX(5px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        /* Sección del Total */
        .total-box {
            background-color: #2c3e50;
            color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            text-align: right;
            font-size: 18px;
        }

        .total-box strong {
            color: #2ecc71;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
            $inventario = new Inventario(0, "Inventario Principal", 0.0, 0);

            $producto1 = new Producto(1, "PC Gamer", 999.99, 5);
            $producto2 = new Producto(2, "Iphone 17", 499.99, 20);
            $producto3 = new Producto(3, "Tablet", 299.99, 15);
            $producto4 = new Producto(4, "Nintendo Switch", 1299.99, 8);

            $inventario->agregarProducto($producto1);
            $inventario->agregarProducto($producto2);
            $inventario->agregarProducto($producto3);
            $inventario->agregarProducto($producto4);

            echo $inventario->MostrarLista();

            $valorTotal = $inventario->calcularValorTotal();
            
            echo "<div class='total-box'>";
            echo "<p>Valor Total del Inventario: <strong>$" . number_format($valorTotal, 2) . "</strong></p>";
            echo "</div>";
        ?>
    </div>

</body>
</html>