<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mirai - Streaming</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0b0b0b;
            color: #fff;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.9) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            letter-spacing: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-link {
            color: #fff !important;
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #667eea !important;
        }
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1925&q=80');
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
            align-items: center;
            margin-top: 76px;
        }
        .hero-content {
            max-width: 600px;
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .hero-subtitle {
            font-size: 1.2rem;
            color: #e0e0e0;
            margin-bottom: 2rem;
        }
        .btn-mirai {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: transform 0.3s ease;
        }
        .btn-mirai:hover {
            transform: scale(1.05);
            color: white;
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }
        .btn-outline-mirai {
            background: transparent;
            border: 2px solid #667eea;
            color: white;
            padding: 10px 28px;
            border-radius: 50px;
            font-weight: 600;
            margin-left: 15px;
            transition: all 0.3s ease;
        }
        .btn-outline-mirai:hover {
            background: #667eea;
            color: white;
        }
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
            display: inline-block;
        }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }
        .category-card {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease;
            cursor: pointer;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .category-card:hover {
            transform: translateY(-10px);
            border-color: #667eea;
        }
        .category-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #667eea;
        }
        .movie-card {
            background: #1a1a1a;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
            border: 1px solid rgba(255,255,255,0.1);
            height: 100%;
        }
        .movie-card:hover {
            transform: scale(1.05);
            border-color: #667eea;
        }
        .movie-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .movie-info {
            padding: 1.5rem;
        }
        .movie-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .movie-meta {
            color: #a0a0a0;
            font-size: 0.9rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .rating {
            color: #ffc107;
        }
        .footer {
            background-color: #0a0a0a;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 4rem 0 2rem;
        }
        .footer-link {
            color: #a0a0a0;
            text-decoration: none;
            transition: color 0.3s ease;
            line-height: 2;
        }
        .footer-link:hover {
            color: #667eea;
        }
        .social-icon {
            color: #a0a0a0;
            font-size: 1.5rem;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }
        .social-icon:hover {
            color: #667eea;
        }
        .badge-quality {
            background: rgba(102, 126, 234, 0.2);
            color: #667eea;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">MIRAI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Series</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Películas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mi lista</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="#" class="nav-link"><i class="bi bi-search"></i></a>
                    <a href="#" class="nav-link"><i class="bi bi-bell"></i></a>
                    <a href="login.html" class="nav-link" id="auth-link">
                        <i class="bi bi-person-circle"></i> <span id="auth-text" class="ms-1 d-none d-md-inline" style="font-size: 0.9rem;">Iniciar Sesión</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <span class="badge-quality mb-3">NUEVO ESTRENO</span>
                <h1 class="hero-title">Dune: Parte Dos</h1>
                <p class="hero-subtitle">Paul Atreides se une a Chani y los Fremen mientras continúa su viaje de venganza contra los conspiradores que destruyeron a su familia.</p>
                <div class="d-flex flex-wrap">
                    <button class="btn btn-mirai"><i class="bi bi-play-fill me-2"></i>Reproducir</button>
                    <button class="btn btn-outline-mirai"><i class="bi bi-info-circle me-2"></i>Más información</button>
                </div>
                <div class="mt-4 d-flex gap-4">
                    <span><i class="bi bi-star-fill rating me-1"></i> 8.5/10</span>
                    <span><i class="bi bi-clock me-1"></i> 2h 46min</span>
                    <span><i class="bi bi-film me-1"></i> Ciencia ficción</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Explorar categorías</h2>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="category-card">
                        <i class="bi bi-film category-icon"></i>
                        <h5>Películas</h5>
                        <p class="text-secondary mb-0">2,500+ títulos</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="category-card">
                        <i class="bi bi-tv category-icon"></i>
                        <h5>Series</h5>
                        <p class="text-secondary mb-0">1,800+ títulos</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="category-card">
                        <i class="bi bi-stars category-icon"></i>
                        <h5>Documentales</h5>
                        <p class="text-secondary mb-0">900+ títulos</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="category-card">
                        <i class="bi bi-emoji-smile category-icon"></i>
                        <h5>Animación</h5>
                        <p class="text-secondary mb-0">1,200+ títulos</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trending Now -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Tendencias</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="movie-card">
                        <img src="https://images.unsplash.com/photo-1531259683007-016a7b628fc3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80" class="movie-img" alt="Movie">
                        <div class="movie-info">
                            <h5 class="movie-title">Oppenheimer</h5>
                            <div class="movie-meta">
                                <span><i class="bi bi-star-fill rating me-1"></i>8.9</span>
                                <span class="badge-quality">4K</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="movie-card">
                        <img src="https://images.unsplash.com/photo-1626814026160-2237a95fc5a0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" class="movie-img" alt="Movie">
                        <div class="movie-info">
                            <h5 class="movie-title">The Last of Us</h5>
                            <div class="movie-meta">
                                <span><i class="bi bi-star-fill rating me-1"></i>9.2</span>
                                <span class="badge-quality">HD</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="movie-card">
                        <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" class="movie-img" alt="Movie">
                        <div class="movie-info">
                            <h5 class="movie-title">John Wick 4</h5>
                            <div class="movie-meta">
                                <span><i class="bi bi-star-fill rating me-1"></i>8.4</span>
                                <span class="badge-quality">4K</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="movie-card">
                        <img src="https://images.unsplash.com/photo-1594909122845-11baa439b7bf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" class="movie-img" alt="Movie">
                        <div class="movie-info">
                            <h5 class="movie-title">The Witcher</h5>
                            <div class="movie-meta">
                                <span><i class="bi bi-star-fill rating me-1"></i>8.1</span>
                                <span class="badge-quality">HD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Continue Watching -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title">Continuar viendo</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="movie-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1925&q=80" class="movie-img" alt="Movie">
                            <div class="progress position-absolute bottom-0 w-100 rounded-0" style="height: 4px;">
                                <div class="progress-bar bg-success" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="movie-info">
                            <h5 class="movie-title">Dune: Parte Dos</h5>
                            <div class="movie-meta">
                                <span>Capítulo 12</span>
                                <span>75%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="movie-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1574267432641-fbcf7f4c7b9c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80" class="movie-img" alt="Movie">
                            <div class="progress position-absolute bottom-0 w-100 rounded-0" style="height: 4px;">
                                <div class="progress-bar bg-success" style="width: 45%"></div>
                            </div>
                        </div>
                        <div class="movie-info">
                            <h5 class="movie-title">Stranger Things</h5>
                            <div class="movie-meta">
                                <span>T4 E8</span>
                                <span>45%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="movie-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" class="movie-img" alt="Movie">
                            <div class="progress position-absolute bottom-0 w-100 rounded-0" style="height: 4px;">
                                <div class="progress-bar bg-success" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="movie-info">
                            <h5 class="movie-title">The Crown</h5>
                            <div class="movie-meta">
                                <span>T5 E10</span>
                                <span>90%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="movie-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1559583109-3e7968136c99?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80" class="movie-img" alt="Movie">
                            <div class="progress position-absolute bottom-0 w-100 rounded-0" style="height: 4px;">
                                <div class="progress-bar bg-success" style="width: 30%"></div>
                            </div>
                        </div>
                        <div class="movie-info">
                            <h5 class="movie-title">The Mandalorian</h5>
                            <div class="movie-meta">
                                <span>T3 E4</span>
                                <span>30%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h3 class="navbar-brand mb-3">MIRAI</h3>
                    <p class="text-secondary">La mejor experiencia de streaming con contenido exclusivo y la más alta calidad.</p>
                    <div class="mt-3">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="mb-3">Navegación</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">Inicio</a></li>
                        <li><a href="#" class="footer-link">Series</a></li>
                        <li><a href="#" class="footer-link">Películas</a></li>
                        <li><a href="#" class="footer-link">Mi lista</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="mb-3">Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">Términos</a></li>
                        <li><a href="#" class="footer-link">Privacidad</a></li>
                        <li><a href="#" class="footer-link">Cookies</a></li>
                        <li><a href="#" class="footer-link">Avisos legales</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Descarga la app</h5>
                    <p class="text-secondary">Disponible para iOS y Android</p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-light"><i class="bi bi-apple me-2"></i>App Store</button>
                        <button class="btn btn-outline-light"><i class="bi bi-google-play me-2"></i>Google Play</button>
                    </div>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="text-center text-secondary pt-3">
                <p class="mb-0">&copy; 2024 Mirai Streaming. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Firebase Auth Status -->
    <script type="module">
        import { auth } from './firebase-config.js';
        import { onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";
        
        const authLink = document.getElementById('auth-link');
        const authText = document.getElementById('auth-text');

        onAuthStateChanged(auth, (user) => {
            if (user) {
                authText.textContent = user.displayName ? 'Hola, ' + user.displayName : 'Mi Cuenta';
                authLink.href = "#";
                authLink.onclick = (e) => {
                    e.preventDefault();
                    if(confirm("¿Deseas cerrar sesión?")) {
                        signOut(auth).then(() => {
                            window.location.reload();
                        });
                    }
                };
            } else {
                authText.textContent = 'Iniciar Sesión';
                authLink.href = 'login.html';
                authLink.onclick = null;
            }
        });
    </script>
</body>
</html>