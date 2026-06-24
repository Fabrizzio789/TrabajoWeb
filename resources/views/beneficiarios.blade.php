<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficiarios - Sistema de Comedores Populares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
</head>

<body class="bg-light">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="/dashboard">NutriGest</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/beneficiarios">Beneficiarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="/inventario">Inventario</a></li>
                    <li class="nav-item"><a class="nav-link" href="/reportes">Reportes</a></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="/login">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <div class="container mt-5">

        <!-- TITULO -->
        <div class="mb-4">
            <h2 class="page-title">Gestión de Beneficiarios</h2>
            <p class="page-subtitle">Registro y control de familias beneficiadas</p>
        </div>

        <!-- FORMULARIO -->
        <div class="card shadow mb-5">
            <div class="card-header bg-success text-white">Registrar Beneficiario</div>
            <div class="card-body">
                <form action="/beneficiarios" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese nombres" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese apellidos" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese DNI" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese teléfono">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Edad</label>
                            <!-- CORRECCIÓN 2: se agregó name="edad" -->
                            <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese edad">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese dirección">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">Registrar Beneficiario</button>
                    </div>

                </form>
            </div>
        </div>

        <!-- TABLA -->
        <div class="card shadow">
            <div class="card-header bg-dark text-white">Lista de Beneficiarios</div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>DNI</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(($beneficiarios ?? []) as $b)
                        <tr>
                            <td>{{ $b->id }}</td>
                            <td>{{ $b->nombres }} {{ $b->apellidos }}</td>
                            <td>{{ $b->dni }}</td>
                            <td>{{ $b->telefono }}</td>
                            <td>{{ $b->direccion }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $b->id }}">
                                    Editar
                                </button>
                                <form action="/beneficiarios/{{ $b->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <!-- CORRECCIÓN 3: eliminado el </tbody> duplicado que había aquí -->
                </table>
            </div>
        </div>

        <!-- CORRECCIÓN 1: modales movidos fuera de la tabla -->
        @foreach(($beneficiarios ?? []) as $b)
        <div class="modal fade" id="editarModal{{ $b->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/beneficiarios/{{ $b->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-header">
                            <h5 class="modal-title">Editar Beneficiario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <input type="text" name="nombres" class="form-control mb-2" value="{{ $b->nombres }}" required>
                            <input type="text" name="apellidos" class="form-control mb-2" value="{{ $b->apellidos }}" required>
                            <input type="text" name="dni" class="form-control mb-2" value="{{ $b->dni }}" required>
                            <input type="text" name="telefono" class="form-control mb-2" value="{{ $b->telefono }}">
                            <input type="text" name="direccion" class="form-control" value="{{ $b->direccion }}">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>