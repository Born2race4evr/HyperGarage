<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-secondary text-decoration-none">Inicio</a></li>
            <li class="breadcrumb-item active text-danger" aria-current="page">Nosotros</li>
        </ol>
    </nav>

    <div class="row align-items-center">
        <div class="col-md-6 mb-4">
            <h1 style="font-family: 'Orbitron'; font-size: 3rem;">LEGACY <span
                    style="color: var(--primary)">DRIVEN</span></h1>
            <p class="lead text-secondary mt-4">
                En <strong>HyperGarage</strong>, no vendemos coches; gestionamos sueños. Fundada en 2026, nuestra misión
                es conectar a los coleccionistas más exigentes con las máquinas más perfectas jamás construidas.
            </p>
            <p class="text-secondary">
                Desde los clásicos V12 de Maranello hasta la ingeniería híbrida de vanguardia de Stuttgart. Cada
                vehículo en nuestro stock ha pasado por una rigurosa certificación de 150 puntos.
            </p>
            <div class="mt-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-check-circle-fill text-danger me-3 fs-4"></i>
                    <span class="text-white">Certificación de Autenticidad</span>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-globe text-danger me-3 fs-4"></i>
                    <span class="text-white">Envío Internacional Blindado</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-shield-lock-fill text-danger me-3 fs-4"></i>
                    <span class="text-white">Garantía Premium de 24 Meses</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="glass-panel p-2">
                <img src="https://images.unsplash.com/photo-1562519819-016930ada31b?q=80&w=1000&auto=format&fit=crop"
                    class="img-fluid rounded" alt="Taller HyperGarage">
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>