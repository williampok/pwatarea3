<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash de la contraseña (utiliza métodos de hashing más seguros en producción)
    $hashedPassword = md5($password);

    // Consulta SQL para insertar un nuevo usuario
    $query = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $hashedPassword);

    if ($stmt->execute()) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error al crear el usuario: " . $stmt->error;
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
    <title>Crear Usuario</title>
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
    <h2>Crear Usuario</h2>
    <form method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>
