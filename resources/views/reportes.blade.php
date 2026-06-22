<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reportes - Sistema de Comedores Populares</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/styles.css', 'resources/js/script.js'])
</head>

<body class="bg-light">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">

        <div class="container-fluid">

            <a class="navbar-brand" href="/dashboard">
                Sistema de Comedores Populares
            </a>

            <button 
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu"
            >
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
                        <a class="nav-link active" href="/reportes">
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

        <!-- TÍTULO -->
        <div class="mb-4">

            <h2 class="fw-bold">
                Reportes del Sistema
            </h2>

            <p class="text-muted">
                Estadísticas y control administrativo del comedor popular
            </p>

        </div>

        <!-- TARJETAS -->
        <div class="row g-4 mb-5">

            <!-- BENEFICIARIOS -->
            <div class="col-md-3">

                <div class="card shadow border-0 h-100">

                    <div class="card-body text-center">

                        <h5 class="card-title">
                            Beneficiarios
                        </h5>

                        <h2 class="text-success fw-bold" id="totalBeneficiarios">
                            0
                        </h2>

                        <p class="text-muted">
                            Familias registradas
                        </p>

                    </div>

                </div>

            </div>

            <!-- PRODUCTOS -->
            <div class="col-md-3">

                <div class="card shadow border-0 h-100">

                    <div class="card-body text-center">

                        <h5 class="card-title">
                            Productos
                        </h5>

                        <h2 class="text-primary fw-bold" id="totalProductos">
                            0
                        </h2>

                        <p class="text-muted">
                            Productos en inventario
                        </p>

                    </div>

                </div>

            </div>

            <!-- RACIONES -->
            <div class="col-md-3">

                <div class="card shadow border-0 h-100">

                    <div class="card-body text-center">

                        <h5 class="card-title">
                            Raciones
                        </h5>

                        <h2 class="text-warning fw-bold" id="totalRaciones">
                            0
                        </h2>

                        <p class="text-muted">
                            Raciones entregadas
                        </p>

                    </div>

                </div>

            </div>

            <!-- STOCK BAJO -->
            <div class="col-md-3">

                <div class="card shadow border-0 h-100">

                    <div class="card-body text-center">

                        <h5 class="card-title">
                            Stock Bajo
                        </h5>

                        <h2 class="text-danger fw-bold" id="stockBajo">
                            0
                        </h2>

                        <p class="text-muted">
                            Productos críticos
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- TABLA -->
        <div class="card shadow">

            <div class="card-header bg-dark text-white">

                Reporte de Atención Diaria

            </div>

            <div class="card-body table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-success">

                        <tr>

                            <th>Fecha</th>
                            <th>Beneficiarios Atendidos</th>
                            <th>Raciones Entregadas</th>
                            <th>Observaciones</th>

                        </tr>

                    </thead>

                    <tbody id="tablaReportes">

                        <tr>

                            <td>14/05/2026</td>
                            <td>110</td>
                            <td>280</td>
                            <td>Atención normal</td>

                        </tr>

                        <tr>

                            <td>15/05/2026</td>
                            <td>120</td>
                            <td>300</td>
                            <td>Alta demanda</td>

                        </tr>

                        <tr>

                            <td>16/05/2026</td>
                            <td>115</td>
                            <td>290</td>
                            <td>Sin incidencias</td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center p-3 mt-5">

        Sistema de Gestión de Comedores Populares © 2026

    </footer>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT -->
    <script>

        // ======================================
        // OBTENER DATOS
        // ======================================

        let beneficiarios =
            JSON.parse(localStorage.getItem("beneficiarios")) || [];

        let productos =
            JSON.parse(localStorage.getItem("productos")) || [];



        // ======================================
        // TOTAL BENEFICIARIOS
        // ======================================

        document.getElementById("totalBeneficiarios").innerText =
            beneficiarios.length;



        // ======================================
        // TOTAL PRODUCTOS
        // ======================================

        document.getElementById("totalProductos").innerText =
            productos.length;



        // ======================================
        // STOCK BAJO
        // ======================================

        let stockBajo = productos.filter(

            producto => producto.estado === "Stock Bajo"

        );

        document.getElementById("stockBajo").innerText =
            stockBajo.length;



        // ======================================
        // RACIONES AUTOMÁTICAS
        // ======================================

        let totalRaciones = beneficiarios.length * 2;

        document.getElementById("totalRaciones").innerText =
            totalRaciones;



        // ======================================
        // TABLA DINÁMICA
        // ======================================

        let tabla = document.getElementById("tablaReportes");

        let fechaActual = new Date().toLocaleDateString();

        let observacion = "Atención normal";

        if(beneficiarios.length > 10){

            observacion = "Alta demanda";

        }

        tabla.innerHTML += `

            <tr>

                <td>${fechaActual}</td>

                <td>${beneficiarios.length}</td>

                <td>${totalRaciones}</td>

                <td>${observacion}</td>

            </tr>

        `;

    </script>

</body>

</html>