<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LSA - Learn. Study. Achieve</title>
    <link rel="icon" type="image/png" href="../imagenes/Savy.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/principal.css">
    <style>
        body {
            background-color: white;
            margin: 0;
            overflow-x: hidden;
        }
        .sidebar {
            transition: transform 1s ease-in-out;
            overflow-y: auto;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -250px;
                width: 250px;
                height: 100%;
                background: #fff;
                box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.2);
                transition: transform 0.5s ease-in-out;
            }
            .sidebar.open {
                transform: translateX(0px);
                left: 0;
            }

            /* Top Navigation: Hide text and only show icons on small screens */
            .top-nav .nav-right a span {
                display: none; /* Hide the text */
            }

            /* Optional: Add some space for the icons if you want them to be larger */
            .top-nav .nav-right a {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="../imagenes/LogoRectangulo.jpg" alt="Logo LSA">
        </div>
        <a href="inicio.php" target="contentFrame"><i class="fas fa-home"></i><span>INICIO</span></a>
        <a href="opciones.php" target="contentFrame"><i class="fas fa-book"></i><span>OPCIONES EDUCATIVAS</span></a>
        <a href="../materiales/materiales.php" target="contentFrame"><i class="fas fa-folder"></i><span>MATERIALES</span></a>
        <a href="../simulacros/simulacros.php" target="contentFrame"><i class="fas fa-pencil-alt"></i><span>SIMULACROS 2025</span></a>
        <a href="../test/foda.php" target="contentFrame"><i class="fas fa-clipboard-check"></i><span>TESTS DE ORIENTACIÓN</span></a>
        <a href="../mensajes/mensajes.php" target="contentFrame"><i class="fas fa-comments"></i><span>CHAT GRUPAL</span></a>
        <a href="../juegos/juegos.php" target="contentFrame"><i class="fas fa-gamepad"></i><span>JUEGOS</span></a>
        <a href="../mentor/mentor.php" target="contentFrame"><i class="fas fa-user-graduate"></i><span>MENTOR VIRTUAL</span></a>
        <a href="progreso.php" target="contentFrame"><i class="fas fa-chart-line"></i><span>PROGRESO</span></a>
    </div>

    <!-- Top Navigation -->
    <div class="top-nav">
        <div class="toggle-btn">
            <i class="fas fa-bars"></i>
        </div>
        <div class="nav-right">
            <a href="notas.php" target="contentFrame"><i class="fas fa-sticky-note"></i><span>Notas</span></a>
            <a href="notificaciones.php" target="contentFrame"><i class="fas fa-bell"></i><span>Notificaciones</span></a>
            <a href="progreso.php" target="contentFrame"><i class="fas fa-chart-line"></i><span>Progreso</span></a>
            <a href="../perfil/perfil.php" target="contentFrame"><i class="fas fa-user"></i></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <iframe name="contentFrame" src="inicio.php"></iframe>
    </div>

    <!-- Scripts -->
    <script>
        document.querySelector('.toggle-btn').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('open');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        });

        // Close sidebar on menu click in small screens
        document.querySelectorAll('.sidebar a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    document.querySelector('.sidebar').classList.remove('open');
                }
            });
        });

        // Reset sidebar state when switching between screen sizes
        window.addEventListener('resize', function() {
            const sidebar = document.querySelector('.sidebar');
            if (window.innerWidth > 768) {
                sidebar.classList.remove('open');
            }
        });
    </script>
</body>
</html>
