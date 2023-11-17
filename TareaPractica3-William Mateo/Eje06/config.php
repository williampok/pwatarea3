<?php
// config.php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'usuarios';

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
?>
