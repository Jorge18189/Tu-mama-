<?php
session_start();
include("../config/database.php");

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// Obtener la lista de usuarios
$stmt = $conn->prepare("SELECT id, username, last_activity FROM users WHERE id != ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si hay resultados
if ($result) {
    $users = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $users = [];
}

// Obtener mensajes no leídos para cada usuario
$unread_messages = [];
$stmt = $conn->prepare("SELECT sender_id, COUNT(*) as count FROM messages WHERE receiver_id = ? AND read_status = 0 GROUP BY sender_id");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $unread_messages[$row['sender_id']] = $row['count'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/mensajes.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"><meta name="apple-mobile-web-app-capable" content="yes">
</head>
<body>
    <div class="chat-container">
        <!-- Lista de contactos -->
        <div class="contactos">
            <button class="contacto" onclick="mostrarTodosLosChats()">
                Todos los chats
            </button>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <div class="contacto <?= isset($unread_messages[$user['id']]) ? 'has-new-message' : '' ?>" 
                         data-user-id="<?= $user['id'] ?>">
                        <?= htmlspecialchars($user['username']) ?>
                        <div class="notification-dot"></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="contacto">No hay otros usuarios disponibles.</div>
            <?php endif; ?>
        </div>

        <!-- Área de chat -->
        <div class="chat-area">
            <!-- Header del chat -->
            <div class="chat-header">
                <div class="user-status">
                    <div class="status-indicator"></div>
                    <span id="current-chat-name">Chat Grupal</span>
                </div>
            </div>
            
            <div id="chat-mensajes"></div>
            <div class="mensaje-input">
    <input type="text" id="message" placeholder="Escribe un mensaje...">
    <input type="file" id="file-input" style="display: none;">
    <button id="file-button">📎</button>
    <button id="send-button">Enviar</button>
</div>
        </div>
    </div>

    <!-- Campo oculto para almacenar el ID del destinatario -->
    <input type="hidden" id="receiver-id" value="">

    <script>
        $(document).ready(function() {
    $('#file-button').click(function() {
        $('#file-input').click();
    });

    $('#file-input').change(function() {
        const file = this.files[0];
        if (file) {
            sendFile(file);
        }
    });
});

function sendFile(file) {
    const formData = new FormData();
    formData.append('file', file);
    formData.append('receiver_id', $('#receiver-id').val());

    $.ajax({
        url: 'send_file.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
                loadMessages($('#receiver-id').val());
            } else {
                alert("Error al enviar el archivo: " + data.error);
            }
        }
    });
}
    let currentReceiverId = '';
    let currentChatName = 'Chat Grupal';

    function loadMessages(receiverId = null) {
        $.ajax({
            url: 'get_messages.php',
            method: 'GET',
            data: { receiver_id: receiverId },
            success: function(response) {
                $('#chat-mensajes').html(response);
                const chatMensajes = document.getElementById('chat-mensajes');
                chatMensajes.scrollTop = chatMensajes.scrollHeight;
            }
        });
    }

    function updateChatHeader(name = 'Chat Grupal') {
        $('#current-chat-name').text(name);
    }

    function checkNewMessages() {
        $.ajax({
            url: 'check_new_messages.php',
            method: 'GET',
            success: function(response) {
                const data = JSON.parse(response);
                $('.contacto').each(function() {
                    const userId = $(this).data('user-id');
                    if (data[userId]) {
                        $(this).addClass('has-new-message');
                    } else {
                        $(this).removeClass('has-new-message');
                    }
                });
            }
        });
    }

    function sendMessage() {
        const message = $('#message').val();
        const receiverId = $('#receiver-id').val();

        if (message.trim() === '') {
            alert("El mensaje no puede estar vacío.");
            return;
        }

        $.ajax({
            url: 'send_message.php',
            method: 'POST',
            data: { 
                message: message, 
                receiver_id: receiverId 
            },
            success: function(response) {
                try {
                    const data = JSON.parse(response);
                    if (data.success) {
                        $('#message').val('');
                        loadMessages(receiverId);
                    } else {
                        alert("Error al enviar el mensaje: " + data.error);
                    }
                } catch (e) {
                    console.error("Error al parsear respuesta:", e);
                }
            }
        });
    }

    function mostrarTodosLosChats() {
        currentReceiverId = '';
        $('#receiver-id').val('');
        updateChatHeader('Chat Grupal');
        loadMessages();
        $('.contacto').removeClass('active');
        $('[onclick="mostrarTodosLosChats()"]').addClass('active');
    }

    function mostrarChat(receiverId, username) {
        currentReceiverId = receiverId;
        $('#receiver-id').val(receiverId);
        updateChatHeader(username);
        loadMessages(receiverId);
        $('.contacto').removeClass('active');
        $(`.contacto[data-user-id="${receiverId}"]`).addClass('active');
        $(`.contacto[data-user-id="${receiverId}"]`).removeClass('has-new-message');
    }

    $(document).ready(function() {
        $('.contacto').click(function() {
            if ($(this).data('user-id')) {
                const receiverId = $(this).data('user-id');
                const username = $(this).text().trim();
                mostrarChat(receiverId, username);
            }
        });

        $('#send-button').click(sendMessage);

        $('#message').keypress(function(e) {
            if (e.which == 13) {
                sendMessage();
            }
        });

        setInterval(function() {
            loadMessages(currentReceiverId);
            checkNewMessages();
        }, 1000);

        loadMessages();
        checkNewMessages();
    });
    
    </script>
</body>
</html>