<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contador de Visitas</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
      text-align: center;
    }

    h2 {
      color: #333;
    }

    p {
      font-size: 18px;
      color: #555;
    }
  </style>
</head>
<body>

<h2>Bienvenido al contador web</h2>

<?php
session_start();

if(isset($_SESSION['counter'])) {
    $_SESSION['counter'] += 1;
} else {
    $_SESSION['counter'] = 1;
}

$visits = $_SESSION['counter'];
?>

<p>Esta es la visita número <?php echo $visits; ?>.</p>

</body>
</html>
