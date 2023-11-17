<!-- index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juego de Adivinanzas</title>
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

    input {
      padding: 10px;
      font-size: 16px;
    }

    button {
      background-color: #333;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #555;
    }
  </style>
</head>
<body>

<?php
session_start();

// Inicializar el número aleatorio en la primera carga de la página
if (!isset($_SESSION['target'])) {
    $_SESSION['target'] = rand(1, 10);
}

// Verificar si el formulario ha sido enviado
if (isset($_POST['guess'])) {
    $guess = (int)$_POST['guess'];

    if ($guess === $_SESSION['target']) {
        echo "<h2>¡Felicitaciones! Adivinaste el número.</h2>";
        // Reiniciar el juego generando un nuevo número aleatorio
        unset($_SESSION['target']);
    } else {
        echo "<p>¡Intenta de nuevo! No has adivinado el número.</p>";
    }
}
?>

<h2>Juego de Adivinanzas</h2>
<p>Estoy pensando en un número del 1 al 10. ¿Puedes adivinar cuál es?</p>

<form method="post">
  <input type="number" name="guess" min="1" max="10" required>
  <button type="submit">Adivinar</button>
</form>

</body>
</html>
