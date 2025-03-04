<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LSA - Learn. Study. Achieve</title>
    <link rel="icon" type="image/png" href="../imagenes/Savy.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        text-align: center;
    }

    .title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        margin: 2rem;
        text-align: left;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        padding: 2rem;
    }

    .card-container {
        width: 100%;
        max-width: 600px;
        margin: auto;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: white;
        height: 300px; /* Altura fija para todas las cards */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        height: 80px;
        background: white;
        border-bottom: 1px solid #eee;
        overflow: hidden;
    }

    .card-content {
        width: 100%;
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
        margin-left: 20px;
        display: flex;
        align-items: left;
        justify-content: left;
        text-align: left;
    }

    .card-description {
        padding: 15px 20px;
        text-align: left;
        color: #555;
        font-size: 0.9rem;
        line-height: 1.4;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Limita el texto a 3 líneas */
        -webkit-box-orient: vertical;
        flex-grow: 1; /* Asegura que el contenido ocupe el espacio disponible */
    }

    .dropdown-options {
        display: flex;
        justify-content: space-around;
        padding: 15px 20px;
        background-color: #f9f9f9;
        border-top: 1px solid #eee;
    }

    .dropdown-option {
        padding: 12px 20px;
        border-radius: 5px;
        background-color: #3498db;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .dropdown-option:hover {
        background-color: #2980b9;
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        width: 90%;
        max-width: 1200px;
        height: 80%;
        border-radius: 10px;
        padding: 20px;
        position: relative;
        overflow: auto;
    }

    .close-modal {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 24px;
        cursor: pointer;
        color: #333;
    }

    .close-modal:hover {
        color: #e74c3c;
    }

    .pdf-container {
        width: 100%;
        height: 90%;
    }

    .quiz-container {
        padding: 20px;
        text-align: left;
    }

    .quiz-question {
        margin-bottom: 20px;
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }

    .quiz-options {
        margin-top: 10px;
    }

    .quiz-option {
        display: block;
        margin: 8px 0;
    }

    .submit-button {
        display: block;
        margin: 20px auto;
        padding: 12px 25px;
        background-color: #2ecc71;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-button:hover {
        background-color: #27ae60;
    }

    @media (max-width: 768px) {
        .grid-container {
            padding: 1rem;
        }
        
        .modal-content {
            width: 95%;
            height: 90%;
        }
    }
