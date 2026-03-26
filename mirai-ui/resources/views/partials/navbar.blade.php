<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">MIRAI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route ('series') }}">Series</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route ('peliculas') }}">Películas</a></li>
            {{--<li class="nav-item"><a class="nav-link" href="{{ route ('mi-lista') }}">Mi lista</a></li> --}}
            </ul>

            {{-- SOLO SI ESTÁ LOGUEADO --}}
            @if(session()->has('token'))
            <div class="d-flex">
                <a href="#" class="nav-link"><i class="bi bi-search"></i></a>
                <a href="#" class="nav-link"><i class="bi bi-bell"></i></a>
                <a href="{{ route('profile') }}" class="nav-link"><i class="bi bi-person-circle"></i></a>
            </div>
            @endif
        </div>
    </div>
</nav>