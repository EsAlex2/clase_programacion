<?php 
require_once 'medio.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Medios</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
        }

        .catalogo-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1000px;
            width: 100%;
        }

        .card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 25px;
            width: 300px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-top: 5px solid #3498db; /* Color para libros */
        }

        .card.pelicula {
            border-top-color: #e74c3c;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .card h4 {
            font-size: 1.4rem;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .card em {
            font-style: italic;
        }

        .card strong {
            color: #555;
            display: block;
            margin-top: 8px;
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            font-size: 0.75rem;
            text-transform: uppercase;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
        }
        .badge.libro-bg { background-color: #3498db; }
        .badge.pelicula-bg { background-color: #e74c3c; }
    </style>
</head>
<body>

    <h1>Mi Catálogo de Medios</h1>

    <div class="catalogo-container">
        
        <div class="card libro">
            <span class="badge libro-bg">Libro</span>
            <?php echo $libro->obtenerResumen(); ?>
        </div>

        <div class="card pelicula">
            <span class="badge pelicula-bg">Película</span>
            <?php echo $pelicula->obtenerResumen(); ?>
        </div>

    </div>

</body>
</html>