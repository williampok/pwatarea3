<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar el usuario y la contraseña
    $query = "SELECT id, username FROM usuarios WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, md5($password));
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Inicio de sesión exitoso
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    /* Agrega estilos según tus preferencias */
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f8f8;
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

    form {
      max-width: 300px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #333;
      color: white;
      padding: 10px 20px;
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
    <h2>Login</h2>
    <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    <form method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Iniciar Sesión</button>
    </form>
    <p>¿No tienes una cuenta? <a href="crear_usuario.php">Crear Usuario</a></p>
</body>
</html>
