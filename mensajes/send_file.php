<?php
session_start();
include("../config/database.php");

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "error" => "No estás autenticado."]);
    exit;
}

if (isset($_FILES['file']) && isset($_POST['receiver_id'])) {
    $file = $_FILES['file'];
    $sender_id = $_SESSION['user_id'];
    $receiver_id = $_POST['receiver_id'] ?: null;

    // Allowed file types
    $allowed_types = [
        'application/pdf', 
        'image/jpeg', 
        'image/png', 
        'image/gif', 
        'application/msword', 
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    $max_file_size = 10 * 1024 * 1024; // 10 MB

    if ($file['size'] > $max_file_size) {
        echo json_encode(["success" => false, "error" => "Archivo demasiado grande. Máximo 10MB."]);
        exit;
    }

    if (!in_array($file['type'], $allowed_types)) {
        echo json_encode(["success" => false, "error" => "Tipo de archivo no permitido."]);
        exit;
    }

    $upload_dir = '../uploads/files/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $file_name = uniqid() . '_' . basename($file['name']);
    $file_path = $upload_dir . $file_name;

    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, file_path, file_name, file_type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $sender_id, $receiver_id, $file_path, $file['name'], $file['type']);

        if ($stmt->execute()) {
            echo json_encode([
                "success" => true, 
                "file_name" => $file['name']
            ]);
        } else {
            unlink($file_path);
            echo json_encode(["success" => false, "error" => "Error al guardar archivo."]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "Error al subir archivo."]);
    }
}
?>