<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['username']; ?>!</h2>
    <p><a href="logout.php">Cerrar Sesión</a></p>
</body>
</html>
