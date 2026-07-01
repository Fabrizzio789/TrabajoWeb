<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión - Comedores Populares</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('styles.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">

        <div class="container-fluid">

            <a class="navbar-brand" href="/dashboard">
                NutriGest
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            Inicio
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/beneficiarios">
                            Beneficiarios
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/inventario">
                            Inventario
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/raciones">
                            Raciones
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/reportes">
                            Reportes
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-warning" href="/login">
                            Cerrar Sesión
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- CONTENIDO -->
    <div class="container mt-5">

        <div class="text-center mb-5">

            <h1 class="hero-title">
    Bienvenido a NutriGest
</h1>

<p class="hero-subtitle">
    Sistema Inteligente para Comedores Populares
</p>

        </div>

        <!-- TARJETAS -->
        <div class="row g-4">

            <!-- BENEFICIARIOS -->
            <div class="col-md-4">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <h3 class="card-title">
                            Beneficiarios
                        </h3>

                        <p class="card-text">
                            Registro y control de familias beneficiadas.
                        </p>

                        <a href="/beneficiarios" class="btn btn-success">
                            Ingresar
                        </a>

                    </div>

                </div>

            </div>

            <!-- INVENTARIO -->
            <div class="col-md-4">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <h3 class="card-title">
                            Inventario
                        </h3>

                        <p class="card-text">
                            Gestión de productos y control de stock.
                        </p>

                        <a href="/inventario" class="btn btn-success">
                            Ingresar
                        </a>

                    </div>

                </div>

            </div>

            <!-- REPORTES -->
            <div class="col-md-4">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <h3 class="card-title">
                            Reportes
                        </h3>

                        <p class="card-text">
                            Visualización de estadísticas y reportes.
                        </p>

                        <a href="/reportes" class="btn btn-success">
                            Ingresar
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER 
    <footer class="bg-dark text-white text-center p-3 mt-5">

        Sistema de Gestión de Comedores Populares © 2026

    </footer>-->

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>