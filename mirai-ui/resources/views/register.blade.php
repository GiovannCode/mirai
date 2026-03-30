<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mirai - Registro</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0b0b0b;
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Ambient Background (Netflix-Inspired Movie Mosaic) */
        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Movie mosaic background */
            background-image: url('https://assets.nflxext.com/ffe/siteui/vlv3/ca6a7616-0acb-4bc5-be25-c4deef0419a7/c5af601a-6657-4531-8f82-22e629a3795e/MX-es-20231211-popsignuptwoweeks-perspective_alpha_website_large.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.25;
            z-index: -3;
        }

        .netflix-vignette {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Deeper vignette to make the card POP */
            background: radial-gradient(circle at center, rgba(11, 11, 11, 0.4) 0%, rgba(11, 11, 11, 0.8) 60%, #0b0b0b 100%);
            z-index: -2;
            pointer-events: none;
        }

        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(102, 126, 234, 0.15) 0%, rgba(0,0,0,0) 50%),
                        radial-gradient(circle at 80% 20%, rgba(118, 75, 162, 0.15) 0%, rgba(0,0,0,0) 40%);
            z-index: -1;
            animation: pulseBg 15s infinite alternate;
        }

        @keyframes pulseBg {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        .auth-card {
            background: rgba(20, 20, 20, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            font-weight: 800;
            font-size: 2.5rem;
            letter-spacing: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin-bottom: 0.5rem;
            display: block;
            text-decoration: none;
        }

        .auth-title {
            text-align: center;
            font-weight: 600;
            color: #e0e0e0;
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
        }

        .form-control {
            background: rgba(0, 0, 0, 0.45) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #fff !important;
            padding: 0.8rem 1.2rem !important;
            border-radius: 12px !important;
            transition: all 0.3s ease;
            height: auto !important;
        }

        .form-control:focus {
            background: rgba(0, 0, 0, 0.6) !important;
            border-color: #667eea !important;
            color: #fff !important;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25) !important;
        }

        .form-floating label {
            color: #6c757d;
            padding-left: 1.2rem;
        }

        .btn-mirai {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-top: 1rem;
        }

        .btn-mirai:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
            color: white;
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .auth-links {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.95rem;
            color: #a0a0a0;
        }

        .auth-links a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .auth-links a:hover {
            color: #764ba2;
        }

        #alert-container {
            display: none;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="netflix-vignette"></div>

    <div class="auth-card">
        <a href="{{ url('/') }}" class="brand-logo">MIRAI</a>
        <h2 class="auth-title">Crea una cuenta nueva</h2>

        <div id="alert-container" class="alert alert-danger" role="alert">
            <!-- Mensajes de error aquí -->
        </div>

        <form id="register-form">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" placeholder="Tu nombre" required>
                <label for="name">Nombre completo</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                <label for="email">Correo electrónico</label>
            </div>
            
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" placeholder="Password" required minlength="6">
                <label for="password">Contraseña (Mínimo 6 caracteres)</label>
            </div>

            <button type="submit" class="btn btn-mirai" id="submit-btn">
                <span class="spinner-border spinner-border-sm d-none" id="spinner" role="status" aria-hidden="true"></span>
                <span>Registrarse</span>
            </button>
        </form>

        <div class="d-flex align-items-center my-4">
            <hr class="flex-grow-1 border-secondary opacity-25">
            <span class="mx-3 text-secondary" style="font-size: 0.85rem; font-weight: 500;">O continuar con</span>
            <hr class="flex-grow-1 border-secondary opacity-25">
        </div>

        <button type="button" class="btn btn-outline-light w-100" id="google-btn" style="font-weight: 600; border-radius: 12px; padding: 10px; transition: all 0.3s ease;">
            <i class="bi bi-google me-2" style="color: #ea4335;"></i> Google
        </button>

        <div class="auth-links">
            ¿Ya tienes una cuenta? <a href="{{ url('/login') }}">Inicia sesión</a>
        </div>
    </div>

    <!-- Firebase Auth Logic -->
    <script type="module">
        import { auth } from "{{ asset('js/firebase-config.js') }}";
        import { createUserWithEmailAndPassword, updateProfile, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";

        const registerForm = document.getElementById('register-form');
        const alertContainer = document.getElementById('alert-container');
        const submitBtn = document.getElementById('submit-btn');
        const spinner = document.getElementById('spinner');

        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Loading state
            submitBtn.disabled = true;
            spinner.classList.remove('d-none');
            alertContainer.style.display = 'none';

            try {
                // Crear usuario
                const userCredential = await createUserWithEmailAndPassword(auth, email, password);
                
                // Actualizar perfil con el nombre
                await updateProfile(userCredential.user, {
                    displayName: name
                });

                // Registro exitoso, redirigir al inicio
                window.location.href = "{{ route('peliculas') }}";
            } catch (error) {
                console.error("Error registering:", error);
                let errorMsg = 'Firebase dice: ' + error.message;
                
                if (error.code === 'auth/email-already-in-use') {
                    errorMsg = 'Este correo ya está registrado.';
                } else if (error.code === 'auth/invalid-email') {
                    errorMsg = 'El formato del correo es inválido.';
                } else if (error.code === 'auth/weak-password') {
                    errorMsg = 'La contraseña debe tener al menos 6 caracteres.';
                }

                alertContainer.textContent = errorMsg;
                alertContainer.style.display = 'block';
            } finally {
                // Restore state
                submitBtn.disabled = false;
                spinner.classList.add('d-none');
            }
        });

        // Google Auth
        const googleBtn = document.getElementById('google-btn');
        const provider = new GoogleAuthProvider();

        googleBtn.addEventListener('click', async () => {
            alertContainer.style.display = 'none';
            googleBtn.disabled = true;

            try {
                await signInWithPopup(auth, provider);
                window.location.href = "{{ route('peliculas') }}";
            } catch (error) {
                console.error("Error registering with Google:", error);
                let errorMsg = 'Error al registrarse con Google. Intenta nuevamente.';
                if (error.code === 'auth/popup-closed-by-user') {
                    errorMsg = 'Registro cancelado.';
                }
                alertContainer.textContent = errorMsg;
                alertContainer.style.display = 'block';
            } finally {
                googleBtn.disabled = false;
            }
        });
    </script>
</body>
</html>