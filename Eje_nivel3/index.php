<?php 
include_once 'notificacion.php'; 

$notificaciones = [
    new NotificacionEmail("¡Hola, este es un correo electrónico de prueba!", "alexmadrid326@gmail.com"),
    new NotificacionSMS("¡Hola, este es un mensaje de texto SMS!", "04143770143"),
    new NotificacionPush("¡Hola, esta es una alerta push del sistema!", "SAM-A16")
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Notificaciones</title>
    <style>
        :root {
            --bg-color: #f4f6f9;
            --card-bg: #ffffff;
            --text-color: #333333;
            --text-muted: #666666;
            --primary: #4a90e2;
            
            --color-email: #ff9f43;
            --color-sms: #10ac84;
            --color-push: #5f27cd;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-bottom: 30px;
            font-weight: 600;
            color: #2c3e50;
            text-align: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            max-width: 1200px;
            width: 100%;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            padding: 24px;
            width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            border-top: 5px solid var(--primary);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .card.notificacionemail { border-top-color: var(--color-email); }
        .card.notificacionsms { border-top-color: var(--color-sms); }
        .card.notificacionpush { border-top-color: var(--color-push); }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: bold;
            color: #fff;
            margin-bottom: 15px;
        }

        .notificacionemail .badge { background-color: var(--color-email); }
        .notificacionsms .badge { background-color: var(--color-sms); }
        .notificacionpush .badge { background-color: var(--color-push); }

        .card h3 {
            margin: 0 0 10px 0;
            font-size: 1.1rem;
            color: #2c3e50;
        }

        .card p {
            margin: 0;
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.5;
        }
    </style>
</head>
<body>

    <h1>Panel de Envío de Notificaciones</h1>

    <div class="container">
        <?php foreach ($notificaciones as $item): ?>
            <?php 
                $claseTipo = strtolower(get_class($item)); 

                $label = str_replace('notificacion', '', $claseTipo);
            ?>
            
            <div class="card <?php echo $claseTipo; ?>">
                <span class="badge"><?php echo strtoupper($label); ?></span>
                <h3>Estado: Procesado</h3>
                <p><?php echo htmlspecialchars($item->enviar()); ?></p>
            </div>

        <?php endforeach; ?>
    </div>

</body>
</html>