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

// Obtener el nombre del usuario actual
$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$current_user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Chat | StudyNotes</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/mensajes.css">
</head>
<body>
    <div class="chat-container">
        <!-- Lista de contactos -->
        <div class="contactos" id="contactos-sidebar">
            <div class="contactos-header">
                <h2>Mensajes</h2>
                <span class="user-welcome">Hola, <?= htmlspecialchars($current_user['username']) ?></span>
            </div>
            
            <button class="contacto all-chats-btn" onclick="mostrarTodosLosChats()">
                Todos los chats
            </button>
            
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <div class="contacto <?= isset($unread_messages[$user['id']]) ? 'has-new-message' : '' ?>" 
                         data-user-id="<?= $user['id'] ?>">
                        <div class="contact-avatar">
                            <span><?= substr(htmlspecialchars($user['username']), 0, 1) ?></span>
                        </div>
                        <div class="contact-info">
                            <div class="contact-name"><?= htmlspecialchars($user['username']) ?></div>
                            <?php if (isset($unread_messages[$user['id']])): ?>
                                <div class="unread-badge"><?= $unread_messages[$user['id']] ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="notification-dot"></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-contacts">
                    <i class="fas fa-user-plus"></i>
                    <p>No hay otros usuarios disponibles.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Área de chat -->
        <div class="chat-area">
            <!-- Header del chat -->
            <div class="chat-header">
                <button class="menu-toggle" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="user-status">
                    <div class="status-indicator"></div>
                    <span id="current-chat-name">Chat Grupal</span>
                </div>
                <div class="header-actions">
                    <button class="header-action refresh-btn" title="Actualizar mensajes">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
            </div>
            
            <!-- Contenedor de mensajes -->
            <div id="chat-mensajes" class="chat-messages-container">
                <div class="welcome-message">
                    <div class="welcome-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Bienvenido al chat</h3>
                    <p>Selecciona un contacto para comenzar a chatear o escribe en el chat grupal.</p>
                </div>
            </div>
            
            <!-- Área de entrada de mensajes -->
            <div class="mensaje-input">
                <input type="text" id="message" placeholder="Escribe un mensaje...">
                <input type="file" id="file-input" style="display: none;">
                <button id="file-button" title="Adjuntar archivo">
                    <i class="fas fa-paperclip"></i>
                </button>
                <button id="send-button" title="Enviar mensaje">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Campo oculto para almacenar el ID del destinatario -->
    <input type="hidden" id="receiver-id" value="">

    <script>
      // Variables para el chat
let currentReceiverId = '';
let currentChatName = 'Chat Grupal';
let lastScrollPosition = 0;
let isAutoScrollEnabled = true;

