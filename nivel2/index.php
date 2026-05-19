<?php 
require_once 'GestorInventario.php';    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Inventario</title>
</head>
<body>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .text-danger {
            color: #dc3545;
        }
    </style>

    <div class="container mt-4">
        <h2>Gestión de Inventario</h2>
        <p>Bienvenido al sistema de gestión de inventario. Aquí puedes vender y reponer productos.</p>
    </div>

    <div class="container mt-4">

    <div class="container mt-4">
        <h3>Ejemplo de Venta</h3>
        <?php
            $producto = new Producto("Laptop", 800.00, 5);
            $producto->venderProducto(2);

            echo "<p>Stock restante de " . $producto->getNombre() . ": " . $producto->getStock() . "</p>";
        ?>

    </div>

    <div class="container mt-4">
        <h3>Ejemplo de Reposición</h3>
        <?php

            $producto->reponerProducto(15);
            echo "<p>Stock después de reposición de " . $producto->getNombre() . ": " . $producto->getStock() . "</p>";
        ?>
    </div>
</body>
</html>