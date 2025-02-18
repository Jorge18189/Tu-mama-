<?php
session_start();
include("../config/database.php");

// Obtener el ID del destinatario
$receiver_id = isset($_GET['receiver_id']) ? $_GET['receiver_id'] : null;

// Determinar la consulta según el tipo de chat
if ($receiver_id) {
    // Chat privado
    $stmt = $conn->prepare("
        SELECT m.*, u.username as sender_name 
        FROM messages m 
        JOIN users u ON m.sender_id = u.id 
        WHERE (m.sender_id = ? AND m.receiver_id = ?) 
        OR (m.sender_id = ? AND m.receiver_id = ?) 
        ORDER BY m.created_at ASC
    ");
    $stmt->bind_param("iiii", $_SESSION['user_id'], $receiver_id, $receiver_id, $_SESSION['user_id']);
} else {
    // Chat grupal
    $stmt = $conn->prepare("
        SELECT m.*, u.username as sender_name 
        FROM messages m 
        JOIN users u ON m.sender_id = u.id 
        WHERE m.receiver_id IS NULL 
        ORDER BY m.created_at ASC
    ");
}

$stmt->execute();
$result = $stmt->get_result();
$messages = $result->fetch_all(MYSQLI_ASSOC);

foreach ($messages as $message) {
    $message_class = ($message['sender_id'] == $_SESSION['user_id']) 
        ? 'usuario-actual' 
        : 'otro-usuario';

    echo "<div class='mensaje $message_class'>";
    echo "<strong>" . htmlspecialchars($message['sender_name']) . ":</strong> ";

    if (!empty($message['file_path'])) {
        // Check if it's an image
        $image_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($message['file_type'], $image_types)) {
            echo "<div class='image-message'>";
            echo "<a href='" . htmlspecialchars($message['file_path']) . "' target='_blank'>";
            echo "<img src='" . htmlspecialchars($message['file_path']) . "' class='chat-image'>";
            echo "</a>";
            echo "</div>";
        } else {
            // Other file types
            $file_name = $message['file_name'] ?: basename($message['file_path']);
            $file_icon = $message_class === 'usuario-actual' ? '📤' : '📥';
            echo "<a href='" . htmlspecialchars($message['file_path']) . "' target='_blank'>$file_icon " . htmlspecialchars($file_name) . "</a>";
        }
    } else {
        echo htmlspecialchars($message['message']);
    }

    echo "</div>";
}
?>