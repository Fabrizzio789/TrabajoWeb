<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - NutriGest</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('styles.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

</head>

<body class="login-page">

    <!-- CONTENEDOR PRINCIPAL -->
    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-md-5">

                <!-- TARJETA LOGIN -->
                <div class="card shadow-lg border-0 login-card">

                    <!-- HEADER -->
                    <div class="card-header bg-success text-white text-center p-4">

                        <h2 class="text-white fw-bold">
                            NutriGest
                        </h2>

                        <p class="mb-0">
                            Sistema Inteligente para Comedores Populares
                        </p>

                    </div>

                    <!-- BODY -->
                    <div class="card-body p-4">

                    <!-- MENSAJE DE ERROR -->
                        @if(session('error'))

                            <div class="alert alert-danger">

                                {{ session('error') }}

                            </div>

                        @endif

                        <!-- FORMULARIO -->
                        <form method="POST" action="/login">
                            @csrf

                            <!-- CORREO -->
                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    Correo electrónico
                                </label>

                                <input 
                                    type="email"
                                    class="form-control"
                                    id="correo"
                                    name="correo"
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
                                    name="password"
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

    <button type="submit" class="btn btn-success btn-lg">
    Iniciar Sesión
</button>

</div>

<!-- ENLACE REGISTRO -->
<p class="text-center mt-3">

    ¿No tienes cuenta?

    <a href="/registro">
        Regístrate aquí
    </a>

</p>

                        </form>

                    </div>

                    <!-- FOOTER -->
                    <div class="card-footer text-center">

                        <small class="text-muted">
                            © 2026 Sistema Inteligente para Comedores Populares
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