<?php
require_once 'includes/conexion.php';
$stmt = $pdo->query("SELECT * FROM coches");
$coches = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main>
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title text-white mb-3">PURE <span style="color: var(--primary)">ADRENALINE</span></h1>
            <p class="lead text-secondary mb-5 fs-4">Luxury & Supercars Collection</p>
            <a href="#catalogo" class="btn btn-neon rounded-0">Ver Showroom</a>
        </div>
    </section>

    <section id="catalogo" class="container py-5">

        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <div class="input-group glass-search">
                    <span class="input-group-text bg-transparent border-0 text-danger">
                        <i class="bi bi-search fs-5"></i>
                    </span>
                    <input type="text" id="buscador" class="form-control search-input"
                        placeholder="Buscar Ferrari, Lamborghini...">
                </div>
            </div>
        </div>

        <div class="row g-4" id="contenedor-coches">
            <?php foreach ($coches as $coche): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card card-car h-100">
                        <div class="card-img-wrapper">
                            <img src="assets/img/<?php echo $coche['foto']; ?>" class="card-img-top"
                                alt="<?php echo $coche['modelo']; ?>"
                                onerror="this.src='https://via.placeholder.com/400x300/111/fff?text=No+Image'">
                        </div>
                        <div class="price-tag">
                            <?php echo number_format($coche['precio'], 0, ',', '.'); ?> €
                        </div>

                        <div class="card-body">
                            <small class="text-danger fw-bold text-uppercase">
                                <?php echo $coche['marca']; ?>
                            </small>
                            <h4 class="card-title text-white mt-1 mb-3">
                                <?php echo $coche['modelo']; ?>
                            </h4>
                            <p class="card-text text-secondary small">
                                <?php echo substr($coche['descripcion'], 0, 70) . '...'; ?>
                            </p>
                            <div class="d-grid mt-4">
                                <button class="btn btn-outline-light btn-sm rounded-0">FICHA TÉCNICA</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>