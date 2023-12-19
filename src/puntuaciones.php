<?php
// Iniciar o reanudar la sesión
session_start();

// Verificar si la cookie con el nombre existe
if (!isset($_COOKIE['usuario_nombre'])) {
    // Si la cookie no existe, redirigir a la página de inicio
    header('Location: index.php');
    exit();
}

// Obtener el nombre almacenado en la cookie
$nombre = $_COOKIE['usuario_nombre'];

// Verificar si se ha jugado algún día y se ha almacenado la puntuación en la sesión
if (isset($_SESSION['score'])) {
    // Obtener las score almacenadas
    $score = $_SESSION['score'];
} else {
    // Si no hay score almacenadas, inicializar la variable de sesión
    $score = array();
}

// Verificar si se ha enviado la puntuación de un nuevo día desde la página de challenge
if (isset($_POST['puntuacion_dia'])) {
    // Obtener la puntuación del día
    $puntuacionDia = (int)$_POST['puntuacion_dia'];

    // Almacenar la puntuación del día en la variable de sesión
    $score[date("Y-m-d")] = $puntuacionDia;

    // Actualizar la variable de sesión
    $_SESSION['score'] = $score;
}

// Calcular la puntuación total
$puntuacionTotal = array_sum($score);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de score</title>
</head>
<body>
    <h1>Página de score</h1>

    <p>Bienvenido, <?php echo $nombre; ?>.</p>

    <?php if (!empty($score)) : ?>
        <h2>score obtenidas:</h2>
        <ul>
            <?php foreach ($score as $fecha => $puntuacion) : ?>
                <li><?php echo "$fecha: $puntuacion puntos"; ?></li>
            <?php endforeach; ?>
        </ul>
        <p>Puntuación Total: <?php echo $puntuacionTotal; ?> puntos</p>
    <?php else : ?>
        <p>No hay score registradas.</p>
    <?php endif; ?>

    <!-- Enlace para volver a la página de challenge -->
    <p><a href="challenge.php">Volver a la página de challenge</a></p>
</body>
</html>
