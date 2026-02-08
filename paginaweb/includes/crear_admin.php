<?php
// paginaweb/includes/crear_admin.php
require_once 'conexion.php';

// 1. La contraseña que queremos usar
$password_plana = "admin";

// 2. La encriptamos usando el algoritmo de tu servidor actual
$password_encriptada = password_hash($password_plana, PASSWORD_DEFAULT);

try {
    // 3. Borramos si ya existía para no duplicar
    $pdo->query("DELETE FROM usuarios WHERE usuario = 'admin'");

    // 4. Insertamos el nuevo usuario
    $sql = "INSERT INTO usuarios (usuario, password) VALUES (:u, :p)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'u' => 'admin',
        'p' => $password_encriptada
    ]);

    echo "<h1 style='color:green'>¡ÉXITO!</h1>";
    echo "<p>Usuario: <b>admin</b></p>";
    echo "<p>Contraseña: <b>admin</b></p>";
    echo "<p>Hash generado: $password_encriptada</p>";
    echo "<br><a href='../login.php'>Ir al Login</a>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>