</style>
</head>
<body>
    <h1 class="title"><a href="../materiales.php">Materiales</a> > Historia</h1>
    
    <div class="grid-container">
        <!-- Introducción a la Historia y sus Corrientes -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Introducción a la Historia y sus Corrientes</div>
            </div>
            <div class="card-description">
                Revisión de los movimientos históricos más influyentes, desde las primeras civilizaciones hasta las principales corrientes filosóficas y políticas que han dado forma al pensamiento moderno.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Introducción a la Historia y sus Corrientes')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Introducción a la Historia y sus Corrientes')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Culturas Mesoamericanas y Europa en los siglos XV y XVI -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Culturas Mesoamericanas y Europa en los siglos XV y XVI</div>
            </div>
            <div class="card-description">
                Estudio de las grandes civilizaciones mesoamericanas y su relación con los avances europeos durante el Renacimiento y la exploración transatlántica.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Culturas Mesoamericanas y Europa en los siglos XV y XVI')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Culturas Mesoamericanas y Europa en los siglos XV y XVI')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Proceso de Conquista y Estructuras Coloniales I -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Proceso de Conquista y Estructuras Coloniales I</div>
            </div>
            <div class="card-description">
                Análisis de la llegada de los conquistadores europeos al continente americano y la formación de las primeras estructuras coloniales en América Latina.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Proceso de Conquista y Estructuras Coloniales I')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Proceso de Conquista y Estructuras Coloniales I')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Proceso de Conquista y Estructuras Coloniales II -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Proceso de Conquista y Estructuras Coloniales II</div>
            </div>
            <div class="card-description">
                Continuación del estudio del proceso de conquista, enfocándose en las políticas de administración y las jerarquías coloniales.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Proceso de Conquista y Estructuras Coloniales II')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Proceso de Conquista y Estructuras Coloniales II')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Proceso de Independencia de México -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Proceso de Independencia de México</div>
            </div>
            <div class="card-description">
                Estudio de los eventos que llevaron a la independencia de México, analizando los movimientos sociales, políticos y las figuras clave de la independencia.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Proceso de Independencia de México')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Proceso de Independencia de México')">Cuestionario</div>
            </div>
        </div>
        
        <!-- México Independiente (1821-1854) -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">México Independiente (1821-1854)</div>
            </div>
            <div class="card-description">
                Análisis de la etapa de formación del estado mexicano después de la independencia, incluyendo los desafíos económicos, sociales y políticos.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('México Independiente (1821-1854)')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('México Independiente (1821-1854)')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Reformas en México (1854-1876) -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Reformas en México (1854-1876)</div>
            </div>
            <div class="card-description">
                Revisión de las reformas liberales en México, incluyendo la Reforma Agraria y la promulgación de leyes que transformaron la estructura social y política.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Reformas en México (1854-1876)')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Reformas en México (1854-1876)')">Cuestionario</div>
            </div>
        </div>
        
        <!-- El Porfiriato -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">El Porfiriato</div>
            </div>
            <div class="card-description">
                Estudio del periodo de gobierno de Porfirio Díaz, destacando los cambios económicos, sociales y políticos en México durante este régimen.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('El Porfiriato')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('El Porfiriato')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Revolución Mexicana -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Revolución Mexicana</div>
            </div>
            <div class="card-description">
                Análisis de la Revolución Mexicana, sus causas, actores principales, eventos clave y el impacto que tuvo en la historia de México.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Revolución Mexicana')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Revolución Mexicana')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Estado Benefactor y su Crisis I -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Estado Benefactor y su Crisis I</div>
            </div>
            <div class="card-description">
                Estudio de la etapa del Estado Benefactor en México, sus políticas sociales y las crisis que comenzaron a debilitar este modelo a mediados del siglo XX.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Estado Benefactor y su Crisis I')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Estado Benefactor y su Crisis I')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Estado Benefactor y su Crisis II -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Estado Benefactor y su Crisis II</div>
            </div>
            <div class="card-description">
                Continuación del estudio del Estado Benefactor, analizando las reformas y la crisis económica que condujeron a la transición hacia un modelo neoliberal.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Estado Benefactor y su Crisis II')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Estado Benefactor y su Crisis II')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Neoliberalismo en México -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Neoliberalismo en México</div>
            </div>
            <div class="card-description">
                Análisis del modelo neoliberal en México, sus principales características, reformas económicas y su impacto en la sociedad mexicana.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Neoliberalismo en México')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Neoliberalismo en México')">Cuestionario</div>
            </div>
        </div>
        
        <!-- México Actual -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">México Actual</div>
            </div>
            <div class="card-description">
                Estudio de los problemas y retos actuales de México, incluyendo el desarrollo económico, social y político en el contexto contemporáneo.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('México Actual')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('México Actual')">Cuestionario</div>
            </div>
        </div>
    </div>

    <div id="slidesModal" class="modal">
        <span class="close" onclick="closeSlidesModal()">&times;</span>
        <div id="slides-content"></div>
    </div>

    <div id="quizModal" class="modal">
        <span class="close" onclick="closeQuizModal()">&times;</span>
        <div id="quiz-content"></div>
    </div>

    <script>
        function openSlidesModal(topic) {
            var slidesContent = document.getElementById("slides-content");
            slidesContent.innerHTML = "Aquí están las diapositivas de: " + topic;
            // Aquí deberías incluir la carga del PDF correspondiente o un enlace al archivo.
            document.getElementById("slidesModal").style.display = "block";
        }
        
        function closeSlidesModal() {
            document.getElementById("slidesModal").style.display = "none";
        }

        function openQuizModal(topic) {
            var quizContent = document.getElementById("quiz-content");
            quizContent.innerHTML = "Aquí está el cuestionario para: " + topic;
            // Aquí deberías cargar las preguntas de quiz correspondientes a cada tema.
            document.getElementById("quizModal").style.display = "block";
        }
        
        function closeQuizModal() {
            document.getElementById("quizModal").style.display = "none";
        }
    </script>
</body>

</html>