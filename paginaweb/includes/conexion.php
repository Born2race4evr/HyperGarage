<?php
// Configuración de la base de datos
$host = '127.0.0.1';
$port = '3307';      // Asegúrate de que este es tu puerto (mira XAMPP)
$db = 'hypergarage';
$user = 'root';
$pass = '';          // En XAMPP suele estar vacía
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Si falla, detener todo y mostrar el error
    die("❌ ERROR CRÍTICO DE CONEXIÓN: " . $e->getMessage());
}
?>