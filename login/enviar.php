<?php
session_start();
include("../config/database.php"); // Asegúrate de que este archivo tenga una conexión válida con $conn

// Comprobamos si el formulario es para iniciar sesión o registrarse
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'Ingresa') { // Para iniciar sesión
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = "Todos los campos son obligatorios.";
            header("Location: ../index.php");
            exit;
        }

        $stmt = $conn->prepare("SELECT id, username, password, profile_image FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_regenerate_id(true); // Previene ataques de fijación de sesión
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['profile_image'] = $user['profile_image']; // Solo se almacena el nombre, ej. avatar4.png
                header("Location: ../principal/principal.php");
                exit;
            } else {
                $_SESSION['error'] = "Contraseña incorrecta.";
                header("Location: ../index.php");
                exit;
            }
        } else {
            $_SESSION['error'] = "Usuario no encontrado.";
            header("Location: ../index.php");
            exit;
        }
    }
    // Acción de registro
    elseif ($action == 'Registrate') {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $profile_image = trim($_POST['profile_image']); // Este campo debe enviarse desde el formulario (con el nombre, ej. avatar4.png)

        if (empty($username) || empty($email) || empty($password) || empty($profile_image)) {
            $_SESSION['error'] = "Todos los campos son obligatorios.";
            header("Location: ../index.php");
            exit;
        }

        // Validar si el usuario ya existe
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "El usuario ya existe.";
            header("Location: ../index.php");
            exit;
        }

        // Insertar usuario en la base de datos
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, profile_image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password_hash, $profile_image);

        if ($stmt->execute()) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['username'] = $username;
            $_SESSION['profile_image'] = $profile_image;
            header("Location: ../principal/principal.php");
            exit;
        } else {
            $_SESSION['error'] = "Error al registrar el usuario.";
            header("Location: ../index.php");
            exit;
        }
    }
}
?>
