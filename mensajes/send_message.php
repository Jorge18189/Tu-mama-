<?php
session_start();
include("../config/database.php");
include("send_notification.php"); // Importar notificaciones

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $sender_id = $_SESSION['user_id'];
    $receiver_id = isset($_POST['receiver_id']) ? $_POST['receiver_id'] : null;

    if (empty($message)) {
        echo json_encode(["success" => false, "error" => "El mensaje no puede estar vacío."]);
        exit;
    }

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
        // Obtener el OneSignal ID del receptor
        if ($receiver_id) {
            $stmt = $conn->prepare("SELECT onesignal_id FROM users WHERE id = ?");
            $stmt->bind_param("i", $receiver_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $playerId = $row['onesignal_id'] ?? null;
            $stmt->close();

            // Enviar notificación si el receptor tiene un Player ID
            if ($playerId) {
                enviarNotificacion($playerId, "Nuevo mensaje", $message);
            }
        }

        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
}
?>
