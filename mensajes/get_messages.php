<?php
session_start();
include("../config/database.php");

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$receiver_id = isset($_GET['receiver_id']) ? $_GET['receiver_id'] : null;

// Marcar mensajes como leídos si se está viendo un chat específico
if ($receiver_id) {
    $stmt = $conn->prepare("UPDATE messages SET read_status = 1 WHERE sender_id = ? AND receiver_id = ?");
    $stmt->bind_param("ii", $receiver_id, $user_id);
    $stmt->execute();
}

// Obtener los mensajes
$query = "";
$params = [];

if ($receiver_id) {
    // Mensajes privados entre dos usuarios
    $query = "SELECT m.*, u.username FROM messages m 
              LEFT JOIN users u ON m.sender_id = u.id 
              WHERE (m.sender_id = ? AND m.receiver_id = ?) 
              OR (m.sender_id = ? AND m.receiver_id = ?) 
              ORDER BY m.created_at ASC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiii", $user_id, $receiver_id, $receiver_id, $user_id);
} else {
    // Mensajes grupales (donde receiver_id es NULL)
    $query = "SELECT m.*, u.username FROM messages m 
              LEFT JOIN users u ON m.sender_id = u.id 
              WHERE m.is_group_message = 1 
              ORDER BY m.created_at ASC";
    $stmt = $conn->prepare($query);
}

$stmt->execute();
$result = $stmt->get_result();
$messages = [];

if ($result) {
    $messages = $result->fetch_all(MYSQLI_ASSOC);
}

// Función para formatear el tamaño del archivo (definida solo una vez)
function formatFileSize($filePath) {
    if (file_exists($filePath)) {
        $bytes = filesize($filePath);
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, 2) . ' ' . $units[$pow];
    }
    return 'Desconocido';
}

