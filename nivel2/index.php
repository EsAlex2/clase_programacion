<?php 
require_once 'GestorInventario.php';    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Inventario</title>
    <style>
        /* --- VARIABLES DE DISEÑO --- */
        :root {
            --bg-body: #f4f6f9;
            --bg-card: #ffffff;
            --text-main: #2d3748;
            --text-muted: #718096;
            --primary: #4a5568;
            --accent-sale: #3182ce;
            --accent-restock: #38a169;
            --danger-bg: #fff5f5;
            --danger-text: #e53e3e;
            --danger-border: #feb2b2;
            --radius: 12px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* --- ESTILOS GENERALES --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
            padding: 40px 20px;
        }

        /* --- CONTENEDOR PRINCIPAL --- */
        .main-wrapper {
            max-width: 800px;
            margin: 0 auto;
        }

        /* --- CABECERA --- */
        .header-container {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 30px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            text-align: center;
        }

        .header-container h2 {
            font-size: 1.8rem;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .header-container p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
        }

        /* --- GRILLA DE OPERACIONES --- */
        .operations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 20px;
        }

        /* --- TARJETAS (CARDS) --- */
        .card {
            background-color: var(--bg-card);
            border-radius: var(--radius);
            padding: 25px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card h3 {
            font-size: 1.2rem;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #edf2f7;
            position: relative;
        }

        /* Indicadores de color para los títulos */
        .card-venta h3 { color: var(--accent-sale); }
        .card-reposicion h3 { color: var(--accent-restock); }

        /* --- MENSAJES DE STOCK Y RESULTADOS --- */
        .stock-output {
            background-color: #f7fafc;
            border-left: 4px solid var(--primary);
            padding: 12px 15px;
            border-radius: 4px;
            margin-top: 15px;
            font-size: 0.95rem;
        }

        .card-venta .stock-output { border-left-color: var(--accent-sale); }
        .card-reposicion .stock-output { border-left-color: var(--accent-restock); }

        .stock-output strong {
            color: var(--text-main);
        }

        .alert-danger {
            background-color: var(--danger-bg);
            color: var(--danger-text);
            border: 1px solid var(--danger-border);
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="main-wrapper">
        <div class="header-container">
            <h2>Gestión de Inventario</h2>
            <p>Panel de control automatizado para flujo de mercancía.</p>
        </div>

        <div class="operations-grid">
            
            <div class="card card-venta">
                <h3>Ejemplo de Venta</h3>
                <?php
                    $producto = new Producto("Laptop", 800.00, 5);
                    
                    $producto->venderProducto(0);

                    echo "<div class='stock-output'>
                            Venta procesada con éxito.<br>
                            <strong>Stock restante de " . $producto->getNombre() . ":</strong> " . $producto->getStock() . " u.
                          </div>";
                ?>
            </div>

            <div class="card card-reposicion">
                <h3>Ejemplo de Reposición</h3>
                <?php
                    // Procesamos la reposición sobre el mismo objeto
                    $producto->reponerProducto(100);
                    
                    // Mostramos el resultado
                    echo "<div class='stock-output'>
                            Reposición procesada con éxito.<br>
                            <strong>Stock nuevo de " . $producto->getNombre() . ":</strong> " . $producto->getStock() . " u.
                          </div>";
                ?>
            </div>

        </div>
    </div>

</body>
</html>