<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistema de Comedores Populares</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/styles.css', 'resources/js/script.js'])

</head>

<body class="bg-light">

    <!-- CONTENEDOR PRINCIPAL -->
    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-5">

                <!-- TARJETA LOGIN -->
                <div class="card shadow-lg border-0">

                    <!-- HEADER -->
                    <div class="card-header bg-success text-white text-center p-4">

                        <h2 class="text-white fw-bold">
                            Sistema de Gestión
                        </h2>

                        <p class="mb-0">
                            Comedores Populares
                        </p>

                    </div>

                    <!-- BODY -->
                    <div class="card-body p-4">

                        <!-- FORMULARIO -->
                        <form id="formLogin">

                            <!-- CORREO -->
                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Correo electrónico
                                </label>

                                <input 
                                    type="email"
                                    class="form-control"
                                    id="correo"
                                    placeholder="Ingrese su correo"
                                    required
                                >

                            </div>

                            <!-- CONTRASEÑA -->
                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Contraseña
                                </label>

                                <input 
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Ingrese su contraseña"
                                    required
                                >

                            </div>

                            <!-- RECORDAR -->
                            <div class="mb-3 form-check">

                                <input 
                                    type="checkbox"
                                    class="form-check-input"
                                    id="recordar"
                                >

                                <label class="form-check-label" for="recordar">
                                    Recordarme
                                </label>

                            </div>

                           <!-- BOTÓN -->
<div class="d-grid">

    <a href="/dashboard" class="btn btn-success btn-lg">
        Iniciar Sesión
    </a>

</div>

                        </form>

                    </div>

                    <!-- FOOTER -->
                    <div class="card-footer text-center">

                        <small class="text-muted">
                            © 2026 Sistema de Gestión de Comedores Populares
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>