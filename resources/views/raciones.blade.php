<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Entrega de Raciones</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('styles.css') }}">

</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success">

    <div class="container-fluid">

        <a class="navbar-brand" href="/dashboard">
            NutriGest
        </a>

        <div class="collapse navbar-collapse">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/beneficiarios">Beneficiarios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/inventario">Inventario</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="/raciones">Raciones</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/reportes">Reportes</a>
                </li>

                <li class="nav-item"><a class="nav-link text-warning" href="/login">Cerrar Sesión</a></li>

            </ul>

        </div>

    </div>

</nav>

<div class="container mt-5">

    <h2 class="text-white fw-bold">
    Registro de Entrega de Raciones
</h2>

<p class="text-white">
    Control de entrega diaria de raciones alimenticias
</p>

    <div class="card shadow mb-5">

        <div class="card-header bg-success text-white">

            Registrar Entrega

        </div>

        <div class="card-body">

            <form action="/raciones" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-5 mb-3">

                        <label class="form-label">
                            Beneficiario
                        </label>

                        <select
                            class="form-select"
                            name="beneficiario_id"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            @foreach($beneficiarios as $b)

                                <option value="{{ $b->id }}">
                                    {{ $b->nombres }} {{ $b->apellidos }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Cantidad
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            name="cantidad"
                            min="1"
                            required
                        >

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Fecha
                        </label>

                        <input
                            type="date"
                            class="form-control"
                            name="fecha"
                            value="{{ date('Y-m-d') }}"
                            required
                        >

                    </div>

                </div>

                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Registrar Entrega
                </button>

            </form>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            Historial de Entregas

        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-success">

                    <tr>

                        <th>ID</th>
                        <th>Beneficiario</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($raciones as $r)

                        <tr>

                            <td>{{ $r->id }}</td>

                            <td>
                                {{ $r->beneficiario->nombres }}
                                {{ $r->beneficiario->apellidos }}
                            </td>

                            <td>
                                {{ $r->cantidad }}
                            </td>

                            <td>
                                {{ $r->fecha }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>