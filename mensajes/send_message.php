<?php
session_start();
include("../config/database.php");

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $sender_id = $_SESSION['user_id'];
    $receiver_id = isset($_POST['receiver_id']) ? $_POST['receiver_id'] : null;

    // Validar que el mensaje no esté vacío
    if (empty($message)) {
        echo json_encode(["success" => false, "error" => "El mensaje no puede estar vacío."]);
        exit;
    }

    // Insertar mensaje en la base de datos
    if ($receiver_id) {
        // Mensaje directo
        $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $sender_id, $receiver_id, $message);
    } else {
        // Mensaje grupal
        $stmt = $conn->prepare("INSERT INTO messages (sender_id, message, is_group_message) VALUES (?, ?, TRUE)");
        $stmt->bind_param("is", $sender_id, $message);
    }

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
} else {
    echo json_encode(["success" => false, "error" => "No se recibió ningún mensaje."]);
}
?>