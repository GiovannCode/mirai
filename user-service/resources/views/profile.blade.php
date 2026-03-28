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
    <i class="bi bi-save me-2"></i><span id="saveProfileText">Guardar perfil</span>
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
<p>¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.</p>                    
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
    const API_URL = 'http://localhost:8000/api/users/profiles';
    const AUTH_USER_ID = 1; 

    const fullnameInput = document.getElementById('fullname');
    const emailInput = document.getElementById('email');
    const bioTextarea = document.getElementById('bio');
    const avatarInitialSpan = document.getElementById('avatarInitial');
    const messageArea = document.getElementById('messageArea');
    const saveProfileText = document.getElementById('saveProfileText');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const deleteModalElement = document.getElementById('deleteModal');
    const deleteModal = new bootstrap.Modal(deleteModalElement);

    function showMessage(message, type = 'success') {
        messageArea.innerHTML = `
            <div class="alert alert-${type}" role="alert">
                ${message}
            </div>
        `;
    }

    function updateAvatar() {
        let name = fullnameInput.value.trim();
        avatarInitialSpan.textContent = name ? name.charAt(0).toUpperCase() : '?';
    }

    async function loadProfile() {
        try {
            const response = await fetch(`${API_URL}/${AUTH_USER_ID}`);

            if (response.status === 404) {
                 showMessage('No tienes perfil aún', 'warning');
                saveProfileText.textContent = 'Crear perfil';
            return;
}

            const data = await response.json();

fullnameInput.value = data.full_name || '';
emailInput.value = data.email || '';
bioTextarea.value = data.bio || '';

saveProfileText.textContent = 'Guardar cambios'; 
updateAvatar();
        } catch (error) {
            showMessage('Error al cargar perfil', 'danger');
            console.error(error);
        }
    }

    async function saveProfile() {
        const payload = {
            auth_user_id: AUTH_USER_ID,
            full_name: fullnameInput.value.trim(),
            email: emailInput.value.trim(),
            bio: bioTextarea.value.trim()
        };

        try {
            const check = await fetch(`${API_URL}/${AUTH_USER_ID}`);
            let response;

            if (check.status === 404) {
                response = await fetch(API_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });
            } else {
                response = await fetch(`${API_URL}/${AUTH_USER_ID}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });
            }

            const result = await response.json();

            if (!response.ok) {
                throw new Error(result.message || 'Error al guardar');
            }

            showMessage(result.message, 'success');
            saveProfileText.textContent = 'Guardar cambios';
            updateAvatar();

        } catch (error) {
            showMessage(error.message || 'Error al guardar', 'danger');
            console.error(error);
        }
    }

    async function deleteProfile() {
        try {
            const response = await fetch(`${API_URL}/${AUTH_USER_ID}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (!response.ok) {
                throw new Error(result.message || 'Error al eliminar');
            }

            fullnameInput.value = '';
            emailInput.value = '';
            bioTextarea.value = '';
            saveProfileText.textContent = 'Crear perfil';
            updateAvatar();

showMessage(result.message, 'success');
        } catch (error) {
            showMessage(error.message || 'Error al eliminar', 'danger');
            console.error(error);
        }
    }

    document.getElementById('saveProfileBtn').addEventListener('click', saveProfile);
    document.getElementById('deleteProfileBtn').addEventListener('click', () => {
    deleteModal.show();
});
   

    confirmDeleteBtn.addEventListener('click', async () => {
    deleteModal.hide();
    await deleteProfile();
});
 fullnameInput.addEventListener('input', updateAvatar);
    loadProfile();
</script>
</body>

</html>