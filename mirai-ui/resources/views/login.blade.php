<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Mirai</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <style>

    </style>
</head>

<body>

    <div class="login-card">

        <div class="brand">
            <h1>MIRAI</h1>
            <p>Bienvenido de nuevo</p>
        </div>

        {{-- 👇 aquí puedes conectar auth-service después --}}
        <form method="POST" action="">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Correo electrónico o usuario</label>

                <input type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="tu@email.com"
                    required>

                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Contraseña</label>

                <input type="password"
                    name="password"
                    class="form-control"
                    required>

                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Remember -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember">
                    <label class="form-check-label">Recordarme</label>
                </div>

                <a href="#" style="color:#667eea; text-decoration:none;">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-login mb-3">
                <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar sesión
            </button>

        </form>

        <div class="divider">
            <span>O continúa con</span>
        </div>

        <div class="d-flex gap-3">
            <button type="button" class="btn btn-google w-50">
                <i class="bi bi-google me-2"></i>Google
            </button>
            <button type="button" class="btn btn-facebook w-50">
                <i class="bi bi-facebook me-2"></i>Facebook
            </button>
        </div>

        <div class="register-link">
            ¿No tienes cuenta? <a href="#">Regístrate gratis</a>
        </div>
    </div>

</body>

</html>