<?php
require_once '../includes/auth.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | HyperGarage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Outfit:wght@300;400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-black text-light">

    <div class="hero-section"
        style="height: 100vh !important; margin-top: 0 !important; padding-top: 0 !important; position: fixed; width: 100%; z-index: -1; opacity: 0.3;">
    </div>

    <nav class="navbar navbar-expand-lg navbar-glass border-bottom border-danger">
        <div class="container">
            <a class="navbar-brand fst-italic text-white d-flex align-items-center" href="../index.php">
                <span>HYPER<span style="color: var(--primary);">GARAGE</span></span>
                <span class="badge border border-white text-white bg-transparent ms-2"
                    style="font-size: 0.6em;">ADMIN</span>
            </a>
            <div class="d-flex align-items-center">
                <span class="text-secondary me-3 d-none d-md-block">Piloto: <span
                        class="text-white fw-bold"><?php echo $_SESSION['usuario']; ?></span></span>
                <a href="../logout.php" class="btn btn-sm btn-outline-light rounded-pill px-3">
                    <i class="bi bi-power"></i> <span class="d-none d-md-inline">Salir</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php"
                        class="text-secondary text-decoration-none">Showroom</a></li>
                <li class="breadcrumb-item active text-danger" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <h1 class="mb-5 text-white" style="font-family: 'Orbitron'; font-size: 2.5rem;">PANEL DE CONTROL</h1>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="glass-panel h-100 position-relative overflow-hidden group-hover-effect">
                    <div class="position-absolute top-0 end-0 p-3 opacity-25">
                        <i class="bi bi-car-front-fill" style="font-size: 8rem; color: var(--primary);"></i>
                    </div>

                    <h3 class="text-white mb-3" style="font-family: 'Orbitron'">GESTIÓN DE STOCK</h3>
                    <p class="text-secondary mb-4" style="max-width: 70%;">
                        Añade nuevas bestias al catálogo, edita precios o elimina modelos vendidos.
                    </p>

                    <a href="coches.php" class="btn btn-neon">
                        ADMINISTRAR COCHES <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="glass-panel h-100 position-relative overflow-hidden" style="opacity: 0.7;">
                    <div class="position-absolute top-0 end-0 p-3 opacity-25">
                        <i class="bi bi-people-fill" style="font-size: 8rem; color: #fff;"></i>
                    </div>

                    <h3 class="text-white mb-3" style="font-family: 'Orbitron'">USUARIOS</h3>
                    <p class="text-secondary mb-4" style="max-width: 70%;">
                        Gestión de administradores y permisos de acceso al taller.
                    </p>

                    <button class="btn btn-outline-secondary disabled rounded-0">
                        PRÓXIMAMENTE
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-5 glass-panel p-4">
            <h4 class="text-white mb-3" style="font-family: 'Orbitron'">ESTADO DEL SISTEMA</h4>
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-3">
                    <h2 class="text-danger fw-bold">ON</h2>
                    <span class="text-secondary small">DATABASE</span>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <h2 class="text-white fw-bold">PHP 8.x</h2>
                    <span class="text-secondary small">VERSION</span>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <h2 class="text-white fw-bold"><?php echo date('H:i'); ?></h2>
                    <span class="text-secondary small">HORA LOCAL</span>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <h2 class="text-success fw-bold">OK</h2>
                    <span class="text-secondary small">SESSION</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>