$(document).ready(function() {
    // Control del menú lateral en dispositivos móviles
    $('#menu-toggle').click(function() {
        $('#contactos-sidebar').toggleClass('active');
    });
    
    // Cerrar el menú cuando se hace clic fuera de él
    $('.chat-area').click(function(e) {
        if ($(window).width() <= 768 && !$(e.target).closest('#menu-toggle').length) {
            $('#contactos-sidebar').removeClass('active');
        }
    });
    
    // Eventos para adjuntar archivos
    $('#file-button').click(function() {
        $('#file-input').click();
    });

    $('#file-input').change(function() {
        const file = this.files[0];
        if (file) {
            sendFile(file);
        }
    });
    
    // Control de scroll - desactivar auto-scroll cuando el usuario scrollea manualmente
    $('#chat-mensajes').on('scroll', function() {
        const container = this;
        const isAtBottom = container.scrollHeight - container.clientHeight <= container.scrollTop + 10;
        
        // Guardar la posición actual del scroll
        lastScrollPosition = container.scrollTop;
        
        // Activar/desactivar auto-scroll según si estamos al final
        isAutoScrollEnabled = isAtBottom;
    });
    
    // Botón de actualizar
    $('.refresh-btn').click(function() {
        $(this).addClass('rotating');
        loadMessagesWithoutScroll($('#receiver-id').val());
        
        setTimeout(() => {
            $(this).removeClass('rotating');
        }, 500); // Más rápido (500ms)
    });
    
    // Botón de enviar mensaje
    $('#send-button').click(sendMessage);

    // Enviar mensaje con Enter
    $('#message').keypress(function(e) {
        if (e.which == 13) {
            sendMessage();
        }
    });
    
    // Contactos
    $('.contacto').click(function() {
        if ($(this).data('user-id')) {
            const receiverId = $(this).data('user-id');
            const username = $(this).find('.contact-name').text().trim();
            mostrarChat(receiverId, username);
        }
    });
    
    // Actualizar chat periódicamente pero sin forzar scroll
    setInterval(function() {
        loadMessagesWithoutScroll(currentReceiverId);
        checkNewMessages();
    }, 3000);

    // Cargar mensajes iniciales
    loadMessagesWithoutScroll();
    checkNewMessages();
    
    // Botón para ir al final del chat
    $('body').append('<button id="scrollToBottomBtn" title="Ir al final"><i class="fas fa-arrow-down"></i></button>');
    $('#scrollToBottomBtn').css({
        'position': 'fixed',
        'bottom': '90px',
        'right': '20px',
        'width': '40px',
        'height': '40px',
        'border-radius': '50%',
        'background': 'var(--primary)',
        'color': 'white',
        'border': 'none',
        'box-shadow': '0 2px 10px rgba(0,0,0,0.1)',
        'cursor': 'pointer',
        'z-index': '1000',
        'display': 'none'
    });
    
    $('#scrollToBottomBtn').click(function() {
        scrollToBottom();
        isAutoScrollEnabled = true;
    });
    
    // Mostrar/ocultar botón de scroll según posición
    $('#chat-mensajes').scroll(function() {
        const container = document.getElementById('chat-mensajes');
        const isNearBottom = container.scrollHeight - container.clientHeight <= container.scrollTop + 100;
        
        if (!isNearBottom) {
            $('#scrollToBottomBtn').fadeIn();
        } else {
            $('#scrollToBottomBtn').fadeOut();
        }
    });
});

