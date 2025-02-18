<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/inicio.css">
</head>
<body>
    <h2 class="section-title">Información Nueva</h2>
    <div class="announcements-grid">
        <a href="../pdf/convocatoriaunam.pdf" target="_blank" class="announcement-card unam-card">
            <div class="announcement-content">
                <h3 class="announcement-title">Convocatoria UNAM</h3>
                <p class="announcement-text">Conoce todos los detalles del proceso de admisión UNAM</p>
                <span class="announcement-button">Ver PDF</span>
            </div>
        </a>
        <a href="https://www.admision.ipn.mx/nse/convocatoria/index.html" target="_blank" class="announcement-card ipn-card">
    <div class="announcement-content">
        <h3 class="announcement-title">Convocatoria IPN</h3>
        <p class="announcement-text">Información completa sobre el proceso de admisión IPN</p>
        <span class="announcement-button">Ver más</span>
    </div>
</a>
    </div>

    <h2 class="section-title">Clases</h2>
    <div class="grid-container">
        <!-- Card 1 -->
        <div class="card">
            <button class="info-button">i</button>
            <div class="card-icon-container blue-bg">
                <svg class="icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,3L1,9L12,15L21,10.09V17H23V9M5,13.18V17.18L12,21L19,17.18V13.18L12,17L5,13.18Z"/>
                </svg>
            </div>
            <h3 class="card-title">Programas Académicos</h3>
            <div class="info-content">
                Explora nuestra variedad de programas y carreras disponibles
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card">
            <button class="info-button">i</button>
            <div class="card-icon-container green-bg">
                <svg class="icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,15C7.58,15 4,16.79 4,19V21H20V19C20,16.79 16.42,15 12,15M8,9A4,4 0 0,0 12,13A4,4 0 0,0 16,9M11.5,2C11.2,2 11,2.21 11,2.5V5.5H10V3C10,3 7.75,3.86 7.75,6.75C7.75,7.37 8.25,7.87 8.87,7.87C9.5,7.87 10,7.37 10,6.75V5.5H11V6.75C11,7.37 11.5,7.87 12.12,7.87C12.75,7.87 13.25,7.37 13.25,6.75C13.25,3.86 11,3 11,3V2.5C11,2.21 10.8,2 10.5,2H11.5Z"/>
                </svg>
            </div>
            <h3 class="card-title">Becas y Ayuda Financiera</h3>
            <div class="info-content">
                Información sobre becas, préstamos y opciones de financiamiento
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card">
            <button class="info-button">i</button>
            <div class="card-icon-container purple-bg">
                <svg class="icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,2L14,6.5V17.5L19,13V2M6.5,5C4.55,5 2.45,5.4 1,6.5V21.16C1,21.41 1.25,21.66 1.5,21.66C1.6,21.66 1.65,21.59 1.75,21.59C3.1,20.94 5.05,20.5 6.5,20.5C8.45,20.5 10.55,20.9 12,22C13.35,21.15 15.8,20.5 17.5,20.5C19.15,20.5 20.85,20.81 22.25,21.56C22.35,21.61 22.4,21.59 22.5,21.59C22.75,21.59 23,21.34 23,21.09V6.5C22.4,6.05 21.75,5.75 21,5.5V19C19.9,18.65 18.7,18.5 17.5,18.5C15.8,18.5 13.35,19.15 12,20V6.5C10.55,5.4 8.45,5 6.5,5Z"/>
                </svg>
            </div>
            <h3 class="card-title">Recursos de Aprendizaje</h3>
            <div class="info-content">
                Accede a bibliotecas, materiales y recursos educativos
            </div>
        </div>

        <!-- Card 4 -->
        <div class="card">
            <button class="info-button">i</button>
            <div class="card-icon-container red-bg">
                <svg class="icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z"/>
                </svg>
            </div>
            <h3 class="card-title">Calendario Académico</h3>
            <div class="info-content">
                Consulta fechas importantes y planifica tu año escolar
            </div>
        </div>

        <!-- Card 5 -->
        <div class="card">
            <button class="info-button">i</button>
            <div class="card-icon-container yellow-bg">
                <svg class="icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"/>
                </svg>
            </div>
            <h3 class="card-title">Programas Internacionales</h3>
            <div class="info-content">
                Descubre oportunidades de estudio en el extranjero
            </div>
        </div>

        <!-- Card 6 -->
        <div class="card">
            <button class="info-button">i</button>
            <div class="card-icon-container pink-bg">
                <svg class="icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z"/>
                </svg>
            </div>
            <h3 class="card-title">Vida Estudiantil</h3>
            <div class="info-content">
                Conoce las actividades y grupos estudiantiles disponibles
            </div>
        </div>

        <!-- Card 7 -->
        <div class="card">
            <button class="info-button">i</button>
            <div class="card-icon-container indigo-bg">
                <svg class="icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M20.2,2H19.5H18C17.1,2 16,3 16,4H8C8,3 6.9,2 6,2H4.5H3.8H2V11C2,12 3,13 4,13H6.2C6.6,15 7.9,16.7 11,17V19.1C8.8,19.3 8,20.4 8,21.7V22H16V21.7C16,20.4 15.2,19.3 13,19.1V17C16.1,16.7 17.4,15 17.8,13H20C21,13 22,12 22,11V2H20.2M4,11V4H6V6V11C5.1,11 4.3,11 4,11M20,11C19.7,11 18.9,11 18,11V6V4H20V11Z"/>
                </svg>
            </div>
            <h3 class="card-title">Logros Académicos</h3>
            <div class="info-content">
                Información sobre reconocimientos y certificaciones
            </div>
        </div>

        <!-- Card 8 -->
        <div class="card">
            <button class="info-button">i</button>
            <div class="card-icon-container orange-bg">
                <svg class="icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"/>
                </svg>
            </div>
            <h3 class="card-title">Bienestar Estudiantil</h3>
            <div class="info-content">
                Servicios de apoyo y recursos para tu bienestar
            </div>
        </div>

        <!-- Card 9 -->
        <div class="card">
            <button class="info-button">i</button>
            <div class="card-icon-container teal-bg">
                <svg class="icon" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12,18H6V14H12M21,14V12L20,7H4L3,12V14H4V20H14V14H18V20H20V14M20,4H4V6H20V4Z"/>
                </svg>
            </div>
            <h3 class="card-title">Servicios Universitarios</h3>
            <div class="info-content">
                Accede a todos los servicios disponibles para estudiantes
            </div>
        </div>
    </div>
    <script>
        let activeTimeout = null;
        let activeButton = null;

        const showTooltip = (button) => {
            // Si hay un tooltip activo, ocultarlo
            if (activeButton) {
                const oldContent = activeButton.parentElement.querySelector('.info-content');
                oldContent.classList.remove('active');
                activeButton.style.borderColor = '#ccc';
                activeButton.style.color = '#666';
            }

            // Limpiar cualquier timeout existente
            if (activeTimeout) {
                clearTimeout(activeTimeout);
            }

            // Mostrar el nuevo tooltip
            const infoContent = button.parentElement.querySelector('.info-content');
            infoContent.classList.add('active');
            button.style.borderColor = '#2196F3';
            button.style.color = '#2196F3';
            
            // Guardar el botón activo
            activeButton = button;

            // Configurar el timeout para ocultar después de 4 segundos
            activeTimeout = setTimeout(() => {
                infoContent.classList.remove('active');
                button.style.borderColor = '#ccc';
                button.style.color = '#666';
                activeButton = null;
            }, 4000);
        };

        // Agregar evento click a cada botón
        document.querySelectorAll('.info-button').forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation();
                showTooltip(button);
            });
        });
    </script>
</body>
</html>