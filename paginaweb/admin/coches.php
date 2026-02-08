<?php
require_once '../includes/auth.php';
require_once '../includes/conexion.php';

$mensaje = "";
$tipo_mensaje = "";

// --- LÓGICA PHP (Igual que siempre) ---
if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    $stmt = $pdo->prepare("DELETE FROM coches WHERE id = :id");
    if ($stmt->execute(['id' => $id])) {
        $mensaje = "Vehículo eliminado.";
        $tipo_mensaje = "success";
    } else {
        $mensaje = "Error al eliminar.";
        $tipo_mensaje = "danger";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['crear'])) {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];

    $foto = 'default.jpg';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
        $nombre_archivo = time() . "_" . $_FILES['foto']['name'];
        $ruta_destino = "../assets/img/" . $nombre_archivo;
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino)) {
            $foto = $nombre_archivo;
        }
    }

    $sql = "INSERT INTO coches (marca, modelo, precio, descripcion, foto) VALUES (:m, :mod, :p, :d, :f)";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute(['m' => $marca, 'mod' => $modelo, 'p' => $precio, 'd' => $descripcion, 'f' => $foto]);
        $mensaje = "Guardado correctamente.";
        $tipo_mensaje = "success";
    } catch (PDOException $e) {
        $mensaje = "Error: " . $e->getMessage();
        $tipo_mensaje = "danger";
    }
}

$coches = $pdo->query("SELECT * FROM coches ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Coches | HyperGarage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Outfit:wght@300;400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        /* Ajustes para móvil */
        @media (max-width: 768px) {

            .table-compact th,
            .table-compact td {
                padding: 0.5rem 0.2rem !important;
                font-size: 0.8rem;
            }

            .img-compact {
                width: 50px !important;
                height: 35px !important;
            }

            .btn-compact {
                padding: 0.2rem 0.5rem;
                font-size: 0.8rem;
            }

            .glass-panel {
                padding: 10px !important;
            }
        }

        /* Forzar tabla oscura transparente */
        .table-dark {
            --bs-table-bg: transparent !important;
            color: white !important;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.1) !important;
        }
    </style>
</head>

<body class="bg-black text-light">

    <div class="hero-section"
        style="height: 100vh !important; margin-top: 0 !important; padding-top: 0 !important; position: fixed; width: 100%; z-index: -1; opacity: 0.3;">
    </div>

    <nav class="navbar navbar-expand-lg navbar-glass border-bottom border-danger mb-4">
        <div class="container">
            <a class="navbar-brand fst-italic text-white d-flex align-items-center" href="../index.php">
                <span>HYPER<span style="color: var(--primary);">GARAGE</span></span>
                <span class="badge border border-white text-white bg-transparent ms-2"
                    style="font-size: 0.6em;">ADMIN</span>
            </a>
            <div class="d-flex align-items-center">
                <a href="dashboard.php" class="btn btn-sm btn-outline-secondary me-2">Volver</a>
                <a href="../logout.php" class="btn btn-sm btn-outline-light rounded-pill"><i
                        class="bi bi-power"></i></a>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h2 class="text-white m-0" style="font-family: 'Orbitron'">STOCK</h2>
            </div>
            <div class="col-6 text-end">
                <button class="btn btn-neon rounded-pill btn-sm" data-bs-toggle="modal"
                    data-bs-target="#crearCocheModal">
                    <i class="bi bi-plus-lg"></i> AÑADIR
                </button>
            </div>
        </div>

        <?php if ($mensaje): ?>
            <div class="alert alert-<?php echo $tipo_mensaje; ?> alert-dismissible fade show bg-transparent border-<?php echo $tipo_mensaje; ?> text-<?php echo $tipo_mensaje; ?> py-2 small"
                role="alert">
                <?php echo $mensaje; ?>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="glass-panel p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle table-sm table-compact mb-0">
                    <thead>
                        <tr>
                            <th class="p-3 text-secondary">FOTO</th>
                            <th class="p-3 text-secondary">MODELO</th>
                            <th class="p-3 text-secondary">PRECIO</th>
                            <th class="p-3 text-end"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($coches as $coche): ?>
                            <tr>
                                <td class="p-3">
                                    <img src="../assets/img/<?php echo $coche['foto']; ?>" alt="Car"
                                        class="rounded img-compact"
                                        style="width: 80px; height: 50px; object-fit: cover; border: 1px solid #333;">
                                </td>
                                <td class="p-3">
                                    <div style="line-height: 1.2;">
                                        <span class="text-danger fw-bold text-uppercase d-block small"
                                            style="font-size: 0.7em;"><?php echo $coche['marca']; ?></span>
                                        <span class="text-white fw-bold"><?php echo $coche['modelo']; ?></span>
                                    </div>
                                </td>
                                <td class="p-3 text-secondary text-nowrap">
                                    <?php echo number_format($coche['precio'], 0, ',', '.'); ?> €
                                </td>
                                <td class="p-3 text-end">
                                    <a href="coches.php?borrar=<?php echo $coche['id']; ?>"
                                        class="btn btn-sm btn-outline-danger border-0 btn-compact"
                                        onclick="return confirm('¿Eliminar <?php echo $coche['modelo']; ?>?');">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php if (empty($coches)): ?>
                <div class="text-center p-4 text-secondary small">Sin coches aún.</div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="crearCocheModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-panel p-0 border-0">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title text-white" style="font-family: 'Orbitron'">NUEVO COCHE</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="coches.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="crear" value="1">
                        <div class="mb-3">
                            <label class="text-secondary small">MARCA</label>
                            <input type="text" name="marca" class="form-control form-control-dark" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-secondary small">MODELO</label>
                            <input type="text" name="modelo" class="form-control form-control-dark" required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="text-secondary small">PRECIO</label>
                                <input type="number" name="precio" class="form-control form-control-dark" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="text-secondary small">FOTO</label>
                                <input type="file" name="foto" class="form-control form-control-dark">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="text-secondary small">DESCRIPCIÓN</label>
                            <textarea name="descripcion" class="form-control form-control-dark" rows="3"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-neon">GUARDAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>