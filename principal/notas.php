<?php
// inicio.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}

// Obtener ID del usuario actual
$user_id = $_SESSION['user_id'];

// Conexión a la base de datos
$db_host = 'localhost';
$db_name = 'bd';
$db_user = 'root';
$db_password = '';

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES utf8");
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Función para guardar notas en la base de datos
function guardarNota($user_id, $titulo, $contenido, $color, $categoria) {
    global $conn;
    
    try {
        $stmt = $conn->prepare("INSERT INTO notas (user_id, titulo, contenido, color, categoria) 
                               VALUES (:user_id, :titulo, :contenido, :color, :categoria)");
        
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':contenido', $contenido, PDO::PARAM_STR);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        
        return $stmt->execute();
    } catch(PDOException $e) {
        echo "Error al guardar la nota: " . $e->getMessage();
        return false;
    }
}

// Función para actualizar una nota existente
function actualizarNota($id, $titulo, $contenido, $color, $categoria, $user_id) {
    global $conn;
    
    try {
        $stmt = $conn->prepare("UPDATE notas SET titulo = :titulo, contenido = :contenido, 
                               color = :color, categoria = :categoria 
                               WHERE id = :id AND user_id = :user_id");
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':contenido', $contenido, PDO::PARAM_STR);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        
        return $stmt->execute();
    } catch(PDOException $e) {
        echo "Error al actualizar la nota: " . $e->getMessage();
        return false;
    }
}

// Función para obtener todas las notas de un usuario
function obtenerNotas($user_id) {
    global $conn;
    
    try {
        $stmt = $conn->prepare("SELECT * FROM notas WHERE user_id = :user_id ORDER BY fecha_creacion DESC");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error al obtener las notas: " . $e->getMessage();
        return [];
    }
}

