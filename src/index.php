<?php
  $expire48Hours = time() + 172800;

  // Rederigir si ya se ha logeado
  if (isset($_COOKIE["name"])) {
    // Actualizar tiempo de experiacion de la cookie
    setcookie("name", $_COOKIE["name"], $expire48Hours, "/");
    header("Location: challenge.php");
    exit();
  }

  // Si se ha enviado el nombre y no esta vacio establecer la cookie y redirigir
  if (isset($_POST["name"]) && !empty($_POST["name"])) {
    setcookie("name", $_POST["name"], $expire48Hours, "/");
    header("Location: challenge.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
</head>
<body>
  <h1>Bienvenido al juego de las preguntas diarias</h1>

  <p>¿Puedes indicarme tu nombre?</p>
  <form action="" method="post">
    <input type="text" name="name" id="name">
    <input type="submit" value="Entrar">
  </form>
</body>
</html>