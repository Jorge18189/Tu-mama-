<?php
    // inicio.php
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
    <title>Programas Académicos UNAM e IPN</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --unam-azul: #002147;
            --unam-oro: #B38E5D;
            --ipn-vino: #7A1937;
            --ipn-blanco: #FFFFFF;
            --gris-claro: #f5f5f5;
            --gris-oscuro: #333;
        }

        body {
            background-color: var(--gris-claro);
            color: var(--gris-oscuro);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

       
        /* Hero Section */
        .hero {
            background: url('../imagenes/unamvsipn.jpeg') center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            margin-top: 0px;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            background-color: var(--unam-azul);
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            margin: 0 10px;
        }

        .btn-ipn {
            background-color: var(--ipn-vino);
        }

        .btn:hover {
            transform: translateY(-.1px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Sección de Instituciones */
        .instituciones {
    padding: 80px 0;
}

.section-title {
    text-align: center;
    margin-bottom: 50px;
    position: relative;
}

.section-title h2 {
    font-size: 2.5rem;
    color: var(--gris-oscuro);
}

.section-title::after {
    content: '';
    width: 100px;
    height: 3px;
    background: linear-gradient(to right, var(--unam-azul), var(--ipn-vino));
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
}

.instituciones-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

.institucion-card {
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}



.institucion-header {
    height: 400px;
    overflow: hidden;
}

.institucion-header img {
    width: 100%; /* Ocupa todo el ancho del contenedor */
    height: 100%; /* Ocupa todo el alto del contenedor */
    object-fit: cover; /* Ajusta la imagen para cubrir el espacio sin distorsionar */
    transition: transform 0.5s;
}



.institucion-body {
    padding: 30px;
}

.institucion-body h3 {
    font-size: 1.8rem;
    margin-bottom: 15px;
}

.unam-title {
    color: var(--unam-azul);
}

.ipn-title {
    color: var(--ipn-vino);
}

.institucion-body p {
    margin-bottom: 20px;
}
        /* Sección de Programas */
        .programas {
            padding: 80px 0;
            background-color: white;
        }

        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .tab-btn {
            padding: 12px 24px;
            background-color: #f0f0f0;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
            margin: 0 5px;
        }

        .tab-btn.active {
            background-color: var(--unam-azul);
            color: white;
        }

        .tab-btn.ipn.active {
            background-color: var(--ipn-vino);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .programa-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .programa-card {
            background-color: var(--gris-claro);
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .programa-card:hover {
            transform: translateY(-0.3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .programa-card h4 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--unam-azul);
        }

        .tab-content.ipn-content .programa-card h4 {
            color: var(--ipn-vino);
        }

        .programa-card p {
            font-size: 0.9rem;
        }

        .programa-meta {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 0.8rem;
            color: #777;
        }

        /* Sección Comparativa */
        .comparativa {
            padding: 80px 0;
            background-color: var(--gris-claro);
        }

        .tabla-comparativa {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .tabla-comparativa th, 
        .tabla-comparativa td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .tabla-comparativa th {
            background-color: var(--gris-oscuro);
            color: white;
        }

        .tabla-comparativa tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .tabla-comparativa tr:hover {
            background-color: #f0f0f0;
        }

        .unam-col {
            background-color: rgba(0, 33, 71, 0.05);
        }

        .ipn-col {
            background-color: rgba(122, 25, 55, 0.05);
        }

        /* Sección de Recursos */
        .recursos {
            padding: 80px 0;
            background-color: white;
        }

        .recursos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
        }

        .recurso-card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: var(--gris-claro);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .recurso-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .recurso-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--unam-azul);
        }

        .recurso-card h4 {
            margin-bottom: 15px;
        }

        /* Sección de Preguntas Frecuentes */
        .faq {
            padding: 80px 0;
            background-color: var(--gris-claro);
        }

        .accordion {
            max-width: 800px;
            margin: 0 auto;
        }

        .accordion-item {
            margin-bottom: 10px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .accordion-header {
            background-color: white;
            padding: 15px 20px;
            cursor: pointer;
            position: relative;
            font-weight: bold;
            transition: all 0.3s;
        }

        .accordion-header:hover {
            background-color: #f9f9f9;
        }

        .accordion-header::after {
            content: '+';
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
        }

        .accordion-item.active .accordion-header::after {
            content: '-';
        }

        .accordion-content {
            background-color: white;
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .accordion-item.active .accordion-content {
            padding: 20px;
            max-height: 1000px;
        }

        /* Sección de Contacto */
        
        /* Barra de búsqueda */
        .search-bar {
            position: relative;
            max-width: 500px;
            margin: 0 auto 50px;
        }

        .search-bar input {
            width: 100%;
            padding: 15px 20px;
            border-radius: 30px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
        }

        .search-bar button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--unam-azul);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-bar button:hover {
            background-color: var(--ipn-vino);
        }

        /* Sección de Estadísticas */
        .stats {
            background: linear-gradient(135deg, var(--unam-azul), var(--ipn-vino));
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .stat-item {
            padding: 20px;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: var(--unam-oro);
        }

        .stat-label {
            font-size: 1.1rem;
        }

        /* Calendario de Eventos */
        .calendario {
            padding: 80px 0;
        }

        .calendar {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .month-header {
            background-color: var(--unam-azul);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .month-header h3 {
            font-size: 1.5rem;
        }

        .weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            padding: 10px 0;
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            grid-gap: 5px;
            padding: 10px;
        }

        .day {
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .day:hover {
            background-color: #f0f0f0;
        }

        .day.today {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .day.has-event {
            background-color: rgba(0, 33, 71, 0.1);
            position: relative;
        }

        .day.has-event.ipn-event {
            background-color: rgba(122, 25, 55, 0.1);
        }

        .day.has-event::after {
            content: '';
            position: absolute;
            width: 6px;
            height: 6px;
            background-color: var(--unam-azul);
            border-radius: 50%;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
        }

        .day.has-event.ipn-event::after {
            background-color: var(--ipn-vino);
        }

        .event-list {
            margin-top: 30px;
        }

        .event-item {
            padding: 15px;
            border-left: 3px solid var(--unam-azul);
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 0 5px 5px 0;
            transition: all 0.3s;
        }

        .event-item.ipn-event {
            border-left-color: var(--ipn-vino);
        }

        .event-item:hover {
            transform: translateX(5px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .event-date {
            color: #777;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .event-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Media Queries */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .instituciones-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            nav ul {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--unam-azul);
                flex-direction: column;
                padding: 20px;
            }

            nav ul.active {
                display: flex;
            }

            nav ul li {
                margin: 10px 0;
            }

            .mobile-menu-btn {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .section-title h2 {
                font-size: 1.8rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .btn {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    

    <!-- Botón volver arriba -->
    <a href="#" class="back-to-top">▲</a>

    <!-- Header / Navegación -->
    

    <!-- Hero Section -->
    <section class="hero" id="inicio">
        <div class="container hero-content">
            <h1>Descubre los Programas Académicos de UNAM e IPN</h1>
            <p>Explora las opciones educativas de las dos instituciones más prestigiosas de México y encuentra el programa perfecto para tu futuro profesional.</p>
            <div>
                <a href="#programas-unam" class="btn">Programas UNAM</a>
                <a href="#programas-ipn" class="btn btn-ipn">Programas IPN</a>
            </div>
        </div>
    </section>

    <!-- Sección Instituciones -->
    <section class="instituciones" id="instituciones">
        <div class="container">
            <div class="section-title">
                <h2>Nuestras Instituciones</h2>
            </div>
            <div class="instituciones-grid">
                <div class="institucion-card">
                    <div class="institucion-header">
                        <img src="../imagenes/unam.png" alt="UNAM">
                    </div>
                    <div class="institucion-body">
                        <h3 class="unam-title">Universidad Nacional Autónoma de México</h3>
                        <p>Fundada el 21 de septiembre de 1551 con el nombre de Real y Pontificia Universidad de México, es la universidad más grande e importante de México, así como una de las mejores universidades de Iberoamérica.</p>
                        <p>Con una comunidad de más de 360,000 estudiantes, ofrece 128 carreras y programas de licenciatura, además de 41 programas de posgrado con 92 planes de maestría y doctorado.</p>
                        <a href="#programas-unam" class="btn">Ver Programas</a>
                    </div>
                </div>
                <div class="institucion-card">
                    <div class="institucion-header">
                        <img src="../imagenes/ipn.jpg" alt="IPN">
                    </div>
                    <div class="institucion-body">
                        <h3 class="ipn-title">Instituto Politécnico Nacional</h3>
                        <p>Fundado en 1936, el IPN es la institución educativa del Estado mexicano dedicada a la formación de profesionales en los campos de la ciencia, la tecnología y otras disciplinas.</p>
                        <p>Con una matrícula de más de 180,000 estudiantes, ofrece más de 60 programas académicos de nivel superior en sus distintas escuelas y unidades, enfocándose especialmente en ingeniería, tecnología y ciencias exactas.</p>
                        <a href="#programas-ipn" class="btn btn-ipn">Ver Programas</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Estadísticas -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number" id="contador-carreras">200+</div>
                    <div class="stat-label">Programas Académicos</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="contador-estudiantes">500K+</div>
                    <div class="stat-label">Estudiantes</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="contador-campus">40+</div>
                    <div class="stat-label">Campus</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="contador-egresados">5M+</div>
                    <div class="stat-label">Egresados</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Programas -->
    <section class="programas" id="programas">
        <div class="container">
            <div class="section-title">
                <h2>Programas Académicos</h2>
            </div>
            <div class="search-bar">
                <input type="text" id="search-program" placeholder="Buscar programa académico...">
                <button type="button">🔍</button>
            </div>
            <div class="tabs">
                <button class="tab-btn active" data-tab="unam-content">UNAM</button>
                <button class="tab-btn ipn" data-tab="ipn-content">IPN</button>
            </div>
            <div class="tab-content unam-content active">
                <div class="programa-list">
                    <div class="programa-card">
                        <h4>Ingeniería en Computación</h4>
                        <p>Forma profesionales capaces de diseñar, implementar y administrar sistemas computacionales para resolver problemas en diversos sectores.</p>
                        <div class="programa-meta">
                            <span>Duración: 10 semestres</span>
                            <span>Modalidad: Presencial</span>
                        </div>
                    </div>
                    <div class="programa-card">
                        <h4>Medicina</h4>
                        <p>Prepara a los estudiantes para diagnosticar, tratar y prevenir enfermedades, así como para promover la salud en la población.</p>
                        <div class="programa-meta">
                            <span>Duración: 12 semestres</span>
                            <span>Modalidad: Presencial</span>
                        </div>
                    </div>
                    <div class="programa-card">
                        <h4>Derecho</h4>
                        <p>Forma abogados con una sólida base teórica y práctica en el ámbito jurídico, capaces de ejercer en diversos campos del derecho.</p>
                        <div class="programa-meta">
                            <span>Duración: 10 semestres</span>
                            <span>Modalidad: Presencial</span>
                        </div>
                    </div>
                    <div class="programa-card">
                        <h4>Arquitectura</h4>
                        <p>Desarrolla habilidades para diseñar y construir espacios habitables, considerando aspectos estéticos, funcionales y sustentables.</p>
                        <div class="programa-meta">
                            <span>Duración: 10 semestres</span>
                            <span>Modalidad: Presencial</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content ipn-content">
                <div class="programa-list">
                    <div class="programa-card">
                        <h4>Ingeniería en Sistemas Computacionales</h4>
                        <p>Forma profesionales expertos en el desarrollo de software, redes y sistemas informáticos para la industria y la investigación.</p>
                        <div class="programa-meta">
                            <span>Duración: 9 semestres</span>
                            <span>Modalidad: Presencial</span>
                        </div>
                    </div>
                    <div class="programa-card">
                        <h4>Ingeniería Mecánica</h4>
                        <p>Prepara a los estudiantes para diseñar, analizar y mantener sistemas mecánicos en diversas industrias.</p>
                        <div class="programa-meta">
                            <span>Duración: 9 semestres</span>
                            <span>Modalidad: Presencial</span>
                        </div>
                    </div>
                    <div class="programa-card">
                        <h4>Ingeniería Eléctrica</h4>
                        <p>Forma profesionales capaces de diseñar, implementar y mantener sistemas eléctricos y de energía.</p>
                        <div class="programa-meta">
                            <span>Duración: 9 semestres</span>
                            <span>Modalidad: Presencial</span>
                        </div>
                    </div>
                    <div class="programa-card">
                        <h4>Ingeniería en Biotecnología</h4>
                        <p>Desarrolla habilidades para aplicar principios biológicos y tecnológicos en la creación de productos y procesos innovadores.</p>
                        <div class="programa-meta">
                            <span>Duración: 9 semestres</span>
                            <span>Modalidad: Presencial</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Comparativa -->
    <section class="comparativa" id="comparativa">
        <div class="container">
            <div class="section-title">
                <h2>Comparativa UNAM vs IPN</h2>
            </div>
            <div class="tabla-comparativa">
                <table>
                    <thead>
                        <tr>
                            <th>Aspecto</th>
                            <th class="unam-col">UNAM</th>
                            <th class="ipn-col">IPN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fundación</td>
                            <td class="unam-col">1551</td>
                            <td class="ipn-col">1936</td>
                        </tr>
                        <tr>
                            <td>Número de Carreras</td>
                            <td class="unam-col">128</td>
                            <td class="ipn-col">60+</td>
                        </tr>
                        <tr>
                            <td>Matrícula</td>
                            <td class="unam-col">360,000+</td>
                            <td class="ipn-col">180,000+</td>
                        </tr>
                        <tr>
                            <td>Enfoque Principal</td>
                            <td class="unam-col">Ciencias Sociales, Humanidades, Ciencias Exactas</td>
                            <td class="ipn-col">Ingeniería, Tecnología, Ciencias Exactas</td>
                        </tr>
                        <tr>
                            <td>Modalidades</td>
                            <td class="unam-col">Presencial, A distancia</td>
                            <td class="ipn-col">Presencial</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Sección de Recursos -->
    <section class="recursos" id="recursos">
        <div class="container">
            <div class="section-title">
                <h2>Recursos para Estudiantes</h2>
            </div>
            <div class="recursos-grid">
                <div class="recurso-card">
                    <div class="recurso-icon">📚</div>
                    <h4>Biblioteca Digital</h4>
                    <p>Acceso a miles de libros, artículos y recursos académicos en línea.</p>
                </div>
                <div class="recurso-card">
                    <div class="recurso-icon">💻</div>
                    <h4>Plataforma Virtual</h4>
                    <p>Herramientas y cursos en línea para complementar tu formación.</p>
                </div>
                <div class="recurso-card">
                    <div class="recurso-icon">🎓</div>
                    <h4>Becas y Financiamiento</h4>
                    <p>Información sobre becas, créditos y apoyos económicos.</p>
                </div>
                <div class="recurso-card">
                    <div class="recurso-icon">🏢</div>
                    <h4>Bolsa de Trabajo</h4>
                    <p>Oportunidades laborales y prácticas profesionales.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Preguntas Frecuentes -->
    <section class="faq" id="faq">
        <div class="container">
            <div class="section-title">
                <h2>Preguntas Frecuentes</h2>
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-header">¿Cómo puedo ingresar a la UNAM o al IPN?</div>
                    <div class="accordion-content">
                        <p>Para ingresar a la UNAM o al IPN, debes presentar el examen de admisión correspondiente. En el caso de la UNAM, también se considera el promedio de bachillerato. Te recomendamos visitar los sitios oficiales de ambas instituciones para más detalles.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">¿Qué carreras ofrecen la UNAM y el IPN?</div>
                    <div class="accordion-content">
                        <p>La UNAM ofrece más de 128 carreras en áreas como Ciencias Sociales, Humanidades, Ciencias Exactas y más. El IPN, por su parte, ofrece más de 60 carreras, principalmente en Ingeniería, Tecnología y Ciencias Exactas.</p>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">¿Hay programas de becas disponibles?</div>
                    <div class="accordion-content">
                        <p>Sí, ambas instituciones cuentan con programas de becas y apoyos económicos para estudiantes. Puedes consultar los requisitos y convocatorias en sus respectivas páginas web.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <!-- Scripts -->
    <script>
        // Script para el menú móvil
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const mainMenu = document.querySelector('#main-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mainMenu.classList.toggle('active');
        });

        // Script para el botón de volver arriba
        const backToTop = document.querySelector('.back-to-top');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        // Script para el acordeón de preguntas frecuentes
        const accordionItems = document.querySelectorAll('.accordion-item');

        accordionItems.forEach(item => {
            const header = item.querySelector('.accordion-header');
            header.addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });

        // Script para las pestañas de programas
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.getAttribute('data-tab');

                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                button.classList.add('active');
                document.querySelector(`.${targetTab}`).classList.add('active');
            });
        });

        // Script para el contador de estadísticas
        const counters = document.querySelectorAll('.stat-number');
        const speed = 200;

        const animateCounters = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText.replace('+', '');

                if (count < target) {
                    counter.innerText = Math.ceil(count + (target / speed)) + '+';
                    setTimeout(animateCounters, 1);
                } else {
                    counter.innerText = target + '+';
                }
            });
        };

        window.addEventListener('scroll', () => {
            const statsSection = document.querySelector('.stats');
            const sectionTop = statsSection.getBoundingClientRect().top;

            if (sectionTop < window.innerHeight - 100) {
                animateCounters();
            }
        });
    </script>
</body>
</html>