// Función para enviar archivos con vista previa
function sendFile(file) {
    const formData = new FormData();
    formData.append('file', file);
    formData.append('receiver_id', $('#receiver-id').val());

    // Limpiar el input de archivo
    $('#file-input').val('');
    
    // Crear un objeto URL para la previsualización
    const fileURL = URL.createObjectURL(file);
    
    // Agregar mensaje temporal con vista previa según el tipo de archivo
    const tempMessage = $('<div class="mensaje usuario-actual file-preview"></div>');
    
    // Determinar el tipo de archivo y mostrar la vista previa adecuada
    if (file.type.startsWith('image/')) {
        // Vista previa de imagen
        tempMessage.html(`
            <div class="mensaje-preview">
                <img src="${fileURL}" alt="Vista previa" class="preview-image">
                <div class="file-info">
                    <span class="file-name">${file.name}</span>
                    <span class="file-size">${formatFileSize(file.size)}</span>
                </div>
                <div class="file-loading">
                    <i class="fas fa-circle-notch fa-spin"></i>
                    <span>Enviando...</span>
                </div>
            </div>
        `);
    } else if (file.type === 'application/pdf') {
        // Vista previa de PDF
        tempMessage.html(`
            <div class="mensaje-preview pdf-preview">
                <div class="pdf-icon">
                    <i class="fas fa-file-pdf"></i>
                </div>
                <div class="file-info">
                    <span class="file-name">${file.name}</span>
                    <span class="file-size">${formatFileSize(file.size)}</span>
                </div>
                <div class="file-loading">
                    <i class="fas fa-circle-notch fa-spin"></i>
                    <span>Enviando...</span>
                </div>
            </div>
        `);
    } else if (file.type.startsWith('video/')) {
        // Vista previa de video
        tempMessage.html(`
            <div class="mensaje-preview video-preview">
                <video controls>
                    <source src="${fileURL}" type="${file.type}">
                    Tu navegador no soporta la reproducción de video.
                </video>
                <div class="file-info">
                    <span class="file-name">${file.name}</span>
                    <span class="file-size">${formatFileSize(file.size)}</span>
                </div>
                <div class="file-loading">
                    <i class="fas fa-circle-notch fa-spin"></i>
                    <span>Enviando...</span>
                </div>
            </div>
        `);
    } else if (file.type.startsWith('audio/')) {
        // Vista previa de audio
        tempMessage.html(`
            <div class="mensaje-preview audio-preview">
                <audio controls>
                    <source src="${fileURL}" type="${file.type}">
                    Tu navegador no soporta la reproducción de audio.
                </audio>
                <div class="file-info">
                    <span class="file-name">${file.name}</span>
                    <span class="file-size">${formatFileSize(file.size)}</span>
                </div>
                <div class="file-loading">
                    <i class="fas fa-circle-notch fa-spin"></i>
                    <span>Enviando...</span>
                </div>
            </div>
        `);
    } else {
        // Vista previa genérica para otros tipos de archivo
        let fileIcon = '<i class="fas fa-file"></i>';
        
        if (file.type.includes('word') || file.type.includes('document')) {
            fileIcon = '<i class="fas fa-file-word"></i>';
        } else if (file.type.includes('excel') || file.type.includes('spreadsheet')) {
            fileIcon = '<i class="fas fa-file-excel"></i>';
        } else if (file.type.includes('zip') || file.type.includes('compressed')) {
            fileIcon = '<i class="fas fa-file-archive"></i>';
        } else if (file.type.includes('powerpoint') || file.type.includes('presentation')) {
            fileIcon = '<i class="fas fa-file-powerpoint"></i>';
        } else if (file.type.includes('text')) {
            fileIcon = '<i class="fas fa-file-alt"></i>';
        }
        
        tempMessage.html(`
            <div class="mensaje-preview generic-file-preview">
                <div class="file-icon">
                    ${fileIcon}
                </div>
                <div class="file-info">
                    <span class="file-name">${file.name}</span>
                    <span class="file-size">${formatFileSize(file.size)}</span>
                </div>
                <div class="file-loading">
                    <i class="fas fa-circle-notch fa-spin"></i>
                    <span>Enviando...</span>
                </div>
            </div>
        `);
    }
    
    // Agregar el mensaje temporal al chat
    $('#chat-mensajes').append(tempMessage);
    
    // Solo hacer scroll si está activado el auto-scroll
    if (isAutoScrollEnabled) {
        scrollToBottom();
    } else {
        // Mostrar botón para ir al final
        $('#scrollToBottomBtn').fadeIn();
    }

    $.ajax({
        url: 'send_file.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            try {
                const data = JSON.parse(response);
                if (data.success) {
                    // Eliminar el mensaje temporal
                    tempMessage.remove();
                    
                    // Cargar mensajes actualizados pero sin auto-scroll
                    loadMessagesWithoutScroll($('#receiver-id').val());
                    
                    // Liberar el objeto URL creado para la vista previa
                    URL.revokeObjectURL(fileURL);
                } else {
                    alert("Error al enviar el archivo: " + data.error);
                    tempMessage.remove();
                    URL.revokeObjectURL(fileURL);
                }
            } catch (e) {
                console.error("Error al parsear respuesta:", e);
                tempMessage.remove();
                URL.revokeObjectURL(fileURL);
            }
        },
        error: function() {
            alert("Error al enviar el archivo. Inténtalo de nuevo.");
            tempMessage.remove();
            URL.revokeObjectURL(fileURL);
        }
    });
}

// Función para cargar mensajes sin auto-scroll
function loadMessagesWithoutScroll(receiverId = null) {
    // Guardar la posición de desplazamiento actual
    const chatContainer = document.getElementById('chat-mensajes');
    
    $.ajax({
        url: 'get_messages.php',
        method: 'GET',
        data: { receiver_id: receiverId },
        success: function(response) {
            $('#chat-mensajes').html(response);
            
            // Solo hacer scroll si está activado el auto-scroll
            if (isAutoScrollEnabled) {
                scrollToBottom();
            } else {
                // Restaurar la posición de desplazamiento anterior
                chatContainer.scrollTop = lastScrollPosition;
                
                // Mostrar botón si no estamos al final
                const isNearBottom = chatContainer.scrollHeight - chatContainer.clientHeight <= chatContainer.scrollTop + 100;
                if (!isNearBottom) {
                    $('#scrollToBottomBtn').fadeIn();
                }
            }
            
            // Inicializar eventos para elementos en los mensajes
            initMessageEvents();
        }
    });
}

