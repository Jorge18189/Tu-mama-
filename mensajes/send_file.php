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
    $receiver_id = $_POST['receiver_id'] ? intval($_POST['receiver_id']) : null;
    $is_group_message = $receiver_id ? 0 : 1; // Si no hay receiver_id, es un mensaje grupal

    // Allowed file types
    $allowed_types = [
        'application/pdf', 
        'image/jpeg', 
        'image/png', 
        'image/gif', 
        'application/msword', 
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'video/mp4', 
        'video/x-msvideo', 
        'video/x-matroska', 
        'video/webm', 
        'video/avi', 
        'video/mpeg',
        'audio/mpeg', 
        'audio/wav', 
        'audio/ogg', 
        'audio/mp4', 
        'audio/x-wav', 
        'audio/3gpp'
    ];
    
    $max_file_size = 10 * 1024 * 1024; // 10 MB

    if ($file['size'] > $max_file_size) {
        echo json_encode([
            "success" => false, 
            "error" => "Archivo demasiado grande. Máximo 10MB."
        ]);
        exit;
    }

    if (!in_array($file['type'], $allowed_types)) {
        echo json_encode([
            "success" => false, 
            "error" => "Tipo de archivo no permitido."
        ]);
        exit;
    }

    $upload_dir = '../uploads/files/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Generar un nombre único para evitar colisiones
    $file_name = uniqid() . '_' . basename($file['name']);
    $file_path = $upload_dir . $file_name;

    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        // Preparar la consulta SQL según si es mensaje grupal o privado
        if ($is_group_message) {
            $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, file_path, file_name, file_type, is_group_message) VALUES (?, NULL, ?, ?, ?, 1)");
            $stmt->bind_param("isss", $sender_id, $file_path, $file['name'], $file['type']);
        } else {
            $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, file_path, file_name, file_type, is_group_message) VALUES (?, ?, ?, ?, ?, 0)");
            $stmt->bind_param("iisss", $sender_id, $receiver_id, $file_path, $file['name'], $file['type']);
        }

        if ($stmt->execute()) {
            // Devolver información adicional para el frontend
            echo json_encode([
                "success" => true, 
                "file_name" => $file['name'],
                "file_path" => $file_path,
                "file_type" => $file['type'],
                "file_size" => $file['size'],
                "message_id" => $conn->insert_id
            ]);
        } else {
            // Si hay error al insertar en la base de datos, eliminar el archivo
            unlink($file_path);
            echo json_encode([
                "success" => false, 
                "error" => "Error al guardar archivo en la base de datos: " . $conn->error
            ]);
        }
    } else {
        echo json_encode([
            "success" => false, 
            "error" => "Error al subir archivo al servidor."
        ]);
    }
} else {
    echo json_encode([
        "success" => false, 
        "error" => "Falta el archivo o el ID del destinatario."
    ]);
}
?>