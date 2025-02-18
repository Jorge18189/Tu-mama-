<?php
session_start();
include("../config/database.php"); // Asegúrate de tener este archivo de conexión a la base de datos

// Comprobamos si el formulario es para iniciar sesión o registrarse
if (isset($_POST['action'])) {
    // Acción de iniciar sesión
    if ($_POST['action'] == 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validar datos del usuario
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verificar la contraseña
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: ../principal/principal.php");
                exit;
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "Usuario no encontrado";
        }
    }

    // Acción de registro
    elseif ($_POST['action'] == 'register') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Verificar si el usuario ya existe
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "El usuario ya existe";
        } else {
            // Insertar nuevo usuario
            $password_hash = password_hash($password, PASSWORD_DEFAULT); // Cifrado de la contraseña
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $password_hash);
            if ($stmt->execute()) {
                $_SESSION['user_id'] = $conn->insert_id;
                $_SESSION['username'] = $username;
                header("Location: ../principal/principal.php");
                exit;
            } else {
                echo "Error al registrar el usuario";
            }
        }
    }
}

// Verificamos si el usuario está logueado, de lo contrario lo redirigimos al login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}

// Obtener los datos del usuario desde la base de datos
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LSA - Learn. Study. Achieve</title>
    <link rel="stylesheet" href="../css/perfil.css">

    <link rel="icon" type="image/png" href="../imagenes/Savy.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="user-info">
            <div id="userImage">
                <img src="../imagenes/Savy.png" alt="Foto de usuario" class="user-image">
                <h2 class="user-name">¡Hola, <?php echo $user['username']; ?>!</h2>
                <p class="user-greeting">Bienvenido a tu perfil</p>
            </div>

            <div id="userData" class="user-data">
                <h2>Tus Datos Personales</h2>
                <div class="form-group">
                    <label>Usuario:</label>
                    <p><?php echo $user['username']; ?></p>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <p><?php echo $user['email']; ?></p>
                </div>
                <div class="form-group">
                    <label>Contraseña:</label>
                    <div class="password-container" style="position: relative; display: flex; align-items: center;">
                        <p id="currentPassword" style="margin: 0;">
                            <span id="passwordText">********</span>
                            <span id="actualPassword" style="display: none;"><?php echo $user['password']; ?></span>
                        </p>
                        <button type="button" 
                                onclick="toggleCurrentPassword()" 
                                style="margin-left: 10px; background: none; border: none; cursor: pointer;">
                            <svg xmlns="https://www.w3.org/2000/svg" 
                                 width="20" 
                                 height="20" 
                                 viewBox="0 0 24 24" 
                                 fill="none" 
                                 stroke="currentColor" 
                                 stroke-width="2" 
                                 stroke-linecap="round" 
                                 stroke-linejoin="round" 
                                 id="currentEyeIcon">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                                <line x1="1" y1="1" x2="23" y2="23" class="current-eye-slash" style="display: none;"></line>
                            </svg>
                        </button>
                    </div>
                </div>
                <button class="btn-submit" onclick="showSection('userImage')">Volver</button>
            </div>

            <div id="updateForm" class="user-data">
                <h2>Actualizar Datos</h2>
                <form method="POST" onsubmit="return validateForm()">
                    <input type="hidden" name="action" value="update">
                    <div class="form-group">
                        <label>Nuevo Usuario:</label>
                        <input type="text" name="newUsername" value="<?php echo $user['username']; ?>" minlength="2" maxlength="8" required >
                    </div>
                    <div class="form-group">
                        <label>Nuevo Email:</label>
                        <input type="email" name="newEmail" value="<?php echo $user['email']; ?>" minlength="6" maxlength="120" pattern="[a-z0-9._%+\-]+@(gmail\.com|yahoo\.com|outlook\.com|hotmail\.com)" title="Por favor, ingresa un correo electrónico válido. Ejemplo: usuario@gmail.com" required >
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Nueva Contraseña:</label>
                        <div class="password-container" style="position: relative; display: flex; align-items: center;">
                            <input type="password" id="newPassword" name="newPassword" value="" style="width: 100%; padding-right: 30px;" minlength="8" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe de tener entre 8 y 16 caracteres, una mayuscula, una minuscula y un número" required>
                            <button type="button" onclick="togglePassword('newPassword', 'newPasswordEyeIcon')" style="position: absolute; right: 10px; background: none; border: none; cursor: pointer;">
                                <svg xmlns="https://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="newPasswordEyeIcon">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <line x1="1" y1="1" x2="23" y2="23" style="display: none;"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn-submit">Guardar</button>
                        <button type="button" class="btn-submit" onclick="showSection('userImage')">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="account-options">
            <div class="option-container" onclick="showSection('userData')">
                <i class="fa-solid fa-folder-open"></i>
                <div>
                    <h3 class="option-title">Datos Personales</h3>
                    <p class="option-description">Revisa tus datos personales.</p>
                </div>
            </div>

            <div class="option-container" onclick="showSection('updateForm')">
                <i class="fa-solid fa-key"></i>
                <div>
                    <h3 class="option-title">Cambiar Datos</h3>
                    <p class="option-description">Modifica tu nombre de usuario, correo y contraseña.</p>
                </div>
            </div>

            <div class="option-container" onclick="showDeleteModal()">
                <i class="fa-solid fa-trash"></i>
                <div>
                    <h3 class="option-title">Borrar Cuenta</h3>
                    <p class="option-description">Elimina tu cuenta permanentemente y todos tus datos.</p>
                </div>
            </div>

            <div class="option-container" onclick="logout()">
                <i class="fa-solid fa-arrow-right"></i>
                <div>
                    <h3 class="option-title">Cerrar Sesión</h3>
                    <p class="option-description">Finaliza tu sesión y sal de tu cuenta.</p>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword(inputId, iconId) {
            const passwordField = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            icon.querySelector('path').style.display = type === 'password' ? 'none' : 'inline';
        }
        
        function toggleCurrentPassword() {
            const passwordText = document.getElementById('passwordText');
            const actualPassword = document.getElementById('actualPassword');
            const eyeIcon = document.getElementById('currentEyeIcon');
            
            if (passwordText.style.display === 'none') {
                passwordText.style.display = 'inline';
                actualPassword.style.display = 'none';
                eyeIcon.querySelector('path').style.display = 'none';
            } else {
                passwordText.style.display = 'none';
                actualPassword.style.display = 'inline';
                eyeIcon.querySelector('path').style.display = 'inline';
            }
        }
        
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.user-data');
            sections.forEach(section => {
                section.style.display = 'none';
            });

            document.getElementById(sectionId).style.display = 'block';
        }
        
        function showDeleteModal() {
            if (confirm("¿Seguro que quieres eliminar tu cuenta? Esto es irreversible.")) {
                window.location.href = "deleteAccount.php"; // Página para eliminar cuenta
            }
        }
        
        function logout() {
    window.top.location.href = "../login/logout.php"; // Redirige fuera del iframe
}

    </script>
</body>
</html>
