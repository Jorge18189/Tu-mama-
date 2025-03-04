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
    <h1 class="title"><a href="../materiales.php">Materiales</a> > Biología</h1>
    
    <div class="grid-container">
        <!-- Introducción a la biología -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Introducción a la biología</div>
            </div>
            <div class="card-description">
                Estudio de los principios fundamentales de la biología, incluyendo la clasificación de los seres vivos y los principios que rigen la vida.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Introducción a la biología')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Introducción a la biología')">Cuestionario</div>
            </div>
        </div>
        
        <!-- La célula: Unidad básica de la vida -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">La célula: Unidad básica de la vida</div>
            </div>
            <div class="card-description">
                Estudio de la célula como unidad básica de la vida, su estructura, funciones y tipos celulares.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('La célula: Unidad básica de la vida')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('La célula: Unidad básica de la vida')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Sistema circulatorio -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Sistema circulatorio</div>
            </div>
            <div class="card-description">
                Estudio del sistema que transporta nutrientes, oxígeno y desechos a través del cuerpo, incluyendo el corazón y los vasos sanguíneos.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Sistema circulatorio')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Sistema circulatorio')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Genética y herencia -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Genética y herencia</div>
            </div>
            <div class="card-description">
                Estudio de los principios que rigen la herencia de los caracteres biológicos, incluyendo los genes y su transmisión de una generación a otra.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Genética y herencia')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Genética y herencia')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Evolución y teorías evolutivas -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Evolución y teorías evolutivas</div>
            </div>
            <div class="card-description">
                Estudio de las teorías que explican cómo las especies cambian y se diversifican a lo largo del tiempo, incluyendo la selección natural y la genética poblacional.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Evolución y teorías evolutivas')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Evolución y teorías evolutivas')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Diversidad biológica -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Diversidad biológica</div>
            </div>
            <div class="card-description">
                Análisis de la variedad de vida en la Tierra, la clasificación de los organismos y la importancia de la biodiversidad para el equilibrio ecológico.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Diversidad biológica')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Diversidad biológica')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Biotecnología -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Biotecnología</div>
            </div>
            <div class="card-description">
                Estudio de la aplicación de organismos y sus componentes en procesos industriales, médicos y agrícolas, para resolver problemas y mejorar la calidad de vida.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Biotecnología')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Biotecnología')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Ecología -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Ecología</div>
            </div>
            <div class="card-description">
                Estudio de las interacciones entre los organismos y su ambiente, incluyendo los ecosistemas, la cadena alimenticia y la conservación del medio ambiente.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Ecología')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Ecología')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Salud y nutrición -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Salud y nutrición</div>
            </div>
            <div class="card-description">
                Análisis de los factores que influyen en la salud humana, la importancia de la alimentación balanceada y la prevención de enfermedades.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Salud y nutrición')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Salud y nutrición')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Biología molecular -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Biología molecular</div>
            </div>
            <div class="card-description">
                Estudio de los procesos biológicos a nivel molecular, incluyendo la replicación del ADN, la transcripción y traducción de los genes, y la función de las proteínas.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Biología molecular')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Biología molecular')">Cuestionario</div>
            </div>
        </div>

    <!-- Slides Modal -->
    <div id="slidesModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('slidesModal')">&times;</span>
            <h2 id="slidesTitle">Diapositivas</h2>
            <div class="pdf-container" id="pdfContainer">
                <!-- PDF will be loaded dynamically -->
            </div>
        </div>
    </div>

    <!-- Quiz Modal -->
    <div id="quizModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('quizModal')">&times;</span>
            <h2 id="quizTitle">Cuestionario</h2>
            <div class="quiz-container" id="quizContainer">
                <!-- Quiz content will be inserted dynamically -->
            </div>
            <button class="submit-button" onclick="submitQuiz()">Enviar respuestas</button>
        </div>
    </div>

    <script>
        // Open slides modal with specific PDF based on topic
        function openSlidesModal(topic) {
            document.getElementById('slidesTitle').textContent = 'Diapositivas: ' + topic;
            
            // Map topics to their respective PDF files
            const pdfMap = {
                'Introducción a la biología': 'Introduccion_a_la_biologia.pdf',
                'La célula: Unidad básica de la vida': 'La_celula.pdf',
                'Sistema circulatorio': 'Sistema_circulatorio.pdf',
                'Genética y herencia': 'Genetica_y_herencia.pdf',
                'Evolución y teorías evolutivas': 'Evolucion_y_teorias_evolutivas.pdf',
                'Diversidad biológica': 'Diversidad_biologica.pdf',
                'Biotecnología': 'Biotecnologia.pdf',
                'Ecología': 'Ecologia.pdf',
                'Salud y nutrición': 'Salud_y_nutricion.pdf',
                'Biología molecular': 'Biologia_molecular.pdf'
            };
            
              
            // Get the appropriate PDF filename
            const pdfFile = pdfMap[topic] || 'default.pdf';
            
            // Update the iframe source
            document.getElementById('pdfContainer').innerHTML = `<iframe src="../../pdf/${pdfFile}" width="100%" height="100%" frameborder="0"></iframe>`;
            
            document.getElementById('slidesModal').style.display = 'flex';
        }

        // Open quiz modal with specific questions based on topic
        function openQuizModal(topic) {
            document.getElementById('quizTitle').textContent = 'Cuestionario: ' + topic;
            
            // Get the question for this topic
            const question = getQuestionByTopic(topic);
            
            let quizHTML = `
                <div class="quiz-question">
                    <h3>Pregunta: ${question.question}</h3>
                    <div class="quiz-options">
                        ${question.options.map((option, i) => `
                            <label class="quiz-option">
                                <input type="radio" name="question" value="${i}"> ${option}
                            </label>
                        `).join('')}
                    </div>
                </div>
            `;
            
            document.getElementById('quizContainer').innerHTML = quizHTML;
            document.getElementById('quizModal').style.display = 'flex';
        }

        // Close modals
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Submit quiz (currently just a placeholder function)
        function submitQuiz() {
            alert('Respuestas enviadas');
        }
    </script>
</body>

</html>