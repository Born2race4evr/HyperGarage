<?php
require_once 'includes/conexion.php';
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
    $stmt->execute(['usuario' => $usuario]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['usuario'] = $user['usuario'];
        $_SESSION['id'] = $user['id'];
        header('Location: admin/dashboard.php');
        exit;
    } else {
        $error = 'Credenciales incorrectas';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Access | HyperGarage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Outfit:wght@300;400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* Ajuste específico para que los inputs se vean mejor en el Login */
        .login-input {
            background: rgba(255, 255, 255, 0.1) !important;
            /* Más claro para leer bien */
            border-color: rgba(255, 255, 255, 0.2) !important;
            color: white !important;
        }

        .login-input:focus {
            background: rgba(255, 255, 255, 0.2) !important;
            box-shadow: 0 0 15px rgba(255, 42, 42, 0.4) !important;
        }
    </style>
</head>

<body class="bg-black">

    <div class="hero-section"
        style="height: 100vh !important; margin-top: 0 !important; padding-top: 0 !important; position: fixed; width: 100%; z-index: -1;">
    </div>

    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-11 col-md-6 col-lg-4">
            <div class="glass-panel text-center px-4 py-5">

                <h2 class="mb-4 logo-text" style="font-family: 'Orbitron'">
                    HYPER<span>GARAGE</span>
                </h2>

                <p class="text-secondary mb-4 small text-uppercase spacing-2">Acceso Restringido</p>

                <?php if ($error): ?>
                    <div class="alert alert-danger bg-transparent text-danger border-danger">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3 text-start">
                        <label class="text-secondary small ms-1 mb-1">USUARIO</label>
                        <input type="text" name="usuario" class="form-control form-control-dark login-input"
                            placeholder="admin" required>
                    </div>
                    <div class="mb-4 text-start">
                        <label class="text-secondary small ms-1 mb-1">CONTRASEÑA</label>
                        <input type="password" name="password" class="form-control form-control-dark login-input"
                            placeholder="••••••" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-neon rounded-pill py-2">
                            INICIAR MOTOR <i class="bi bi-lightning-charge-fill"></i>
                        </button>
                    </div>
                </form>

                <div class="mt-4 border-top border-secondary pt-3"
                    style="border-color: rgba(255,255,255,0.1) !important;">
                    <a href="index.php" class="text-secondary text-decoration-none small hover-white">
                        <i class="bi bi-arrow-left"></i> Volver al Showroom
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>