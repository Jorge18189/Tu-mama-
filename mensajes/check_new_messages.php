<?php
session_start();
include("../config/database.php");

$stmt = $conn->prepare("
    SELECT sender_id, COUNT(*) as count 
    FROM messages 
    WHERE receiver_id = ? AND read_status = 0 
    GROUP BY sender_id
");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

$unread_messages = [];
while ($row = $result->fetch_assoc()) {
    $unread_messages[$row['sender_id']] = $row['count'];
}

echo json_encode($unread_messages);
?>