// Inicializar eventos para elementos dentro de los mensajes
function initMessageEvents() {
    // Evento para abrir PDFs en nueva ventana
    $('.pdf-container').click(function() {
        const pdfUrl = $(this).data('url');
        window.open(pdfUrl, '_blank');
    });
    
    // Evento para abrir imágenes en nueva ventana
    $('.mensaje-image a').click(function(e) {
        e.preventDefault();
        const imageUrl = $(this).attr('href');
        window.open(imageUrl, '_blank');
    });
}

// Función auxiliar para formatear el tamaño de archivos
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Función para enviar mensajes
function sendMessage() {
    const message = $('#message').val();
    const receiverId = $('#receiver-id').val();

    if (message.trim() === '') {
        $('#message').addClass('shake');
        setTimeout(() => {
            $('#message').removeClass('shake');
        }, 200);
        return;
    }

    // Limpiar inmediatamente el campo de texto
    $('#message').val('');
    
    // Agregar mensaje temporal mientras se envía
    const tempMessage = $('<div class="mensaje usuario-actual sending"></div>');
    tempMessage.text(message);
    $('#chat-mensajes').append(tempMessage);
    
    // Solo hacer scroll si está activado el auto-scroll
    if (isAutoScrollEnabled) {
        scrollToBottom();
    } else {
        // Mostrar botón para ir al final
        $('#scrollToBottomBtn').fadeIn();
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
                    tempMessage.remove(); // Eliminar el mensaje temporal
                    
                    // Cargar mensajes conservando la posición
                    loadMessagesWithoutScroll(receiverId);
                } else {
                    alert("Error al enviar el mensaje: " + data.error);
                    tempMessage.removeClass('sending').addClass('error');
                }
            } catch (e) {
                console.error("Error al parsear respuesta:", e);
                tempMessage.removeClass('sending').addClass('error');
            }
        },
        error: function() {
            tempMessage.removeClass('sending').addClass('error');
        }
    });
}

// Función para desplazarse al fondo del chat
function scrollToBottom() {
    const chatMensajes = document.getElementById('chat-mensajes');
    chatMensajes.scrollTop = chatMensajes.scrollHeight;
    $('#scrollToBottomBtn').fadeOut();
}

// Función para actualizar el encabezado del chat
function updateChatHeader(name = 'Chat Grupal') {
    $('#current-chat-name').text(name);
    
    // Actualizar el indicador de estado
    if (name === 'Chat Grupal') {
        $('.status-indicator').css('background-color', 'var(--offline-status)');
    } else {
        $('.status-indicator').css('background-color', 'var(--online-status)');
    }
}

// Función para verificar nuevos mensajes
function checkNewMessages() {
    $.ajax({
        url: 'check_new_messages.php',
        method: 'GET',
        success: function(response) {
            try {
                const data = JSON.parse(response);
                $('.contacto').each(function() {
                    const userId = $(this).data('user-id');
                    if (data[userId]) {
                        $(this).addClass('has-new-message');
                        
                        // Actualizar contador de mensajes no leídos
                        let badge = $(this).find('.unread-badge');
                        if (badge.length) {
                            badge.text(data[userId]);
                        } else {
                            $(this).find('.contact-info').append('<div class="unread-badge">' + data[userId] + '</div>');
                        }
                    } else {
                        $(this).removeClass('has-new-message');
                        $(this).find('.unread-badge').remove();
                    }
                });
            } catch (e) {
                console.error("Error al parsear respuesta:", e);
            }
        }
    });
}

// Función para mostrar todos los chats
function mostrarTodosLosChats() {
    currentReceiverId = '';
    $('#receiver-id').val('');
    updateChatHeader('Chat Grupal');
    loadMessagesWithoutScroll();
    $('.contacto').removeClass('active');
    $('.all-chats-btn').addClass('active');
    
    // Cerrar menú lateral en móviles
    if ($(window).width() <= 768) {
        $('#contactos-sidebar').removeClass('active');
    }
    
    // Activar auto-scroll
    isAutoScrollEnabled = true;
}