// Función para obtener una nota específica
function obtenerNota($id, $user_id) {
    global $conn;
    
    try {
        $stmt = $conn->prepare("SELECT * FROM notas WHERE id = :id AND user_id = :user_id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error al obtener la nota: " . $e->getMessage();
        return null;
    }
}

// Verificar si se está enviando una nueva nota
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    $mensaje = "";
    
    if ($_POST['accion'] === 'nueva_nota') {
        if (guardarNota(
            $user_id,
            $_POST['titulo'] ?? 'Sin título',
            $_POST['contenido'] ?? '',
            $_POST['color'] ?? '#ffd700',
            $_POST['categoria'] ?? 'General'
        )) {
            $mensaje = "Nota guardada correctamente";
        } else {
            $mensaje = "Error al guardar la nota";
        }
    } elseif ($_POST['accion'] === 'editar_nota' && isset($_POST['id'])) {
        if (actualizarNota(
            $_POST['id'],
            $_POST['titulo'] ?? 'Sin título',
            $_POST['contenido'] ?? '',
            $_POST['color'] ?? '#ffd700',
            $_POST['categoria'] ?? 'General',
            $user_id
        )) {
            $mensaje = "Nota actualizada correctamente";
        } else {
            $mensaje = "Error al actualizar la nota";
        }
    }
    
    // Almacenar mensaje para mostrar después de redirección
    $_SESSION['mensaje_toast'] = $mensaje;
    
    // Redireccionar para evitar reenvío del formulario
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Eliminar nota
if (isset($_GET['eliminar'])) {
    $id_eliminar = $_GET['eliminar'];
    
    try {
        $stmt = $conn->prepare("DELETE FROM notas WHERE id = :id AND user_id = :user_id");
        $stmt->bindParam(':id', $id_eliminar, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            $_SESSION['mensaje_toast'] = "Nota eliminada correctamente";
        } else {
            $_SESSION['mensaje_toast'] = "Error al eliminar la nota";
        }
    } catch(PDOException $e) {
        $_SESSION['mensaje_toast'] = "Error al eliminar la nota: " . $e->getMessage();
    }
    
    // Redireccionar
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Obtener datos de la nota para editar
$notaEditar = null;
if (isset($_GET['editar'])) {
    $id_editar = $_GET['editar'];
    $notaEditar = obtenerNota($id_editar, $user_id);
}

// Obtener todas las notas del usuario
$notas = obtenerNotas($user_id);

// Obtener mensaje toast (si existe)
$mensaje_toast = '';
if (isset($_SESSION['mensaje_toast'])) {
    $mensaje_toast = $_SESSION['mensaje_toast'];
    unset($_SESSION['mensaje_toast']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyNotes - Sistema de Notas Escolares</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #4a6fa5;
            --secondary: #6d98ba;
            --accent: #ffd700;
            --background: #f8f9fa;
            --text: #333;
            --light: #ffffff;
            --shadow: rgba(0, 0, 0, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--background);
            color: var(--text);
            line-height: 1.6;
        }
        
        
        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .filter-options select {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: var(--light);
            font-size: 0.9rem;
            min-width: 150px;
        }
        
        .new-note-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .new-note-btn:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px var(--shadow);
        }
        
        .notes-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .note {
            background-color: var(--light);
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 8px var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .note:hover {
            transform: translateY(-.3px);
        }
        
        .note::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background-color: var(--note-color, var(--accent));
        }
        
        .note-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }
        
        .note-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            word-break: break-word;
        }
        
        .note-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .note-action-btn {
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
            font-size: 1rem;
            transition: color 0.2s ease;
        }
        
        .note-action-btn:hover {
            color: var(--primary);
        }
        
        .delete-btn:hover {
            color: #e74c3c;
        }
        
        .note-content {
            line-height: 1.6;
            margin-bottom: 1rem;
            word-break: break-word;
            max-height: 200px;
            overflow-y: auto;
        }
        
        .note-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: #888;
            border-top: 1px solid #eee;
            padding-top: 0.75rem;
            margin-top: 0.75rem;
        }
        
        .note-category {
            background-color: #f0f0f0;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            font-size: 0.75rem;
        }
        
        /* Modal para nueva/editar nota */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background-color: var(--light);
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            padding: 2rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        
        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
            transition: color 0.2s ease;
        }
        
        .close-modal:hover {
            color: #333;
        }
        
        .modal-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        .color-selector {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
        
        .color-option {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            transition: transform 0.2s ease;
        }
        
        .color-option:hover {
            transform: scale(1.1);
        }
        
        .color-option.selected::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
        }
        
        .submit-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }
        
        .submit-btn:hover {
            background-color: var(--secondary);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            background-color: var(--light);
            border-radius: 10px;
            box-shadow: 0 4px 8px var(--shadow);
            grid-column: 1 / -1;
        }
        
        .empty-icon {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 1rem;
        }
        
        .empty-text {
            font-size: 1.25rem;
            color: #888;
            margin-bottom: 1.5rem;
        }
        
        /* Toast de notificación */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--primary);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1100;
        }
        
        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        @media (max-width: 768px) {
            .controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-options {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    
    
    <main>
        <div class="controls">
            <div class="filter-options">
                <select id="categoryFilter">
                    <option value="todas">Todas las categorías</option>
                    <option value="Matemáticas">Matemáticas</option>
                    <option value="Ciencias">Ciencias</option>
                    <option value="Historia">Historia</option>
                    <option value="Literatura">Literatura</option>
                    <option value="Idiomas">Idiomas</option>
                    <option value="General">General</option>
                </select>
            </div>
            
            <button class="new-note-btn" id="openModalBtn">
                <i class="fas fa-plus"></i> Nueva Nota
            </button>
        </div>
        
        <div class="notes-container" id="notesContainer">
            <?php if (empty($notas)): ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="empty-text">No tienes notas aún. ¡Crea tu primera nota!</div>
                    <button class="new-note-btn" id="emptyStateBtn">
                        <i class="fas fa-plus"></i> Nueva Nota
                    </button>
                </div>
            <?php else: ?>
                <?php foreach ($notas as $nota): ?>
                    <div class="note" data-categoria="<?php echo htmlspecialchars($nota['categoria']); ?>" style="--note-color: <?php echo htmlspecialchars($nota['color']); ?>;">
                        <div class="note-header">
                            <h2 class="note-title"><?php echo htmlspecialchars($nota['titulo']); ?></h2>
                            <div class="note-actions">
                                <a href="?editar=<?php echo htmlspecialchars($nota['id']); ?>" class="note-action-btn edit-btn">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="?eliminar=<?php echo htmlspecialchars($nota['id']); ?>" class="note-action-btn delete-btn" 
                                   onclick="return confirm('¿Estás seguro de que deseas eliminar esta nota?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="note-content">
                            <?php echo nl2br(htmlspecialchars($nota['contenido'])); ?>
                        </div>
                        <div class="note-meta">
                            <span class="note-category"><?php echo htmlspecialchars($nota['categoria']); ?></span>
                            <span class="note-date"><?php echo date('d/m/Y', strtotime($nota['fecha_creacion'])); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
    
    <!-- Toast de notificación -->
    <div class="toast" id="toast"><?php echo htmlspecialchars($mensaje_toast); ?></div>
    
    <!-- Modal para nueva/editar nota -->
    <div class="modal" id="noteModal">
        <div class="modal-content">
            <span class="close-modal" id="closeModal">&times;</span>
            <h2 class="modal-title" id="modalTitle"><?php echo $notaEditar ? 'Editar Nota' : 'Nueva Nota'; ?></h2>
            <form action="" method="POST" id="noteForm">
                <input type="hidden" name="accion" value="<?php echo $notaEditar ? 'editar_nota' : 'nueva_nota'; ?>">
                <?php if ($notaEditar): ?>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($notaEditar['id']); ?>">
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" 
                           placeholder="Título de tu nota" 
                           value="<?php echo $notaEditar ? htmlspecialchars($notaEditar['titulo']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="contenido">Contenido</label>
                    <textarea id="contenido" name="contenido" class="form-control" 
                              placeholder="Escribe tus apuntes aquí..." required><?php echo $notaEditar ? htmlspecialchars($notaEditar['contenido']) : ''; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <?php 
                        $categorias = ['General', 'Matemáticas', 'Ciencias', 'Historia', 'Literatura', 'Idiomas'];
                        foreach ($categorias as $categoria): 
                            $selected = ($notaEditar && $notaEditar['categoria'] === $categoria) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $categoria; ?>" <?php echo $selected; ?>><?php echo $categoria; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Color</label>
                    <div class="color-selector">
                        <?php 
                        $colores = [
                            '#ffd700' => 'Dorado', 
                            '#ff6b6b' => 'Rojo', 
                            '#48dbfb' => 'Azul', 
                            '#1dd1a1' => 'Verde', 
                            '#f368e0' => 'Rosa', 
                            '#ff9f43' => 'Naranja'
                        ];
                        
                        foreach ($colores as $color => $nombre): 
                            $selected = '';
                            if ($notaEditar) {
                                $selected = ($notaEditar['color'] === $color) ? 'selected' : '';
                            } else {
                                $selected = ($color === '#ffd700') ? 'selected' : '';
                            }
                        ?>
                            <div class="color-option <?php echo $selected; ?>" 
                                 style="background-color: <?php echo $color; ?>;" 
                                 data-color="<?php echo $color; ?>" 
                                 title="<?php echo $nombre; ?>"></div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" id="color" name="color" value="<?php echo $notaEditar ? htmlspecialchars($notaEditar['color']) : '#ffd700'; ?>">
                </div>
                
                <button type="submit" class="submit-btn">
                    <?php echo $notaEditar ? 'Actualizar Nota' : 'Guardar Nota'; ?>
                </button>
            </form>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Referencias a elementos DOM
            const openModalBtn = document.getElementById('openModalBtn');
            const emptyStateBtn = document.getElementById('emptyStateBtn');
            const closeModal = document.getElementById('closeModal');
            const modal = document.getElementById('noteModal');
            const colorOptions = document.querySelectorAll('.color-option');
            const colorInput = document.getElementById('color');
            const categoryFilter = document.getElementById('categoryFilter');
            const notesContainer = document.getElementById('notesContainer');
            const toast = document.getElementById('toast');
            
            // Abrir modal automáticamente si estamos en modo edición
            <?php if ($notaEditar): ?>
            openModal();
            <?php endif; ?>
            
            // Mostrar toast si hay un mensaje
            <?php if (!empty($mensaje_toast)): ?>
            showToast('<?php echo $mensaje_toast; ?>');
            <?php endif; ?>
            
            // Funciones para mostrar/ocultar el toast
            function showToast(message) {
                toast.textContent = message;
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }
            
            // Abrir modal
            function openModal() {
                modal.style.display = 'flex';
            }
            
            // Cerrar modal
            function closeModalFunc() {
                modal.style.display = 'none';
                // Si estamos en modo edición, redireccionar para salir de ese modo
                <?php if ($notaEditar): ?>
                window.location.href = window.location.pathname;
                <?php endif; ?>
            }
            
            // Event Listeners
            if (openModalBtn) {
                openModalBtn.addEventListener('click', openModal);
            }
            
            if (emptyStateBtn) {
                emptyStateBtn.addEventListener('click', openModal);
            }
            
            closeModal.addEventListener('click', closeModalFunc);
            
            // Cerrar modal al hacer clic fuera del contenido
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeModalFunc();
                }
            });
            
            // Selector de colores
            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Remover selección anterior
                    colorOptions.forEach(opt => opt.classList.remove('selected'));
                    
                    // Establecer nueva selección
                    this.classList.add('selected');
                    
                    // Actualizar el valor del input oculto
                    colorInput.value = this.getAttribute('data-color');
                });
            });
            
            // Filtrado por categoría
            categoryFilter.addEventListener('change', function() {
                const selectedCategory = this.value;
                const notes = document.querySelectorAll('.note');
                
                notes.forEach(note => {
                    if (selectedCategory === 'todas' || note.getAttribute('data-categoria') === selectedCategory) {
                        note.style.display = 'block';
                    } else {
                        note.style.display = 'none';
                    }
                });
            });
            
            // Tecla Escape para cerrar el modal
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && modal.style.display === 'flex') {
                    closeModalFunc();
                }
            });
        });
    </script>
</body>
</html>