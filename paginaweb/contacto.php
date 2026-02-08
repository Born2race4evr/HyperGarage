<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-secondary text-decoration-none">Inicio</a></li>
            <li class="breadcrumb-item active text-danger" aria-current="page">Contacto</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-6 mb-5">
            <h1 class="mb-4" style="font-family: 'Orbitron'">HABLEMOS</h1>
            <p class="text-secondary mb-5">¿Interesado en una pieza de nuestra colección? Solicita una cita privada.</p>

            <form>
                <div class="mb-3">
                    <label class="text-secondary small">NOMBRE COMPLETO</label>
                    <input type="text" class="form-control form-control-dark">
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">EMAIL</label>
                    <input type="email" class="form-control form-control-dark">
                </div>
                <div class="mb-3">
                    <label class="text-secondary small">MENSAJE</label>
                    <textarea class="form-control form-control-dark" rows="4"></textarea>
                </div>
                <button type="button" class="btn btn-neon rounded-0 w-100">ENVIAR SOLICITUD</button>
            </form>
        </div>

        <div class="col-lg-5 offset-lg-1">
            <div class="glass-panel h-100">
                <h3 class="text-white mb-4" style="font-family: 'Orbitron'">SHOWROOM</h3>

                <div class="d-flex mb-4">
                    <div class="me-3"><i class="bi bi-geo-alt-fill text-danger fs-4"></i></div>
                    <div>
                        <h5 class="text-white mb-1">Madrid, España</h5>
                        <p class="text-secondary small mb-0">Calle Serrano, 140<br>Barrio de Salamanca, 28006</p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="me-3"><i class="bi bi-telephone-fill text-danger fs-4"></i></div>
                    <div>
                        <h5 class="text-white mb-1">+34 910 000 000</h5>
                        <p class="text-secondary small mb-0">Lunes a Viernes, 10:00 - 20:00</p>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="me-3"><i class="bi bi-envelope-fill text-danger fs-4"></i></div>
                    <div>
                        <h5 class="text-white mb-1">vip@hypergarage.com</h5>
                        <p class="text-secondary small mb-0">Atención 24/7 para clientes</p>
                    </div>
                </div>

                <div class="mt-4 rounded overflow-hidden" style="height: 200px; background: #333;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3036.567016629983!2d-3.688849684603429!3d40.44057797936236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4228ec8027735d%3A0x627d35505e830c2!2sC.%20de%20Serrano%2C%20140%2C%2028006%20Madrid!5e0!3m2!1ses!2ses!4v1645484848484!5m2!1ses!2ses"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>