// Función para mostrar chat específico
function mostrarChat(receiverId, username) {
    currentReceiverId = receiverId;
    $('#receiver-id').val(receiverId);
    updateChatHeader(username);
    loadMessagesWithoutScroll(receiverId);
    $('.contacto').removeClass('active');
    $(`.contacto[data-user-id="${receiverId}"]`).addClass('active');
    $(`.contacto[data-user-id="${receiverId}"]`).removeClass('has-new-message');
    $(`.contacto[data-user-id="${receiverId}"]`).find('.unread-badge').remove();
    
    // Cerrar menú lateral en móviles
    if ($(window).width() <= 768) {
        $('#contactos-sidebar').removeClass('active');
    }
    
    // Activar auto-scroll
    isAutoScrollEnabled = true;
}// Función simplificada para envío de archivos
function sendFile(file) {
    const formData = new FormData();
    formData.append('file', file);
    formData.append('receiver_id', $('#receiver-id').val());

    // Limpiar el input de archivo
    $('#file-input').val('');
    
    // Obtener icono según tipo de archivo
    let fileIcon = getFileIcon(file.type);
    
    // Agregar mensaje temporal sin vista previa de video/audio
    const tempMessage = $('<div class="mensaje usuario-actual"></div>');
    tempMessage.html(`
        <div class="generic-file-container">
            <div class="file-icon">${fileIcon}</div>
            <div class="file-info">
                <div class="file-name">${file.name}</div>
                <div class="file-size">${formatFileSize(file.size)}</div>
            </div>
            <div class="file-loading">
                <i class="fas fa-circle-notch fa-spin"></i>
            </div>
        </div>
    `);
    
    // Agregar el mensaje temporal al chat
    $('#chat-mensajes').append(tempMessage);
    
    // Hacer scroll solo si estamos al final
    const chatContainer = document.getElementById('chat-mensajes');
    const isScrolledToBottom = chatContainer.scrollHeight - chatContainer.clientHeight <= chatContainer.scrollTop + 30;
    if (isScrolledToBottom) {
        scrollToBottom();
    }

    $.ajax({
        url: 'send_file.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            try {
                const data = JSON.parse(response);
                if (data.success) {
                    tempMessage.remove();
                    loadMessagesWithoutScroll($('#receiver-id').val());
                } else {
                    alert("Error al enviar el archivo: " + data.error);
                    tempMessage.remove();
                }
            } catch (e) {
                console.error("Error al parsear respuesta:", e);
                tempMessage.remove();
            }
        },
        error: function() {
            alert("Error al enviar el archivo. Inténtalo de nuevo.");
            tempMessage.remove();
        }
    });
}

// Función auxiliar para obtener icono según tipo de archivo
function getFileIcon(fileType) {
    if (fileType.startsWith('image/')) {
        return '<i class="fas fa-file-image"></i>';
    } else if (fileType === 'application/pdf') {
        return '<i class="fas fa-file-pdf"></i>';
    } else if (fileType.startsWith('video/')) {
        return '<i class="fas fa-file-video"></i>';
    } else if (fileType.startsWith('audio/')) {
        return '<i class="fas fa-file-audio"></i>';
    } else if (fileType.includes('word') || fileType.includes('document')) {
        return '<i class="fas fa-file-word"></i>';
    } else if (fileType.includes('excel') || fileType.includes('spreadsheet')) {
        return '<i class="fas fa-file-excel"></i>';
    } else if (fileType.includes('zip') || fileType.includes('compressed')) {
        return '<i class="fas fa-file-archive"></i>';
    } else if (fileType.includes('powerpoint') || fileType.includes('presentation')) {
        return '<i class="fas fa-file-powerpoint"></i>';
    } else if (fileType.includes('text')) {
        return '<i class="fas fa-file-alt"></i>';
    } else {
        return '<i class="fas fa-file"></i>';
    }
}

// Función auxiliar simple para formatear tamaño de archivos
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}
    </script>
</body>
</html>