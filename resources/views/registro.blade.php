<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro - NutriGest</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

</head>

<body class="bg-light">

    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-5">

                <div class="card shadow-lg border-0 login-card">

                    <!-- Header -->
                    <div class="card-header bg-success text-white text-center p-4">

                        <h2 class="text-white fw-bold">
                            NutriGest
                        </h2>

                        <p class="mb-0">
                            Registro de Usuario
                        </p>

                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">

                        <form method="POST" action="/registrar">

                            @csrf

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Nombre Completo
                                </label>

                                <input
                                    type="text"
                                    name="nombre"
                                    class="form-control"
                                    placeholder="Ingrese su nombre completo"
                                    required
                                >

                            </div>

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Correo Electrónico
                                </label>

                                <input
                                    type="email"
                                    name="correo"
                                    class="form-control"
                                    placeholder="Ingrese su correo"
                                    required
                                >

                            </div>

                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Contraseña
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Ingrese una contraseña"
                                    required
                                >

                            </div>

                            <div class="d-grid">

                                <button
                                    type="submit"
                                    class="btn btn-success btn-lg"
                                >
                                    Registrarse
                                </button>

                            </div>

                        </form>

                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-center">

                        <p class="mb-2">

                            ¿Ya tienes una cuenta?

                            <a href="/">
                                Inicia sesión aquí
                            </a>

                        </p>

                        <small class="text-muted">
                            © 2026 NutriGest - Sistema Inteligente para Comedores Populares
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>