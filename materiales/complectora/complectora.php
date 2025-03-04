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
    <h1 class="title"><a href="../materiales.php">Materiales</a> > Competencia Lectora</h1>
    
    <div class="grid-container">
        <!-- Leyes de Newton -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Leyes de Newton</div>
            </div>
            <div class="card-description">
                Tres principios fundamentales que explican la relación entre el movimiento de un objeto y las fuerzas que actúan sobre él, constituyendo la base de la mecánica clásica.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Leyes de Newton')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Leyes de Newton')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Antecedentes del magnetismo -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Antecedentes del magnetismo</div>
            </div>
            <div class="card-description">
                Estudio de los fenómenos magnéticos históricos, incluyendo su descubrimiento, primeras observaciones y desarrollo de las teorías que sentaron las bases del electromagnetismo moderno.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Antecedentes del magnetismo')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Antecedentes del magnetismo')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Cinematica de los gases -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Cinemática de los gases</div>
            </div>
            <div class="card-description">
                Estudio del movimiento de las partículas en gases, incluyendo su velocidad, distribución y comportamiento según las leyes de los gases ideales y la teoría cinética.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Cinemática de los gases')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Cinemática de los gases')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Cinematica, MRU, MRUA y Vectores -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Cinemática, MRU, MRUA y Vectores</div>
            </div>
            <div class="card-description">
                Análisis del movimiento de los cuerpos, enfocado en los movimientos rectilíneos uniformes, movimientos con aceleración constante y el uso de vectores para su descripción matemática.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Cinemática, MRU, MRUA y Vectores')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Cinemática, MRU, MRUA y Vectores')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Conceptos Básicos de Física y Teoría de Errores -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Conceptos Básicos de Física y Teoría de Errores</div>
            </div>
            <div class="card-description">
                Introducción a las magnitudes físicas fundamentales, sistemas de unidades y métodos para el análisis y tratamiento de errores experimentales en mediciones físicas.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Conceptos Básicos de Física y Teoría de Errores')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Conceptos Básicos de Física y Teoría de Errores')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Electrodinamica -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Electrodinámica</div>
            </div>
            <div class="card-description">
                Estudio del comportamiento de las cargas eléctricas en movimiento, las corrientes eléctricas y sus efectos, incluyendo circuitos eléctricos y fenómenos electromagnéticos.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Electrodinámica')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Electrodinámica')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Electrostatica -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Electrostática</div>
            </div>
            <div class="card-description">
                Rama de la física que estudia las cargas eléctricas en reposo, las fuerzas que ejercen entre sí y los campos eléctricos que generan según la ley de Coulomb.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Electrostática')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Electrostática')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Hidrodinamica -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Hidrodinámica</div>
            </div>
            <div class="card-description">
                Estudio del comportamiento de los fluidos en movimiento, incluyendo conceptos como caudal, presión dinámica, ecuación de Bernoulli y los principios del flujo laminar y turbulento.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Hidrodinámica')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Hidrodinámica')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Hidrostatica -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Hidrostática</div>
            </div>
            <div class="card-description">
                Estudio de los fluidos en equilibrio, incluyendo conceptos como presión, principio de Pascal y principio de Arquímedes, fundamentales para entender el comportamiento de líquidos en reposo.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Hidrostática')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Hidrostática')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Magnetismo y electromagnetismo -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Magnetismo y electromagnetismo</div>
            </div>
            <div class="card-description">
                Estudio de los campos magnéticos, sus propiedades y la relación entre electricidad y magnetismo, incluyendo las leyes de Ampère, Faraday y las ecuaciones de Maxwell.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Magnetismo y electromagnetismo')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Magnetismo y electromagnetismo')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Materia y sus propiedades, elasticidad -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Materia y sus propiedades, elasticidad</div>
            </div>
            <div class="card-description">
                Análisis de las propiedades físicas de la materia, con énfasis en la elasticidad, deformación de materiales, ley de Hooke y comportamiento de sólidos bajo distintas fuerzas.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Materia y sus propiedades, elasticidad')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Materia y sus propiedades, elasticidad')">Cuestionario</div>
            </div>
        </div>
        
        <!-- MRU -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">MRU</div>
            </div>
            <div class="card-description">
                Estudio del Movimiento Rectilíneo Uniforme, donde un objeto se mueve en línea recta con velocidad constante, analizando sus características, ecuaciones y aplicaciones.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('MRU')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('MRU')">Cuestionario</div>
            </div>
        </div>
        
        <!-- MRUA -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">MRUA</div>
            </div>
            <div class="card-description">
                Análisis del Movimiento Rectilíneo Uniformemente Acelerado, donde la aceleración es constante, incluyendo ecuaciones, gráficas y casos particulares como la caída libre.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('MRUA')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('MRUA')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Ondas Mecanicas -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Ondas Mecánicas</div>
            </div>
            <div class="card-description">
                Estudio de las perturbaciones que se propagan a través de un medio material, incluyendo ondas longitudinales y transversales, sus propiedades, fenómenos y aplicaciones.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Ondas Mecánicas')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Ondas Mecánicas')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Optica -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Óptica</div>
            </div>
            <div class="card-description">
                Rama de la física que estudia el comportamiento de la luz, incluyendo reflexión, refracción, difracción, interferencia y los fenómenos relacionados con su propagación e interacción con la materia.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Óptica')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Óptica')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Termodinamica -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Termodinámica</div>
            </div>
            <div class="card-description">
                Estudio de la energía térmica, su transformación en otras formas de energía y las leyes que gobiernan estos procesos, incluyendo los conceptos de temperatura, calor y entropía.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Termodinámica')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Termodinámica')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Trabajo y Energia Mecanica 2 -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Trabajo y Energía Mecánica 2</div>
            </div>
            <div class="card-description">
                Continuación del estudio de trabajo y energía, profundizando en la conservación de la energía mecánica, análisis de sistemas complejos y aplicaciones avanzadas de estos conceptos.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Trabajo y Energía Mecánica 2')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Trabajo y Energía Mecánica 2')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Trabajo y Energia Mecanica -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Trabajo y Energía Mecánica</div>
            </div>
            <div class="card-description">
                Estudio de los conceptos de trabajo, energía potencial, energía cinética y su relación, incluyendo el principio de conservación de la energía mecánica y sus aplicaciones.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Trabajo y Energía Mecánica')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Trabajo y Energía Mecánica')">Cuestionario</div>
            </div>
        </div>
        
        <!-- Vectores y Fuerzas -->
        <div class="card-container">
            <div class="card">
                <div class="card-content">Vectores y Fuerzas</div>
            </div>
            <div class="card-description">
                Análisis de los vectores como herramientas matemáticas para representar magnitudes físicas con dirección, y su aplicación al estudio de las fuerzas y sus efectos.
            </div>
            <div class="dropdown-options">
                <div class="dropdown-option" onclick="openSlidesModal('Vectores y Fuerzas')">Diapositivas</div>
                <div class="dropdown-option" onclick="openQuizModal('Vectores y Fuerzas')">Cuestionario</div>
            </div>
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
    'Leyes de Newton': 'Leyes de Newton.pdf',
    'Antecedentes del magnetismo': 'Antecedentes del magnetismo.pdf',
    'Cinemática de los gases': 'Cinematica de los gases.pdf',
    'Cinemática, MRU, MRUA y Vectores': 'Cinematica, MRU, MRUA y Vectores.pdf',
    'Conceptos Básicos de Física y Teoría de Errores': 'Conceptos Basicos de Fisica y Teoria de Errores.pdf',
    'Electrodinámica': 'Electrodinamica.pdf',
    'Electrostática': 'Electrostatica.pdf',
    'Hidrodinámica': 'Hidrodinamica.pdf',
    'Hidrostática': 'Hidrostatica.pdf',
    'Magnetismo y electromagnetismo': 'Magnetismo y electromagnetismo.pdf',
    'Materia y sus propiedades, elasticidad': 'Materia y sus propiedades, elasticidad.pdf',
    'MRU': 'MRU.pdf',
    'MRUA': 'MRUA.pdf',
    'Ondas Mecánicas': 'Ondas Mecanicas.pdf',
    'Óptica': 'Optica.pdf',
    'Termodinámica': 'Termodinamica.pdf',
    'Trabajo y Energía Mecánica 2': 'Trabajo y Energia Mecanica 2.pdf',
    'Trabajo y Energía Mecánica': 'Trabajo y Energia Mecanica.pdf',
    'Vectores y Fuerzas': 'Vectores y Fuerzas.pdf'
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

        // Submit quiz function (no actual functionality)
        function submitQuiz() {
            alert('¡Respuestas enviadas correctamente!');
            closeModal('quizModal');
        }

        // Close modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                event.target.style.display = 'none';
            }
        }

        // Get single question based on topic
        function getQuestionByTopic(topic) {
            const questionMap = {
                'Leyes de Newton': {
                    question: 'La primera ley de Newton establece que:',
                    options: ['Un cuerpo permanece en reposo o en movimiento rectilíneo uniforme a menos que actúe sobre él una fuerza externa', 'La fuerza es igual a la masa por la aceleración', 'A toda acción le corresponde una reacción igual y opuesta', 'La fuerza de atracción entre dos cuerpos es proporcional al producto de sus masas']
                },
                'Antecedentes del magnetismo': {
                    question: '¿Cuál civilización antigua descubrió la magnetita y sus propiedades?',
                    options: ['Los griegos', 'Los chinos', 'Los egipcios', 'Los romanos']
                },
                'Cinemática de los gases': {
                    question: '¿Qué teoría describe el comportamiento de las partículas en un gas?',
                    options: ['Teoría cinética de los gases', 'Teoría atómica', 'Mecánica cuántica', 'Termodinámica clásica']
                },
                'Cinemática, MRU, MRUA y Vectores': {
                    question: 'En el MRUA, ¿qué magnitud permanece constante?',
                    options: ['La aceleración', 'La velocidad', 'La posición', 'La energía']
                },
                'Conceptos Básicos de Física y Teoría de Errores': {
                    question: '¿Qué tipo de error se debe a limitaciones del instrumento de medida?',
                    options: ['Error sistemático', 'Error aleatorio', 'Error absoluto', 'Error relativo']
                },
                'Electrodinámica': {
                    question: '¿Qué ley relaciona la fuerza electromotriz inducida con la variación del flujo magnético?',
                    options: ['Ley de Faraday', 'Ley de Ohm', 'Ley de Coulomb', 'Ley de Ampère']
                },
                'Electrostática': {
                    question: 'La ley de Coulomb establece que la fuerza entre dos cargas es:',
                    options: ['Proporcional al producto de las cargas e inversamente proporcional al cuadrado de la distancia', 'Proporcional a la suma de las cargas', 'Inversamente proporcional a la distancia', 'Proporcional al cuadrado de las cargas']
                },
                'Hidrodinámica': {
                    question: 'El principio de Bernoulli relaciona:',
                    options: ['Presión, velocidad y altura de un fluido', 'Densidad y viscosidad', 'Temperatura y presión', 'Masa y volumen']
                },
                'Hidrostática': {
                    question: '¿Qué principio establece que todo cuerpo sumergido en un fluido experimenta un empuje vertical hacia arriba?',
                    options: ['Principio de Arquímedes', 'Principio de Pascal', 'Principio de Bernoulli', 'Ley de Hooke']
                },
                'Magnetismo y electromagnetismo': {
                    question: '¿Quién formuló las ecuaciones fundamentales del electromagnetismo?',
                    options: ['James Clerk Maxwell', 'Michael Faraday', 'Nikola Tesla', 'Thomas Edison']
                },
                'Materia y sus propiedades, elasticidad': {
                    question: 'La ley de Hooke se aplica a:',
                    options: ['Materiales elásticos dentro de su límite de elasticidad', 'Todos los materiales independientemente de la fuerza aplicada', 'Solamente líquidos', 'Materiales plásticos']
                },
                'MRU': {
                    question: 'En el Movimiento Rectilíneo Uniforme:',
                    options: ['La velocidad es constante', 'La aceleración es constante', 'La posición es constante', 'La fuerza es constante']
                },
                'MRUA': {
                    question: 'En la caída libre, ¿qué valor aproximado tiene la aceleración?',
                    options: ['9.8 m/s²', '3.14 m/s²', '5.5 m/s²', '12 m/s²']
                },
                'Ondas Mecánicas': {
                    question: 'Las ondas que requieren un medio material para propagarse se llaman:',
                    options: ['Ondas mecánicas', 'Ondas electromagnéticas', 'Ondas de radio', 'Ondas cuánticas']
                },
                'Óptica': {
                    question: '¿Qué fenómeno explica el arcoíris?',
                    options: ['Refracción y reflexión de la luz', 'Difracción de la luz', 'Emisión de fotones', 'Absorción de fotones']
                },
                'Termodinámica': {
                    question: 'La primera ley de la termodinámica es una expresión del principio de:',
                    options: ['Conservación de la energía', 'Aumento de la entropía', 'Equilibrio térmico', 'Conservación de la masa']
                },
                'Trabajo y Energía Mecánica 2': {
                    question: '¿Qué se conserva en un sistema aislado sin rozamiento?',
                    options:                    ['La energía mecánica', 'La cantidad de movimiento', 'La masa', 'La temperatura']
                },
                'Trabajo y Energía Mecánica': {
                    question: 'El trabajo realizado por una fuerza se calcula como:',
                    options: ['Fuerza por desplazamiento por coseno del ángulo', 'Fuerza por velocidad', 'Masa por aceleración', 'Fuerza por tiempo']
                },
                'Vectores y Fuerzas': {
                    question: '¿Qué propiedad de los vectores permite sumarlos?',
                    options: ['Tienen magnitud y dirección', 'Son escalares', 'Tienen solo magnitud', 'Tienen solo dirección']
                }
            };

            return questionMap[topic] || { question: 'Pregunta no disponible', options: ['Opción 1', 'Opción 2', 'Opción 3', 'Opción 4'] };
        }
    </script>
</body>
</html>