<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - Sistema de Comedores Populares</title>
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
                    <li class="nav-item"><a class="nav-link" href="/beneficiarios">Beneficiarios</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/inventario">Inventario</a></li>
                    <li class="nav-item"><a class="nav-link" href="/reportes">Reportes</a></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="/login">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO -->
    <div class="container mt-5">

        <!-- TÍTULO -->
        <div class="mb-4">
            <h2 class="page-title">Gestión de Inventario</h2>
            <p class="page-subtitle">Control de alimentos y productos del comedor popular</p>
        </div>

        <!-- FORMULARIO -->
        <div class="card shadow mb-5">
            <div class="card-header bg-success text-white">Registrar Producto</div>
            <div class="card-body">
                <form action="/inventario" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nombre del Producto</label>
                            <input type="text" class="form-control" id="producto" name="producto" placeholder="Ingrese producto" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Categoría</label>
                            <select class="form-select" id="categoria" name="categoria">
                                <option value="">Seleccione</option>
                                <option>Granos</option>
                                <option>Lácteos</option>
                                <option>Verduras</option>
                                <option>Frutas</option>
                                <option>Carnes</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Fecha de Ingreso</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Estado</label>
                            <select class="form-select" id="estado" name="estado">
                                <option>Disponible</option>
                                <option>Stock Bajo</option>
                                <option>Agotado</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">Registrar Producto</button>
                    </div>

                </form>
            </div>
        </div>

        <!-- TABLA -->
        <div class="card shadow">
            <div class="card-header bg-dark text-white">Lista de Productos</div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(($inventarios ?? []) as $i)
                        <tr>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->producto }}</td>
                            <td>{{ $i->categoria }}</td>
                            <td>{{ $i->stock }}</td>
                            <td>{{ $i->fecha }}</td>
                            <td>
                                @if($i->estado == 'Disponible')
                                    <span class="badge bg-success">{{ $i->estado }}</span>
                                @elseif($i->estado == 'Stock Bajo')
                                    <span class="badge bg-warning text-dark">{{ $i->estado }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $i->estado }}</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $i->id }}">
                                    Editar
                                </button>
                                <form action="/inventario/{{ $i->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CORRECCIÓN: modales fuera de la tabla -->
        @foreach(($inventarios ?? []) as $i)
        <div class="modal fade" id="editarModal{{ $i->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/inventario/{{ $i->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-header">
                            <h5 class="modal-title">Editar Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <input type="text" class="form-control mb-2" name="producto" value="{{ $i->producto }}" required>
                            <input type="text" class="form-control mb-2" name="categoria" value="{{ $i->categoria }}" required>
                            <input type="number" class="form-control mb-2" name="stock" value="{{ $i->stock }}" required>
                            <input type="date" class="form-control mb-2" name="fecha" value="{{ $i->fecha }}" required>
                            <input type="text" class="form-control" name="estado" value="{{ $i->estado }}" required>
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

    <!-- FOOTER 
    <footer class="bg-dark text-white text-center p-3 mt-5">
        Sistema de Gestión de Comedores Populares © 2026
    </footer>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>