<?php
// api/coches_search.php

// 1. Incluir conexión (usando ruta absoluta para evitar errores de "no encontrado")
require_once __DIR__ . '/../includes/conexion.php';

// 2. Cabecera JSON
header('Content-Type: application/json; charset=utf-8');

// 3. Obtener el término de búsqueda
$busqueda = isset($_GET['q']) ? $_GET['q'] : '';

try {
    if ($busqueda === '') {
        // Caso A: Si no hay búsqueda, mostramos los últimos 20
        $sql = "SELECT * FROM coches ORDER BY id DESC LIMIT 20";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else {
        // Caso B: Si hay búsqueda, filtramos
        // CORRECCIÓN: Usamos nombres distintos (:m y :mod) para cada hueco
        $sql = "SELECT * FROM coches WHERE marca LIKE :m OR modelo LIKE :mod";
        $stmt = $pdo->prepare($sql);

        // Pasamos el mismo valor a los dos huecos
        $termino = "%" . $busqueda . "%";
        $stmt->execute([
            'm' => $termino,
            'mod' => $termino
        ]);
    }

    // 4. Devolver resultados
    $coches = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($coches);

} catch (PDOException $e) {
    // Si hay error, devolvemos un JSON con el error para verlo en consola
    echo json_encode(['error' => $e->getMessage()]);
}
?>