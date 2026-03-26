<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series | Mirai</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- Aquí puedes agregar tu CSS propio si lo tienes --}}
    <link rel="stylesheet" href="{{ asset('css/series.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="coming-soon-card">
        <div class="brand-icon">
            <i class="bi bi-tv-fill pulse-icon"></i>
        </div>

        <h1>MIRAI SERIES</h1>

        <div class="coming-badge">
            <i class="bi bi-clock-history me-2"></i>Próximamente
        </div>

        <div class="description">
            Estamos preparando el mejor contenido para ti. <br>
            Muy pronto podrás disfrutar de series exclusivas, <br>
            estrenos y producciones originales en Mirai.
        </div>

        <!-- <a href="#" class="btn-gradient">
            <i class="bi bi-bell-fill"></i> Avisarme cuando llegue
        </a> -->

        <div class="decorative-line"></div>
<!-- 
        <div class="mt-4 text-secondary">
            <small><i class="bi bi-stars"></i> Suscríbete para recibir actualizaciones</small>
        </div> -->
    </div>

    {{-- Scripts opcionales --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>