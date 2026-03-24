<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Perfil | Mirai</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>

<body>

    <div class="profile-card">
        <div class="brand">
            <h1>MIRAI</h1>
            <p>Gestión de perfil</p>
        </div>

        <div class="avatar-section">
            <div class="avatar-circle" id="avatarInitial">U</div>
        </div>

        <div id="messageArea"></div>

        <form id="profileForm">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="text" class="form-control" id="fullname" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" class="form-control" id="email" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Biografía</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-chat-text-fill"></i></span>
                    <textarea class="form-control" id="bio" rows="3" style="resize: none;"></textarea>
                </div>
            </div>

            
         

            <div class="d-flex flex-wrap gap-3 mt-4">
                <button type="button" class="btn btn-gradient" id="saveProfileBtn">
                    <i class="bi bi-save me-2"></i>Guardar perfil
                </button>
                <button type="button" class="btn btn-outline-danger" id="deleteProfileBtn">
                    <i class="bi bi-trash me-2"></i>Eliminar cuenta
                </button>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar cuenta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro?</p>
                    <input type="text" class="form-control" id="confirmDeleteInput">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const PROFILE_KEY = 'mirai_user_profile';

        const fullnameInput = document.getElementById('fullname');
        const emailInput = document.getElementById('email');
        const bioTextarea = document.getElementById('bio');
        const planSelect = document.getElementById('plan');
        const avatarInitialSpan = document.getElementById('avatarInitial');
        const messageArea = document.getElementById('messageArea');

        function updateAvatar() {
            let name = fullnameInput.value.trim();
            avatarInitialSpan.textContent = name ? name.charAt(0).toUpperCase() : '?';
        }

        function loadProfile() {
            const stored = localStorage.getItem(PROFILE_KEY);
            if (stored) {
                const profile = JSON.parse(stored);
                fullnameInput.value = profile.fullname || '';
                emailInput.value = profile.email || '';
                bioTextarea.value = profile.bio || '';
                planSelect.value = profile.plan || 'estandar';
                updateAvatar();
            }
        }

        function saveProfile() {
            const profile = {
                fullname: fullnameInput.value,
                email: emailInput.value,
                bio: bioTextarea.value,
                plan: planSelect.value
            };
            localStorage.setItem(PROFILE_KEY, JSON.stringify(profile));
            updateAvatar();
        }

        document.getElementById('saveProfileBtn').addEventListener('click', saveProfile);
        document.getElementById('deleteProfileBtn').addEventListener('click', () => {
            localStorage.removeItem(PROFILE_KEY);
            location.reload();
        });

        fullnameInput.addEventListener('input', updateAvatar);

        loadProfile();
    </script>

</body>

</html>