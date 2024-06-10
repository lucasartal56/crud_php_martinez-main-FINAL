<?php include_once '../../vistas/templates/header.php'; ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compañía de Ingeniería de Software</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background-image: url(../../src/images/fondo.jpg);
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            text-align: center;
        }
        .hero-title {
            font-size: 4rem;
            font-weight: bold;
        }
        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .hero-btn {
            padding: 0.75rem 2rem;
            font-size: 1.25rem;
        }
    </style>
</head>
<body>

<div class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Bienvenidos a Software Solutions</h1>
        <p class="hero-subtitle">Innovando el futuro de la tecnología</p>
    </div>
</div>

<div class="container my-5">
    <div id="servicios" class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="../../src/images/fondo1.jpg" class="card-img-top" alt="Desarrollo Web">
                <div class="card-body">
                    <h5 class="card-title">Desarrollo Web</h5>
                    <p class="card-text">Creación de aplicaciones web a la medida de tus necesidades.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="../../src/images/fondo2.jpg" class="card-img-top" alt="Aplicaciones Móviles">
                <div class="card-body">
                    <h5 class="card-title">Aplicaciones Móviles</h5>
                    <p class="card-text">Desarrollo de apps móviles innovadoras para iOS y Android.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="../../src/images/fondo3.jpg" class="card-img-top" alt="Consultoría TI">
                <div class="card-body">
                    <h5 class="card-title">Consultoría TI</h5>
                    <p class="card-text">Asesoría especializada en tecnología e implementación de sistemas.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



<?php include_once '../../vistas/templates/footer.php'; ?>