// Verificar si hay mensajes
if (count($messages) == 0) {
    echo '<div class="empty-chat">
            <div class="empty-chat-icon">
                <i class="fas fa-comment-dots"></i>
            </div>
            <p>No hay mensajes aún. Sé el primero en enviar algo.</p>
          </div>';
} else {
    // Mostrar fecha para agrupar mensajes
    $currentDate = "";
    
    foreach ($messages as $message) {
        $messageDate = date('Y-m-d', strtotime($message['created_at']));
        
        // Mostrar separador de fecha si cambia el día
        if ($messageDate != $currentDate) {
            $currentDate = $messageDate;
            $formattedDate = '';
            
            $today = date('Y-m-d');
            $yesterday = date('Y-m-d', strtotime('-1 day'));
            
            if ($messageDate == $today) {
                $formattedDate = 'Hoy';
            } elseif ($messageDate == $yesterday) {
                $formattedDate = 'Ayer';
            } else {
                $formattedDate = date('d M Y', strtotime($messageDate));
            }
            
            echo '<div class="date-separator">
                    <span>' . $formattedDate . '</span>
                  </div>';
        }
        
        // Determinar si es un mensaje propio o de otro usuario
        $isCurrentUser = $message['sender_id'] == $user_id;
        $messageClass = $isCurrentUser ? 'usuario-actual' : 'otro-usuario';
        
        echo '<div class="mensaje ' . $messageClass . '">';
        
        // Mostrar nombre del remitente solo para mensajes grupales y si no es el usuario actual
        if (!$receiver_id && !$isCurrentUser) {
            echo '<div class="mensaje-username">' . htmlspecialchars($message['username']) . '</div>';
        }
        
        // Verificar si es un mensaje de archivo o texto
        if (isset($message['file_path']) && $message['file_path']) {
            $fileIcon = '';
            $fileType = $message['file_type'] ?? '';
            $filePath = htmlspecialchars($message['file_path']);
            $fileName = htmlspecialchars($message['file_name'] ?? 'Archivo');
            
            // Estimar tamaño si el archivo existe
            $fileSize = file_exists($message['file_path']) ? formatFileSize($message['file_path']) : 'Desconocido';
            
            // Determinar el tipo de archivo para su visualización
            if (strpos($fileType, 'image/') === 0) {
                // Es una imagen - mostrar la imagen
                echo '<div class="mensaje-image">';
                echo '<a href="' . $filePath . '" target="_blank">';
                echo '<img src="' . $filePath . '" alt="Imagen compartida" loading="lazy">';
                echo '</a>';
                echo '<div class="file-info">';
                echo '<span class="file-name">' . $fileName . '</span>';
                echo '<span class="file-size">' . $fileSize . '</span>';
                echo '</div>';
                echo '</div>';
            } else if (strpos($fileType, 'pdf') !== false) {
                // Es un PDF - mostrar contenedor clickeable
                echo '<div class="pdf-container" data-url="' . $filePath . '">';
                echo '<div class="pdf-icon"><i class="fas fa-file-pdf"></i></div>';
                echo '<div class="file-name">' . $fileName . '</div>';
                echo '<div class="file-size">' . $fileSize . '</div>';
                echo '<div class="view-pdf">Haz clic para abrir</div>';
                echo '</div>';
            } else if (strpos($fileType, 'video/') === 0) {
                // Es un video - mostrar enlace de descarga en lugar de reproductor
                echo '<div class="generic-file-container">';
                echo '<div class="file-icon"><i class="fas fa-file-video"></i></div>';
                echo '<div class="file-info">';
                echo '<div class="file-name">' . $fileName . '</div>';
                echo '<div class="file-size">' . $fileSize . '</div>';
                echo '</div>';
                echo '<a href="' . $filePath . '" target="_blank" class="file-action-btn">';
                echo '<i class="fas fa-external-link-alt"></i>';
                echo '</a>';
                echo '</div>';
            } else if (strpos($fileType, 'audio/') === 0) {
                // Es un audio - mostrar enlace en lugar de reproductor
                echo '<div class="generic-file-container">';
                echo '<div class="file-icon"><i class="fas fa-file-audio"></i></div>';
                echo '<div class="file-info">';
                echo '<div class="file-name">' . $fileName . '</div>';
                echo '<div class="file-size">' . $fileSize . '</div>';
                echo '</div>';
                echo '<a href="' . $filePath . '" target="_blank" class="file-action-btn">';
                echo '<i class="fas fa-external-link-alt"></i>';
                echo '</a>';
                echo '</div>';
            } else {
                // Determinar el icono según el tipo de archivo
                if (strpos($fileType, 'word') !== false || strpos($fileType, 'document') !== false) {
                    $fileIcon = '<i class="fas fa-file-word"></i>';
                } elseif (strpos($fileType, 'excel') !== false || strpos($fileType, 'spreadsheet') !== false) {
                    $fileIcon = '<i class="fas fa-file-excel"></i>';
                } elseif (strpos($fileType, 'video') !== false) {
                    $fileIcon = '<i class="fas fa-file-video"></i>';
                } elseif (strpos($fileType, 'audio') !== false) {
                    $fileIcon = '<i class="fas fa-file-audio"></i>';
                } elseif (strpos($fileType, 'zip') !== false || strpos($fileType, 'compressed') !== false) {
                    $fileIcon = '<i class="fas fa-file-archive"></i>';
                } elseif (strpos($fileType, 'powerpoint') !== false || strpos($fileType, 'presentation') !== false) {
                    $fileIcon = '<i class="fas fa-file-powerpoint"></i>';
                } elseif (strpos($fileType, 'text') !== false) {
                    $fileIcon = '<i class="fas fa-file-alt"></i>';
                } else {
                    $fileIcon = '<i class="fas fa-file"></i>';
                }
                
                // Mostrar archivo genérico
                echo '<div class="mensaje-file">';
                echo '<div class="file-icon">' . $fileIcon . '</div>';
                echo '<div class="file-info">';
                echo '<div class="file-name">' . $fileName . '</div>';
                echo '<div class="file-size">' . $fileSize . '</div>';
                echo '</div>';
                echo '<a href="' . $filePath . '" download class="file-action-btn">';
                echo '<i class="fas fa-download"></i>';
                echo '</a>';
                echo '</div>';
            }
        } else {
            // Mensaje de texto normal
            echo htmlspecialchars($message['message']);
        }
        
        echo '</div>';
    }
}
?>

<script>
// Inicializar controladores de eventos después de cargar mensajes
$(document).ready(function() {
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
});
</script>