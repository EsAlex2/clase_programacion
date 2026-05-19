<?php 
require_once 'PersonajesPelea.php';

$guerrero = new Personajes("Guerrero", 100, rand(10, 30));
$mago = new Personajes("Mago", 100, rand(10, 30));

$historial = [];


while ($guerrero->getPuntosVida() > 0 && $mago->getPuntosVida() > 0) {
    
    $guerrero->atacar($mago);
    $historial[] = "<p class='text-success'>{$guerrero->getNombre()} ataca a {$mago->getNombre()} causando {$guerrero->getPuntosAtaque()} puntos de daño.</p>";
    
    if ($mago->getPuntosVida() <= 0) {
        $historial[] = "<p class='text-danger'>{$mago->getNombre()} ha sido derrotado.</p>";
        break;
    }

    $mago->atacar($guerrero);
    $historial[] = "<p class='text-success'>{$mago->getNombre()} ataca a {$guerrero->getNombre()} causando {$mago->getPuntosAtaque()} puntos de daño.</p>";
    
    if ($guerrero->getPuntosVida() <= 0) {
        $historial[] = "<p class='text-danger'>{$guerrero->getNombre()} ha sido derrotado.</p>";
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Combate</title>
    <style>
        .container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }
        .text-success { color: green; margin: 5px 0; }
        .text-danger { color: red; font-weight: bold; margin: 10px 0; }
        .registro { background: #f9f9f9; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Resultados de la pelea</h1>
        
        <div class="registro">
            <h3>Bitácora del combate:</h3>
            <?php 
                foreach ($historial as $suceso) {
                    echo $suceso;
                }
            ?>
        </div>

        <hr>

        <h3>Estado Final:</h3>
        <p><strong>Guerrero:</strong> Vida restante = <?php echo $guerrero->getPuntosVida(); ?></p>
        <p><strong>Mago:</strong> Vida restante = <?php echo $mago->getPuntosVida(); ?></p>
    </div>

</body>
</html>