<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Mirai</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>

<body>

    <div class="register-card">

        <div class="brand">
            <h1>MIRAI</h1>
            <p>Únete al futuro del streaming</p>
        </div>

        <form method="POST" action="">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <input type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="Juan Pérez"
                    required>

                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
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

            <!-- Confirm password -->
            <div class="mb-3">
                <label class="form-label">Confirmar contraseña</label>
                <input type="password"
                    name="password_confirmation"
                    class="form-control"
                    required>
            </div>

            <!-- Fecha nacimiento -->
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento (opcional)</label>
                <input type="date"
                    name="birthdate"
                    class="form-control"
                    value="{{ old('birthdate') }}">
            </div>

            <!-- Plan -->
            <div class="mb-3">
                <label class="form-label">Plan</label>
                <select name="plan" class="form-select">
                    <option value="basico">Básico</option>
                    <option value="estandar" selected>Estándar</option>
                    <option value="premium">Premium</option>
                </select>
            </div>

            <!-- Terms -->
            <div class="mb-3 form-check">
                <input type="checkbox"
                    name="terms"
                    class="form-check-input"
                    required>

                <label class="form-check-label">
                    Acepto términos y condiciones
                </label>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-register">
                <i class="bi bi-person-plus-fill me-2"></i>Crear cuenta
            </button>
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

            <div class="login-link">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
            </div>
        </form>
    </div>

</body>

</html>