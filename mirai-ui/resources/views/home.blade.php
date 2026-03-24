@extends('layouts.app')

@section('styles')
<style>
    /* TODO tu CSS aquí */
</style>
@endsection

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <span class="badge-quality mb-3">BIENVENIDO A MIRAI</span>
            <h1 class="hero-title">Disfruta del mejor streaming</h1>
            <p class="hero-subtitle">Accede a miles de películas y series en 4K, sin límites y con contenido exclusivo.</p>

            <div class="d-flex flex-wrap">
                <a href="{{ route('register') }}" class="btn btn-mirai">
                    <i class="bi bi-pencil-square me-2"></i>Registrarse
                </a>

                <a href="{{ route('login') }}" class="btn btn-outline-mirai">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Inicio de sesión
                </a>
            </div>

            <div class="info-items">
                <div class="info-item">
                    <i class="bi bi-star-fill rating"></i>
                    <span>+2,500 títulos</span>
                </div>
                <div class="info-item">
                    <i class="bi bi-film"></i>
                    <span>4K Ultra HD</span>
                </div>
                <div class="info-item">
                    <i class="bi bi-globe"></i>
                    <span>Multi-idioma</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection