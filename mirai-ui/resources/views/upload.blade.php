<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Video | Mirai</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
</head>

<body>
    <div class="upload-card">
        <div class="brand">
            <h1>MIRAI</h1>
            <p>Sube tu película o serie</p>
        </div>

        <!-- Área de mensajes de error/éxito -->
        <div id="messageArea"></div>

        <form action="" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf

            <div class="mb-4">
                <label class="form-label">Selecciona el archivo de video</label>
                <div class="file-input-area" id="dropZone">
                    <i class="bi bi-cloud-upload"></i>
                    <p>Arrastra y suelta tu video aquí</p>
                    <p class="small-text">o haz clic para seleccionar</p>
                    <input type="file" name="video" id="fileInput" accept="video/*" required>
                </div>
                <div class="preview-container" id="previewContainer">
                    <div class="file-info">
                        <i class="bi bi-file-earmark-play"></i>
                        <div>
                            <strong id="fileName"></strong><br>
                            <small id="fileSize" class="text-secondary"></small>
                        </div>
                    </div>
                </div>
                <div class="form-text text-secondary mt-2">
                    Formatos permitidos: MP4, AVI, MOV, MKV (máx. 2GB)
                </div>
            </div>

            <button type="submit" class="btn-gradient">
                <i class="bi bi-upload me-2"></i>Subir video
            </button>
        </form>

        <div class="mt-4 text-center">
            <small class="text-secondary">
                <i class="bi bi-info-circle"></i> Al subir aceptas nuestras políticas de contenido.
            </small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Elementos
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileInput');
        const previewContainer = document.getElementById('previewContainer');
        const fileNameSpan = document.getElementById('fileName');
        const fileSizeSpan = document.getElementById('fileSize');
        const messageArea = document.getElementById('messageArea');
        const uploadForm = document.getElementById('uploadForm');

        // Función para mostrar mensajes (como en el perfil)
        function showMessage(message, type = 'danger') {
            const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
            messageArea.innerHTML = `
                <div class="alert alert-custom ${alertClass} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            // Auto-cerrar después de 4 segundos
            setTimeout(() => {
                const alert = messageArea.querySelector('.alert');
                if (alert) alert.classList.remove('show');
                setTimeout(() => {
                    messageArea.innerHTML = '';
                }, 300);
            }, 5000);
        }

        // Manejar selección de archivo
        function handleFile(file) {
            if (!file) return;

            // Validar tipo (simplificado)
            const allowedTypes = ['video/mp4', 'video/quicktime', 'video/x-msvideo', 'video/x-matroska'];
            if (!allowedTypes.includes(file.type) && !file.name.match(/\.(mp4|avi|mov|mkv)$/i)) {
                showMessage('Formato de archivo no soportado. Por favor selecciona un video (MP4, AVI, MOV, MKV).', 'danger');
                fileInput.value = '';
                previewContainer.classList.remove('active');
                return;
            }

            // Validar tamaño (máx 2GB = 2*1024*1024*1024 bytes)
            const maxSize = 2 * 1024 * 1024 * 1024;
            if (file.size > maxSize) {
                showMessage('El archivo excede el tamaño máximo de 2GB.', 'danger');
                fileInput.value = '';
                previewContainer.classList.remove('active');
                return;
            }

            // Mostrar previsualización
            fileNameSpan.textContent = file.name;
            const sizeMB = (file.size / (1024 * 1024)).toFixed(2);
            fileSizeSpan.textContent = `${sizeMB} MB`;
            previewContainer.classList.add('active');
        }

        // Click en el área -> abrir selector de archivos
        dropZone.addEventListener('click', () => fileInput.click());

        // Cuando se selecciona un archivo manualmente
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length) {
                handleFile(e.target.files[0]);
            } else {
                previewContainer.classList.remove('active');
            }
        });

        // Drag & drop
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = '#667eea';
            dropZone.style.backgroundColor = 'rgba(102, 126, 234, 0.05)';
        });

        dropZone.addEventListener('dragleave', (e) => {
            dropZone.style.borderColor = 'rgba(102, 126, 234, 0.5)';
            dropZone.style.backgroundColor = 'rgba(0,0,0,0.3)';
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = 'rgba(102, 126, 234, 0.5)';
            dropZone.style.backgroundColor = 'rgba(0,0,0,0.3)';
            const files = e.dataTransfer.files;
            if (files.length) {
                fileInput.files = files;
                handleFile(files[0]);
            }
        });

        // Prevenir envío si no hay archivo
        uploadForm.addEventListener('submit', (e) => {
            if (!fileInput.files.length) {
                e.preventDefault();
                showMessage('Por favor selecciona un archivo de video.', 'danger');
            }
        });
        // Si hay errores de Laravel, los mostramos como mensajes (simulamos con errores de ejemplo)
        // En este HTML puro, si quisieras mostrar errores provenientes del backend, podrías pasar la variable $errors
        // Pero aquí es solo frontend. Si el formulario se envía y hay errores, el servidor redirigirá y podrías mostrar.
        // Para mantener la coherencia, puedes agregar un script que lea errores de la URL o de un campo oculto.
        // A modo de ejemplo, si la página recibe errores en la sesión (por redirección), podrías mostrarlos:
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');
        if (error) {
            showMessage(decodeURIComponent(error), 'danger');
        }
        const success = urlParams.get('success');
        if (success) {
            showMessage(decodeURIComponent(success), 'success');
        }
    </script>
</body>

</html>