<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>geo 2</title>
    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container-fluid p-0">

    <!-- Navbar de Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">APP MAPA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a>
                    </li>
                    {{-- Rutas de clientes comentadas para evitar errores --}}
                    {{-- 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientes.create') }}">NUEVO CLIENTE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('clientes/mapa') }}">REPORTE DE MAPA</a>
                    </li>
                    --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('predios.create') }}">REGISTRAR PREDIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Cargar Google Maps API -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkdgSJE1ZFww0OT7TSj-mGZcR9Cl4Hx8M&callback=initMap&libraries=places">
    </script>

    <div class="container my-4">
        @yield('contenido')
    </div>

    <!-- Footer de Bootstrap -->
    <footer class="bg-dark text-white text-center text-lg-start mt-auto">
        <div class="container p-4">
            <p class="mb-0">© 2025 APP MAPA. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS (CDN) y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
