<?php
// Inicio de sesión y verificación de usuario logueado
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}

require_once "../config/database.php";
// Justo después de require_once "../config/database.php";
if (!isset($conn) || $conn === null) {
    // La conexión no está establecida
    die("Error: No se pudo establecer conexión con la base de datos");
}

// Procesamiento de solicitudes AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Endpoint para guardar tarea
if (isset($_POST['action']) && $_POST['action'] === 'guardar') {
    $response = array();
    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);
    $fecha = $_POST['fecha'];
    $user_id = $_SESSION['user_id'];
    
    if (empty($titulo) || empty($fecha)) {
        $response['success'] = false;
        $response['message'] = "El título y la fecha son obligatorios";
    } else {
        try {
            // Si existe ID, actualizar tarea existente
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $sql = "UPDATE calendario SET titulo = ?, descripcion = ?, fecha = ? WHERE id = ? AND user_id = ?";
                $stmt = $conn->prepare($sql);
                
                if ($stmt === false) {
                    throw new Exception("Error preparando la consulta de actualización: " . $conn->error);
                }
                
                $stmt->bind_param("sssii", $titulo, $descripcion, $fecha, $id, $user_id);
                $stmt->execute();
                
                if ($stmt->affected_rows > 0) {
                    $response['success'] = true;
                    $response['message'] = "Tarea actualizada correctamente";
                    $response['id'] = $id;
                } else {
                    $response['success'] = false;
                    $response['message'] = "No se pudo actualizar la tarea o no hubo cambios";
                }
                $stmt->close();
            } else {
                // Si no hay ID, crear nueva tarea
                $sql = "INSERT INTO calendario (user_id, titulo, descripcion, fecha) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                
                if ($stmt === false) {
                    throw new Exception("Error preparando la consulta de inserción: " . $conn->error);
                }
                
                $stmt->bind_param("isss", $user_id, $titulo, $descripcion, $fecha);
                $stmt->execute();
                
                if ($stmt->affected_rows > 0) {
                    $response['success'] = true;
                    $response['message'] = "Tarea guardada correctamente";
                    $response['id'] = $conn->insert_id;
                } else {
                    $response['success'] = false;
                    $response['message'] = "No se pudo guardar la tarea";
                }
                $stmt->close();
            }
        } catch(Exception $e) {
            $response['success'] = false;
            $response['message'] = "Error: " . $e->getMessage();
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
    
   // Endpoint para eliminar tarea
if (isset($_POST['action']) && $_POST['action'] === 'eliminar') {
    $response = array();
    
    if (empty($_POST['id'])) {
        $response['success'] = false;
        $response['message'] = "ID de tarea no proporcionado";
    } else {
        try {
            $id = $_POST['id'];
            $user_id = $_SESSION['user_id'];
            
            $sql = "DELETE FROM calendario WHERE id = ? AND user_id = ?";
            $stmt = $conn->prepare($sql);
            
            if ($stmt === false) {
                throw new Exception("Error preparando la consulta de eliminación: " . $conn->error);
            }
            
            $stmt->bind_param("ii", $id, $user_id);
            $stmt->execute();
            
            if ($stmt->affected_rows > 0) {
                $response['success'] = true;
                $response['message'] = "Tarea eliminada correctamente";
            } else {
                $response['success'] = false;
                $response['message'] = "No se encontró la tarea o no tiene permisos para eliminarla";
            }
            $stmt->close();
        } catch(Exception $e) {
            $response['success'] = false;
            $response['message'] = "Error: " . $e->getMessage();
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
    
   // Endpoint para obtener tareas
if (isset($_POST['action']) && $_POST['action'] === 'obtener') {
    $response = array();
    
    try {
        $user_id = $_SESSION['user_id'];
        
        $sql = "SELECT id, titulo, descripcion, fecha FROM calendario WHERE user_id = ? ORDER BY fecha ASC";
        $stmt = $conn->prepare($sql);
        
        if ($stmt === false) {
            throw new Exception("Error preparando la consulta: " . $conn->error);
        }
        
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $tareas = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        
        $response['success'] = true;
        $response['tareas'] = $tareas;
    } catch(Exception $e) {
        $response['success'] = false;
        $response['message'] = "Error: " . $e->getMessage();
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
}

// Obtener tareas para cargar inicialmente
// Obtener tareas para cargar inicialmente
$tareas = array();
try {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT id, titulo, descripcion, fecha FROM calendario WHERE user_id = ?";
    
    // Preparar la consulta usando mysqli
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        // Error en la preparación de la consulta
        error_log("Error preparando la consulta: " . $conn->error);
    } else {
        // Vincular parámetros usando mysqli
        $stmt->bind_param("i", $user_id); // "i" indica que es un entero
        $stmt->execute();
        $result = $stmt->get_result();
        $tareas = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    }
} catch(Exception $e) {
    // Error silencioso, se manejará en el cliente
    error_log("Error: " . $e->getMessage());
    $tareas = array();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Interactivo</title>
    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f5f5f5;
    padding: 20px;
}

.calendario-container {
    max-width: 1200px;
    margin: 0 auto;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.calendario-header {
    background-color: #3498db;
    color: white;
    text-align: center;
    padding: 20px;
}

.calendario-header h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

.calendario-navegacion {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
}

.calendario-navegacion button {
    background: none;
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
    padding: 5px 10px;
}

.dias-semana {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    background-color: #f0f0f0;
    border-bottom: 1px solid #ddd;
}

.dia-semana {
    text-align: center;
    padding: 10px;
    font-weight: bold;
    color: #333;
}

.dias-mes {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
}

.dia {
    border: 1px solid #eee;
    min-height: 80px;
    padding: 10px;
    text-align: right;
    position: relative;
    cursor: pointer;
    transition: background-color 0.2s;
}

.dia:hover {
    background-color: #f9f9f9;
}

.dia-actual {
    background-color: #e6f7ff;
    font-weight: bold;
}

.dia-otro-mes {
    color: #ccc;
    cursor: default;
}

.evento {
    font-size: 12px;
    margin-top: 5px;
    text-align: left;
    background-color: #e8f4fc;
    padding: 2px 5px;
    border-radius: 3px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    cursor: pointer;
}

.modal {
    display: none;
    position: fixed;
    z-index: 100;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    border-radius: 8px;
    width: 80%;
    max-width: 500px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.form-group textarea {
    height: 100px;
    resize: vertical;
}

.btn {
    padding: 8px 16px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

.btn:hover {
    background-color: #2980b9;
}

.btn-cancelar {
    background-color: #e74c3c;
    margin-right: 10px;
}

.btn-cancelar:hover {
    background-color: #c0392b;
}

.tarea-info {
    text-align: left;
    margin-bottom: 20px;
}

.tarea-info h3 {
    margin-bottom: 10px;
    color: #3498db;
}

.tarea-acciones {
    display: flex;
    justify-content: flex-end;
    margin-top: 15px;
}

.loader {
    display: none;
    border: 3px solid #f3f3f3;
    border-radius: 50%;
    border-top: 3px solid #3498db;
    width: 20px;
    height: 20px;
    animation: spin 1s linear infinite;
    margin-left: 10px;
    vertical-align: middle;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Mejoras en la sección responsive */
@media screen and (max-width: 900px) {
    .calendario-container {
        max-width: 95%;
    }
}

@media screen and (max-width: 768px) {
    body {
        padding: 10px;
    }
    
    .calendario-header h1 {
        font-size: 20px;
    }
    
    .dia {
        min-height: 70px;
        padding: 5px;
        font-size: 14px;
    }
    
    .evento {
        font-size: 11px;
        padding: 2px 3px;
    }
    
    .modal-content {
        width: 90%;
        margin: 20% auto;
        padding: 15px;
    }
    
    .form-group {
        margin-bottom: 10px;
    }
    
    .btn {
        padding: 7px 14px;
        font-size: 13px;
    }
}

@media screen and (max-width: 600px) {
    .calendario-header {
        padding: 15px 10px;
    }
    
    .calendario-navegacion button {
        font-size: 14px;
        padding: 3px 8px;
    }
    
    .dia-semana {
        font-size: 12px;
        padding: 8px 2px;
    }
    
    .dia {
        min-height: 60px;
        padding: 4px;
        font-size: 13px;
    }
    
    .evento {
        font-size: 10px;
        margin-top: 3px;
        padding: 1px 2px;
    }
}

@media screen and (max-width: 480px) {
    body {
        padding: 5px;
    }
    
    .calendario-container {
        border-radius: 8px;
    }
    
    .calendario-header h1 {
        font-size: 18px;
        margin-bottom: 8px;
    }
    
    .dia-semana {
        font-size: 11px;
        padding: 6px 2px;
    }
    
    .dia {
        min-height: 50px;
        padding: 2px;
        font-size: 12px;
    }
    
    .modal-content {
        margin: 10% auto;
        padding: 12px;
    }
    
    .form-group label {
        font-size: 13px;
    }
    
    .form-group input,
    .form-group textarea {
        padding: 6px;
        font-size: 13px;
    }
    
    .btn {
        padding: 6px 12px;
        font-size: 12px;
    }
    
    .close {
        font-size: 24px;
    }
}

@media screen and (max-width: 360px) {
    .calendario-header h1 {
        font-size: 16px;
    }
    
    .dias-semana {
        grid-template-columns: repeat(7, 1fr);
    }
    
    .dia-semana {
        font-size: 10px;
        padding: 4px 1px;
    }
    
    .dia {
        min-height: 40px;
        padding: 2px 1px;
        font-size: 11px;
    }
    
    .evento {
        font-size: 9px;
        padding: 1px;
        margin-top: 2px;
    }
}
    </style>
</head>
<body>
    <div class="calendario-container">
        <div class="calendario-header">
            <h1>Calendario de Tareas</h1>
            <div class="calendario-navegacion">
                <button id="mes-anterior">← Anterior</button>
                <span id="mes-actual">Marzo 2025</span>
                <button id="mes-siguiente">Siguiente →</button>
            </div>
        </div>
        
        <div class="dias-semana">
            <div class="dia-semana">Dom</div>
            <div class="dia-semana">Lun</div>
            <div class="dia-semana">Mar</div>
            <div class="dia-semana">Mié</div>
            <div class="dia-semana">Jue</div>
            <div class="dia-semana">Vie</div>
            <div class="dia-semana">Sáb</div>
        </div>
        
        <div class="dias-mes" id="dias-calendario">
            <!-- Los días del calendario se generarán con JavaScript -->
        </div>
    </div>
    
    <!-- Modal para agregar tarea -->
    <div id="modal-tarea" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modal-titulo">Agregar tarea</h2>
            
            <div id="vista-tarea" style="display: none;">
                <div class="tarea-info">
                    <h3 id="tarea-titulo-vista"></h3>
                    <p id="tarea-fecha-vista"></p>
                    <p id="tarea-descripcion-vista"></p>
                </div>
                <div class="tarea-acciones">
                    <button class="btn btn-cancelar" id="btn-eliminar">Eliminar</button>
                    <button class="btn" id="btn-editar">Editar</button>
                </div>
            </div>
            
            <form id="form-tarea" style="display: block;">
                <input type="hidden" id="fecha-seleccionada">
                <input type="hidden" id="tarea-id" value="">
                
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" maxlength="20" required>
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion"></textarea>
                </div>
                
                <div class="form-group" style="text-align: right;">
                    <button type="button" class="btn btn-cancelar" id="btn-cancelar">Cancelar</button>
                    <button type="submit" class="btn" id="btn-guardar">Guardar</button>
                    <span class="loader" id="loader-guardar"></span>
                </div>
            </form>
        </div>
    </div>
    
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    // Variables globales
    let fechaActual = new Date();
    let tareas = <?php echo json_encode($tareas); ?>;
    
    // Elementos DOM
    const diasCalendario = document.getElementById('dias-calendario');
    const mesActualTexto = document.getElementById('mes-actual');
    const mesAnteriorBtn = document.getElementById('mes-anterior');
    const mesSiguienteBtn = document.getElementById('mes-siguiente');
    const modal = document.getElementById('modal-tarea');
    const closeModal = document.querySelector('.close');
    const formTarea = document.getElementById('form-tarea');
    const vistaTarea = document.getElementById('vista-tarea');
    const fechaSeleccionadaInput = document.getElementById('fecha-seleccionada');
    const tituloInput = document.getElementById('titulo');
    const descripcionInput = document.getElementById('descripcion');
    const tareaIdInput = document.getElementById('tarea-id');
    const tareaTituloVista = document.getElementById('tarea-titulo-vista');
    const tareaFechaVista = document.getElementById('tarea-fecha-vista');
    const tareaDescripcionVista = document.getElementById('tarea-descripcion-vista');
    const btnCancelar = document.getElementById('btn-cancelar');
    const btnEliminar = document.getElementById('btn-eliminar');
    const btnEditar = document.getElementById('btn-editar');
    const modalTitulo = document.getElementById('modal-titulo');
    const loaderGuardar = document.getElementById('loader-guardar');
    
    // Renderizar calendario inicial
    renderizarCalendario(fechaActual);
    
    // Event Listeners
    mesAnteriorBtn.addEventListener('click', function() {
        fechaActual.setMonth(fechaActual.getMonth() - 1);
        renderizarCalendario(fechaActual);
    });
    
    mesSiguienteBtn.addEventListener('click', function() {
        fechaActual.setMonth(fechaActual.getMonth() + 1);
        renderizarCalendario(fechaActual);
    });
    
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
    
    formTarea.addEventListener('submit', function(event) {
        event.preventDefault();
        guardarTarea();
    });
    
    btnCancelar.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    btnEditar.addEventListener('click', function() {
        mostrarFormulario();
    });
    
    btnEliminar.addEventListener('click', function() {
        eliminarTarea(tareaIdInput.value);
    });
    
    // Funciones
    function renderizarCalendario(fecha) {
        const ano = fecha.getFullYear();
        const mes = fecha.getMonth();
        const diaActual = new Date().getDate();
        const mesActual = new Date().getMonth();
        const anoActual = new Date().getFullYear();
        
        // Actualizar texto del mes
        const nombresMeses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        mesActualTexto.textContent = `${nombresMeses[mes]} ${ano}`;
        
        // Limpiar calendario
        diasCalendario.innerHTML = '';
        
        // Obtener el primer día del mes
        const primerDia = new Date(ano, mes, 1);
        // Obtener el último día del mes
        const ultimoDia = new Date(ano, mes + 1, 0);
        
        // Obtener el día de la semana del primer día (0 = domingo, 6 = sábado)
        const primerDiaSemana = primerDia.getDay();
        
        // Obtener el último día del mes anterior
        const ultimoDiaMesAnterior = new Date(ano, mes, 0).getDate();
        
        // Agregar días del mes anterior
        for (let i = primerDiaSemana - 1; i >= 0; i--) {
            const dia = ultimoDiaMesAnterior - i;
            const diaElemento = document.createElement('div');
            diaElemento.className = 'dia dia-otro-mes';
            diaElemento.textContent = dia;
            diasCalendario.appendChild(diaElemento);
        }
        
        // Agregar días del mes actual
        for (let i = 1; i <= ultimoDia.getDate(); i++) {
            const diaElemento = document.createElement('div');
            diaElemento.className = 'dia';
            diaElemento.textContent = i;
            
            // Marcar el día actual
            if (i === diaActual && mes === mesActual && ano === anoActual) {
                diaElemento.classList.add('dia-actual');
            }
            
            // Formatear fecha para buscar tareas
            const fechaStr = `${ano}-${(mes + 1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}`;
            
            // Buscar tareas para este día
            const tareasDelDia = tareas.filter(tarea => tarea.fecha === fechaStr);
            
            // Agregar tareas al día
            tareasDelDia.forEach(tarea => {
                const eventoElemento = document.createElement('div');
                eventoElemento.className = 'evento';
                eventoElemento.textContent = tarea.titulo.substring(0, 15) + (tarea.titulo.length > 15 ? '...' : '');
                eventoElemento.setAttribute('data-id', tarea.id);
                
                eventoElemento.addEventListener('click', function(event) {
                    event.stopPropagation();
                    mostrarDetalleTarea(tarea);
                });
                
                diaElemento.appendChild(eventoElemento);
            });
            
            // Agregar evento click para agregar tarea
            diaElemento.addEventListener('click', function() {
                abrirModalNuevaTarea(fechaStr);
            });
            
            diasCalendario.appendChild(diaElemento);
        }
        
        // Calcular cuántos días necesitamos del siguiente mes
        const totalCeldasActuales = document.querySelectorAll('.dia').length;
        const celdasFaltantes = 42 - totalCeldasActuales; // 6 filas x 7 días
        
        // Agregar días del siguiente mes
        for (let i = 1; i <= celdasFaltantes; i++) {
            const diaElemento = document.createElement('div');
            diaElemento.className = 'dia dia-otro-mes';
            diaElemento.textContent = i;
            diasCalendario.appendChild(diaElemento);
        }
    }
    function abrirModalNuevaTarea(fecha) {
    // Limpiar formulario explícitamente
    formTarea.reset();
    tareaIdInput.value = '';
    tituloInput.value = '';
    descripcionInput.value = '';
    fechaSeleccionadaInput.value = fecha;
    
    // Mostrar formulario, ocultar vista detalle
    formTarea.style.display = 'block';
    vistaTarea.style.display = 'none';
    modalTitulo.textContent = 'Agregar tarea';
    
    // Mostrar modal
    modal.style.display = 'block';
}
    function abrirModalNuevaTarea(fecha) {
        // Limpiar formulario
        formTarea.reset();
        tareaIdInput.value = '';
        fechaSeleccionadaInput.value = fecha;
        
        // Mostrar formulario, ocultar vista detalle
        formTarea.style.display = 'block';
        vistaTarea.style.display = 'none';
        modalTitulo.textContent = 'Agregar tarea';
        
        // Mostrar modal
        modal.style.display = 'block';
    }
    
    function guardarTarea() {
        const titulo = tituloInput.value.trim();
        const descripcion = descripcionInput.value.trim();
        const fecha = fechaSeleccionadaInput.value;
        const id = tareaIdInput.value;
        
        if (!titulo || !fecha) {
            alert('Por favor ingrese un título para la tarea');
            return;
        }
        
        // Mostrar loader
        loaderGuardar.style.display = 'inline-block';
        
        // Crear objeto FormData para enviar los datos
        const formData = new FormData();
        formData.append('action', 'guardar');
        formData.append('titulo', titulo);
        formData.append('descripcion', descripcion);
        formData.append('fecha', fecha);
        
        if (id) {
            formData.append('id', id);
        }
        
        // Llamada AJAX para guardar la tarea
        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Ocultar loader
            loaderGuardar.style.display = 'none';
            
            if (data.success) {
                // Si es una nueva tarea, agregarla al array de tareas
                if (!id) {
                    tareas.push({
                        id: data.id,
                        titulo: titulo,
                        descripcion: descripcion,
                        fecha: fecha
                    });
                } else {
                    // Si es una tarea existente, actualizar en el array
                    const index = tareas.findIndex(t => t.id == id);
                    if (index !== -1) {
                        tareas[index].titulo = titulo;
                        tareas[index].descripcion = descripcion;
                        tareas[index].fecha = fecha;
                    }
                }
                
                // Cerrar modal y actualizar calendario
                modal.style.display = 'none';
                renderizarCalendario(fechaActual);
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            // Ocultar loader
            loaderGuardar.style.display = 'none';
            
            console.error('Error al guardar la tarea:', error);
            alert('Error al guardar la tarea');
        });
    }
    
    function mostrarDetalleTarea(tarea) {
        // Llenar datos de la tarea
        tareaIdInput.value = tarea.id;
        tareaTituloVista.textContent = tarea.titulo;
        tareaFechaVista.textContent = formatearFecha(tarea.fecha);
        tareaDescripcionVista.textContent = tarea.descripcion || 'Sin descripción';
        
        // Mostrar vista detalle, ocultar formulario
        formTarea.style.display = 'none';
        vistaTarea.style.display = 'block';
        modalTitulo.textContent = 'Detalle de tarea';
        
        // Mostrar modal
        modal.style.display = 'block';
    }
    function formatearFecha(fechaStr) {
    // Suponiendo que la fecha viene en formato "YYYY-MM-DD"
    const [año, mes, dia] = fechaStr.split('-');
    
    // Meses en español
    const meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
    
    // Simplemente mostrar la fecha sin día de la semana
    return `${parseInt(dia)} de ${meses[parseInt(mes)-1]} de ${año}`;
}
    function mostrarFormulario() {
        const tarea = tareas.find(t => t.id == tareaIdInput.value);
        
        if (tarea) {
            // Prellenar formulario si estamos editando
            tituloInput.value = tarea.titulo;
            descripcionInput.value = tarea.descripcion || '';
            fechaSeleccionadaInput.value = tarea.fecha;
        }
        
        // Mostrar formulario, ocultar vista detalle
        formTarea.style.display = 'block';
        vistaTarea.style.display = 'none';
        modalTitulo.textContent = tarea ? 'Editar tarea' : 'Agregar tarea';
    }
    
    function eliminarTarea(id) {
        if (!id) {
            console.error('ID de tarea no proporcionado');
            return;
        }
        
        if (!confirm('¿Está seguro de que desea eliminar esta tarea?')) {
            return;
        }
        
        const formData = new FormData();
        formData.append('action', 'eliminar');
        formData.append('id', id);
        
        // Llamada AJAX para eliminar la tarea
        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Eliminar tarea del array
                const index = tareas.findIndex(t => t.id == id);
                if (index !== -1) {
                    tareas.splice(index, 1);
                }
                
                // Cerrar modal y actualizar calendario
                modal.style.display = 'none';
                renderizarCalendario(fechaActual);
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error al eliminar la tarea:', error);
            alert('Error al eliminar la tarea');
        });
    }
    
    function cargarTareas() {
        const formData = new FormData();
        formData.append('action', 'obtener');
        
        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.tareas) {
                tareas = data.tareas;
                renderizarCalendario(fechaActual);
            } else {
                console.error('Error al cargar tareas:', data.message);
            }
        })
        .catch(error => {
            console.error('Error al cargar tareas:', error);
        });
    }
    
    function formatearFecha(fechaStr) {
        const fecha = new Date(fechaStr);
        const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        return fecha.toLocaleDateString('es-ES', opciones);
    }
});
    </script>
</body>
</html>