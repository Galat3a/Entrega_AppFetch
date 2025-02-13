<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url-base" content="{{ url('') }}">
    <title>Gestión de Alumnos y Prácticas</title>
    <!-- Agregamos Bootstrap para el estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('assets/js/pagination.js') }}" defer></script>
    <script src="{{ asset('assets/js/alumno.js') }}" defer></script>
    <script src="{{ asset('assets/js/practica.js') }}" defer></script>
    <!-- Styles -->
    <style>
        body {
            background-color: #007bff;
            color: #ffffff;
        }
        .github {
            text-decoration: none;
            color: gray;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }
        .github:hover {
            color: black;
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            color: #000000;
        }
        .card-body {
            background-color: #ffffff;
            color: #000000;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead th {
            background-color: #f8f9fa;
            color: #000000;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #dcdcdc !important;
        }
        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
</head>
<body class="container mt-4">
    @include('modal')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestión de Alumnos y Prácticas</h1>
        <a href="https://github.com/rtro-dev/Fetch_App" class="github" target="_blank">
            <i class="fa-brands fa-github"></i> Code
        </a>
    </div>
    <div class="row">
        <!-- Sección Alumnos -->
        <div class="col-md-12 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header">
                    <h2 class="h5 mb-0">Lista de Alumnos</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Edad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="alumnosTableBody">
                                </tbody>
                            </table>
                        </div>
                        <div id="alumnosPagination" class="d-flex justify-content-center mt-3"></div>
                    </div>
                    <button id="createAlumnoBtn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createAlumnoModal">Añadir Alumno</button>
                </div>
            </div>
        </div>

        <!-- Sección Prácticas -->
        <div class="col-md-12">
            <div class="card h-100 shadow-sm">
                <div class="card-header">
                    <h2 class="h5 mb-0">Lista de Prácticas</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Fecha de Inicio</th>
                                        <th>Fecha de Fin</th>
                                        <th>Alumno</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="practicasTableBody">
                                </tbody>
                            </table>
                        </div>
                        <div id="practicasPagination" class="d-flex justify-content-center mt-3"></div>
                    </div>
                    <button id="createPracticaBtn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createPracticaModal">Añadir Práctica</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Configuración básica para las peticiones fetch
        const csrf_token = document.querySelector('meta[name="csrf-token"]').content;
        const url_base = document.querySelector('meta[name="url-base"]').content;
        const headers = {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrf_token
        };

        document.addEventListener('DOMContentLoaded', () => {
            // Ocultar todos los mensajes de error al cargar la página
            document.querySelectorAll('.alert-warning').forEach(alert => {
                alert.style.display = 'none';
            });
            
            // Cargar datos
            loadAlumnos();
            loadPracticas(); // Ensure this function is defined in practica.js
        });

    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>