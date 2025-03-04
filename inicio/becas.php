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
    <title>Sistema Integral de Becas UNAM e IPN</title>
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
            --verde-unam: #00A45A;
            --dorado-oscuro: #8A6E3D;
            --azul-acero: #3B5998;
            --vino-claro: #9E2A50;
            --gris-medio: #888;
            --shadow-sm: 0 2px 5px rgba(0,0,0,0.1);
            --shadow-md: 0 5px 15px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 25px rgba(0,0,0,0.15);
            --radius-sm: 4px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --transition-fast: all 0.2s ease;
            --transition-normal: all 0.3s ease;
            --transition-slow: all 0.5s ease;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--gris-claro);
            color: var(--gris-oscuro);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section {
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
            margin-bottom: 15px;
        }

        .section-title p {
            color: var(--gris-medio);
            max-width: 700px;
            margin: 0 auto;
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

        .btn {
            display: inline-block;
            background-color: var(--unam-azul);
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: var(--transition-normal);
            margin: 0 10px;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-ipn {
            background-color: var(--ipn-vino);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--unam-azul);
            color: var(--unam-azul);
        }

        .btn-outline-ipn {
            border-color: var(--ipn-vino);
            color: var(--ipn-vino);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .unam-color {
            color: var(--unam-azul);
        }

        .ipn-color {
            color: var(--ipn-vino);
        }

        /* Sección Hero */
        .hero {
            height: 100vh;
            background: url('../imagenes/becas.jpeg') center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .hero-logos {
            display: flex;

            justify-content: center;
            margin-bottom: 30px;
        }

        .hero-logo {
            height: 80px;
            margin: 0 20px;
            filter: drop-shadow(0 3px 5px rgba(0,0,0,0.3));
        }

        .btn-hero {
            margin-top: 20px;
            font-size: 1.1rem;
            padding: 15px 30px;
        }

        /* Sección de tipos de becas */
        .tipos-becas {
            padding: 100px 0;
            background-color: white;
        }

        .becas-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            border-bottom: 1px solid #e0e0e0;
        }

        .tab-btn {
            padding: 15px 30px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--gris-medio);
            position: relative;
            transition: var(--transition-fast);
        }

        .tab-btn::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: linear-gradient(to right, var(--unam-azul), var(--ipn-vino));
            transition: var(--transition-normal);
        }

        .tab-btn.active {
            color: var(--gris-oscuro);
        }

        .tab-btn.active::after {
            width: 80%;
        }

        .tabs-content {
            margin-top: 30px;
        }

        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .becas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .beca-card {
            background-color: white;
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition-normal);
            position: relative;
            z-index: 1;
        }

        .beca-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom right, var(--unam-azul), var(--ipn-vino));
            opacity: 0;
            z-index: -1;
            transition: var(--transition-normal);
        }

        

        

        .beca-header {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .beca-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: bold;
            z-index: 2;
        }

        .tag-unam {
            background-color: var(--unam-azul);
            color: white;
        }

        .tag-ipn {
            background-color: var(--ipn-vino);
            color: white;
        }

        .beca-header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-slow);
        }

        

        .beca-body {
            padding: 30px;
        }

        .beca-body h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            position: relative;
            padding-bottom: 10px;
        }

        .beca-body h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
        }

        .unam-title h3::after {
            background-color: var(--unam-azul);
        }

        .ipn-title h3::after {
            background-color: var(--ipn-vino);
        }

        .beca-body p {
            margin-bottom: 20px;
            color: var(--gris-medio);
        }

        .beca-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 0.9rem;
            color: var(--gris-medio);
        }

        .meta-item {
            display: flex;
            align-items: center;
        }

        .meta-item i {
            margin-right: 5px;
            font-size: 1rem;
        }

        .beca-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #f0f0f0;
            padding-top: 20px;
        }

        .beca-monto {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .unam-monto {
            color: var(--unam-azul);
        }

        .ipn-monto {
            color: var(--ipn-vino);
        }

        /* Sección de requisitos */
        .requisitos {
            background-color: #f9f9f9;
            padding: 100px 0;
        }

        .requisitos-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
            align-items: center;
        }

        .requisitos-img {
            position: relative;
            height: 500px;
            overflow: hidden;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
        }

        .requisitos-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .requisitos-content h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 15px;
        }

        .requisitos-content h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--unam-azul), var(--ipn-vino));
        }

        .requisitos-list {
            margin-top: 30px;
        }

        .requisito-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .requisito-icon {
            width: 50px;
            height: 50px;
            min-width: 50px;
            background: linear-gradient(135deg, var(--unam-azul), var(--ipn-vino));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 20px;
            font-size: 1.5rem;
        }

        .requisito-text h4 {
            font-size: 1.2rem;
            margin-bottom: 8px;
        }

        .requisito-text p {
            color: var(--gris-medio);
        }

        /* Sección de proceso */
        .proceso {
            padding: 100px 0;
            background-color: white;
        }

        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 50px auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background: linear-gradient(to bottom, var(--unam-azul), var(--ipn-vino));
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: white;
            border: 4px solid var(--unam-azul);
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        .timeline-left {
            left: 0;
        }

        .timeline-right {
            left: 50%;
        }

        .timeline-left::after {
            right: -12px;
        }

        .timeline-right::after {
            left: -12px;
            border-color: var(--ipn-vino);
        }

        .timeline-content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
        }

        .timeline-content h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .timeline-content p {
            margin-bottom: 0;
            color: var(--gris-medio);
        }

        .timeline-content::after {
            content: '';
            position: absolute;
            border-width: 10px;
            border-style: solid;
            top: 15px;
        }

        .timeline-left .timeline-content::after {
            right: -20px;
            border-color: transparent transparent transparent white;
        }

        .timeline-right .timeline-content::after {
            left: -20px;
            border-color: transparent white transparent transparent;
        }

        /* Sección de calendario */
        .calendario {
            padding: 100px 0;
            background-color: #f9f9f9;
        }

        .calendario-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .calendario-tab {
            padding: 10px 20px;
            background-color: white;
            border: 1px solid #e0e0e0;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition-fast);
        }

        .calendario-tab:first-child {
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
        }

        .calendario-tab:last-child {
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
        }

        .calendario-tab.active {
            background-color: var(--unam-azul);
            color: white;
            border-color: var(--unam-azul);
        }

        .calendario-tab.active.ipn-tab {
            background-color: var(--ipn-vino);
            border-color: var(--ipn-vino);
        }

        .calendario-content {
            background-color: white;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            padding: 30px;
        }

        .calendario-panel {
            display: none;
        }

        .calendario-panel.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .eventos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .evento-card {
            background-color: white;
            border-radius: var(--radius-sm);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border-left: 5px solid var(--unam-azul);
            padding: 20px;
            transition: var(--transition-normal);
        }

        .evento-card.ipn-card {
            border-left-color: var(--ipn-vino);
        }

        .evento-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .evento-fecha {
            font-size: 0.9rem;
            color: var(--gris-medio);
            margin-bottom: 10px;
        }

        .evento-titulo {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .evento-desc {
            color: var(--gris-medio);
            font-size: 0.95rem;
        }

        /* Sección de preguntas frecuentes */
        .faq {
            padding: 100px 0;
            background-color: white;
        }

        .accordion {
            max-width: 900px;
            margin: 0 auto;
        }

        .accordion-item {
            margin-bottom: 20px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            background-color: #f9f9f9;
        }

        .accordion-header {
            padding: 20px 30px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            transition: var(--transition-fast);
        }

        .accordion-header:hover {
            background-color: #f9f9f9;
        }

        .accordion-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--gris-oscuro);
        }

        .accordion-icon {
            width: 24px;
            height: 24px;
            position: relative;
            transform: rotate(0deg);
            transition: var(--transition-normal);
        }

        .accordion-icon::before,
        .accordion-icon::after {
            content: '';
            position: absolute;
            background-color: var(--gris-oscuro);
            transition: var(--transition-normal);
        }

        .accordion-icon::before {
            width: 2px;
            height: 24px;
            left: 11px;
            top: 0;
        }

        .accordion-icon::after {
            width: 24px;
            height: 2px;
            left: 0;
            top: 11px;
        }

        .accordion-item.active .accordion-icon {
            transform: rotate(45deg);
        }

        .accordion-content {
            max-height: 0;
            overflow: hidden;
            padding: 0 30px;
            background-color: #f9f9f9;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .accordion-item.active .accordion-content {
            max-height: 500px;
            padding: 20px 30px;
        }

        .accordion-body {
            color: var(--gris-medio);
            line-height: 1.8;
        }

        /* Sección de testimonios */
        .testimonios {
            padding: 100px 0;
            background-color: #f9f9f9;
        }

        .testimonios-slider {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .testimonios-track {
            display: flex;
            transition: transform 0.5s ease;
        }

        .testimonio {
            min-width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .testimonio-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: var(--shadow-md);
            border: 5px solid white;
        }

        .testimonio-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonio-content {
            max-width: 800px;
        }

        .testimonio-text {
            font-size: 1.2rem;
            margin-bottom: 20px;
            line-height: 1.8;
            position: relative;
            padding: 0 30px;
        }

        .testimonio-text::before,
        .testimonio-text::after {
            content: '"';
            font-size: 3rem;
            color: var(--gris-claro);
            position: absolute;
            line-height: 1;
        }

        .testimonio-text::before {
            top: -10px;
            left: 0;
        }

        .testimonio-text::after {
            bottom: -40px;
            right: 0;
        }

        .testimonio-autor {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .testimonio-info {
            color: var(--gris-medio);
            font-size: 0.9rem;
        }

        .testimonios-dots {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #e0e0e0;
            margin: 0 5px;
            cursor: pointer;
            transition: var(--transition-fast);
        }

        .dot.active {
            background-color: var(--gris-oscuro);
        }

        .testimonios-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: white;
            border-radius: 50%;
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition-fast);
            z-index: 2;
        }

        .testimonios-nav:hover {
            background-color: var(--unam-azul);
            color: white;
        }

        .nav-prev {
            left: -25px;
        }

        .nav-next {
            right: -25px;
        }

        /* Sección de contacto */
        .contacto {
            padding: 100px 0;
            background-color: white;
        }

        .contacto-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
        }

        .contacto-info {
            padding-right: 50px;
        }

        .contacto-info h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 15px;
        }

        .contacto-info h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--unam-azul), var(--ipn-vino));
        }

        .contacto-desc {
            margin-bottom: 30px;
            color: var(--gris-medio);
            line-height: 1.8;
        }

        .contacto-metodos {
            margin-top: 40px;
        }

        .contacto-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .contacto-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--unam-azul), var(--ipn-vino));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 20px;
            font-size: 1.2rem;
        }

        .contacto-text h4 {
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .contacto-text p, .contacto-text a {
            color: var(--gris-medio);
            text-decoration: none;
            transition: var(--transition-fast);
        }

        .contacto-text a:hover {
            color: var(--unam-azul);
        }

        .contacto-form {
            background-color: white;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            padding: 40px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: var(--radius-sm);
            transition: var(--transition-fast);
        }

        .form-control:focus {
            border-color: var(--unam-azul);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 33, 71, 0.1);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .form-btn {
            background: linear-gradient(135deg, var(--unam-azul), var(--ipn-vino));
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
            width: 100%;
        }

        .form-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        /* Modal de beca */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            overflow-y: auto;
            padding: 50px 0;
        }

        .modal-content {
            background-color: white;
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modal-header {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .modal-header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.5rem;
            box-shadow: var(--shadow-md);
            transition: var(--transition-fast);
            z-index: 2;
        }

        .modal-close:hover {
            background-color: var(--gris-oscuro);
            color: white;
        }

        .modal-body {
            padding: 40px;
        }

        .modal-title {
            font-size: 2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 15px;
        }

        .modal-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--unam-azul), var(--ipn-vino));
        }

        .modal-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: var(--radius-sm);
        }

        .info-item {
            text-align: center;
        }

        .info-label {
            font-size: 0.9rem;
            color: var(--gris-medio);
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .modal-description {
            margin-bottom: 30px;
            line-height: 1.8;
            color: var(--gris-medio);
        }

        .modal-section {
            margin-bottom: 30px;
        }

        .modal-section h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: var(--gris-oscuro);
        }

        .requisitos-list-modal {
            list-style: none;
        }

        .requisito-modal {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .requisito-check {
            color: #4CAF50;
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .documentos-list {
            list-style: none;
        }

        .documento-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .documento-icon {
            margin-right: 15px;
            color: var(--unam-azul);
            font-size: 1.2rem;
        }

        .fechas-list {
            list-style: none;
        }

        .fecha-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            position: relative;
            padding-left: 30px;
        }

        .fecha-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 10px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--unam-azul);
        }

        .fecha-item.ipn::before {
            background-color: var(--ipn-vino);
        }

        .fecha-label {
            font-weight: 600;
            margin-right: 10px;
            color: var(--gris-oscuro);
        }

        .modal-footer {
            display: flex;
            justify-content: space-between;
            padding: 30px 40px;
            background-color: #f9f9f9;
            border-top: 1px solid #e0e0e0;
        }

        .compartir-buttons {
            display: flex;
        }

        .share-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: white;
            transition: var(--transition-fast);
        }

        .btn-facebook {
            background-color: #3b5998;
        }

        .btn-twitter {
            background-color: #1da1f2;
        }

        .btn-whatsapp {
            background-color: #25d366;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-sm);
        }

        /* Sección de botón flotante */
        .floating-btn {
            position: fixed;
            bottom: 40px;
            right: 40px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--unam-azul), var(--ipn-vino));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: var(--shadow-lg);
            cursor: pointer;
            transition: var(--transition-normal);
            z-index: 99;
        }

        .floating-btn:hover {
            transform: translateY(-5px) scale(1.05);
        }

        .floating-icon {
            font-size: 1.5rem;
        }

        /* Sección de notificaciones */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background-color: white;
            color: var(--gris-oscuro);
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            transform: translateX(calc(100% + 40px));
            transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            z-index: 1000;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification-icon {
            margin-right: 15px;
            font-size: 1.5rem;
        }

        .notification-success .notification-icon {
            color: #4CAF50;
        }

        .notification-error .notification-icon {
            color: #F44336;
        }

        .notification-text {
            font-weight: 500;
        }

        /* Utilidades de animación */
        .animate-fadeIn {
            animation: fadeIn 1s ease;
        }

        .animate-slideLeft {
            animation: slideLeft 1s ease;
        }

        .animate-slideRight {
            animation: slideRight 1s ease;
        }

        .animate-slideUp {
            animation: slideUp 1s ease;
        }

        @keyframes slideLeft {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideRight {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .section-title h2 {
                font-size: 2.2rem;
            }
            
            .hero h1 {
                font-size: 3.5rem;
            }
        }

        @media (max-width: 992px) {
            .requisitos-grid,
            .contacto-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .requisitos-img {
                height: 400px;
            }
            
            .hero h1 {
                font-size: 3rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 768px) {
            .becas-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .timeline::after {
                left: 31px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            
            .timeline-right {
                left: 0%;
            }
            
            .timeline-left::after,
            .timeline-right::after {
                left: 18px;
            }
            
            .timeline-left .timeline-content::after {
                left: -20px;
                border-color: transparent white transparent transparent;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .btn {
                margin: 5px;
                padding: 10px 20px;
                font-size: 0.9rem;
            }
            
            .hero-logo {
                height: 60px;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .modal-info {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .testimonio-img {
                width: 100px;
                height: 100px;
            }
            
            .testimonio-text {
                font-size: 1rem;
            }
            
            .floating-btn {
                width: 50px;
                height: 50px;
                bottom: 20px;
                right: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Sección Hero -->
    <section class="hero" id="inicio">
        <div class="container hero-content">
            <div class="hero-logos">
            </div>
            <h1>Sistema Integral de Becas</h1>
            <p>Accede a las mejores oportunidades de becas y apoyos económicos para estudiantes de la UNAM y el IPN. Impulsando tu desarrollo académico y profesional.</p>
            <div>
                <a href="#tipos-becas" class="btn btn-hero">Explorar Becas</a>
                <a href="#requisitos" class="btn btn-outline btn-hero">Requisitos</a>
            </div>
        </div>
    </section>

    <!-- Sección de Tipos de Becas -->
    <section class="tipos-becas section" id="tipos-becas">
        <div class="container">
            <div class="section-title">
                <h2>Becas Disponibles</h2>
                <p>Descubre todas las opciones de becas que ofrecen la UNAM y el IPN para apoyar tu trayectoria académica y contribuir a tu formación profesional.</p>
            </div>
            
            <div class="becas-tabs">
                <button class="tab-btn active" data-tab="todas">Todas las Becas</button>
                <button class="tab-btn" data-tab="unam">Becas UNAM</button>
                <button class="tab-btn" data-tab="ipn">Becas IPN</button>
                <button class="tab-btn" data-tab="posgrado">Posgrado</button>
                <button class="tab-btn" data-tab="internacional">Internacionales</button>
            </div>
            
            <div class="tabs-content">
                <!-- Panel de Todas las Becas -->
                <div class="tab-panel active" id="todas-panel">
                    <div class="becas-grid">
                        <!-- Beca 1 UNAM -->
                        <div class="beca-card" data-beca="1">
                            <div class="beca-header">
                                <span class="beca-tag tag-unam">UNAM</span>
                                <img src="../imagenes/becaexcelencia.jpeg" alt="Beca Excelencia UNAM">
                            </div>
                            <div class="beca-body unam-title">
                                <h3>Beca de Excelencia UNAM</h3>
                                <p>Dirigida a estudiantes con promedio mínimo de 9.0. Cubre el 100% de la colegiatura y ofrece un apoyo mensual.</p>
                                <div class="beca-meta">
                                    <div class="meta-item">
                                        <i>📅</i> Convocatoria: Agosto
                                    </div>
                                    <div class="meta-item">
                                        <i>👥</i> Nivel: Licenciatura
                                    </div>
                                </div>
                                <div class="beca-footer">
                                    <div class="beca-monto unam-monto">$4,800 MXN/mes</div>
                                    <a href="#" class="btn">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Beca 2 IPN -->
                        <div class="beca-card" data-beca="2">
                            <div class="beca-header">
                                <span class="beca-tag tag-ipn">IPN</span>
                                <img src="../imagenes/becamanu.png" alt="Beca Manutención IPN">
                            </div>
                            <div class="beca-body ipn-title">
                                <h3>Beca de Manutención IPN</h3>
                                <p>Para estudiantes de bajos recursos. Incluye apoyo económico mensual y seguro médico.</p>
                                <div class="beca-meta">
                                    <div class="meta-item">
                                        <i>📅</i> Convocatoria: Septiembre
                                    </div>
                                    <div class="meta-item">
                                        <i>👥</i> Nivel: Licenciatura
                                    </div>
                                </div>
                                <div class="beca-footer">
                                    <div class="beca-monto ipn-monto">$3,600 MXN/mes</div>
                                    <a href="#" class="btn btn-ipn">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Beca 3 UNAM -->
                        <div class="beca-card" data-beca="3">
                            <div class="beca-header">
                                <span class="beca-tag tag-unam">UNAM</span>
                                <img src="../imagenes/becainvestigacion.jpeg" alt="Beca Investigación UNAM">
                            </div>
                            <div class="beca-body unam-title">
                                <h3>Beca de Investigación UNAM</h3>
                                <p>Para estudiantes que deseen integrarse a proyectos de investigación. Incluye apoyo económico y créditos académicos.</p>
                                <div class="beca-meta">
                                    <div class="meta-item">
                                        <i>📅</i> Convocatoria: Febrero
                                    </div>
                                    <div class="meta-item">
                                        <i>👥</i> Nivel: Licenciatura y Posgrado
                                    </div>
                                </div>
                                <div class="beca-footer">
                                    <div class="beca-monto unam-monto">$5,200 MXN/mes</div>
                                    <a href="#" class="btn">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Beca 4 IPN -->
                        <div class="beca-card" data-beca="4">
                            <div class="beca-header">
                                <span class="beca-tag tag-ipn">IPN</span>
                                <img src="../imagenes/becainsti.jpeg" alt="Beca Institucional IPN">
                            </div>
                            <div class="beca-body ipn-title">
                                <h3>Beca Institucional IPN</h3>
                                <p>Apoyo económico para alumnos de escasos recursos y buen rendimiento académico con promedio mínimo de 8.0.</p>
                                <div class="beca-meta">
                                    <div class="meta-item">
                                        <i>📅</i> Convocatoria: Octubre
                                    </div>
                                    <div class="meta-item">
                                        <i>👥</i> Nivel: Licenciatura
                                    </div>
                                </div>
                                <div class="beca-footer">
                                    <div class="beca-monto ipn-monto">$3,300 MXN/mes</div>
                                    <a href="#" class="btn btn-ipn">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Beca 5 UNAM Internacional -->
                        <div class="beca-card" data-beca="5">
                            <div class="beca-header">
                                <span class="beca-tag tag-unam">UNAM</span>
                                <img src="../imagenes/becamovi.jpeg" alt="Beca Movilidad Internacional UNAM">
                            </div>
                            <div class="beca-body unam-title">
                                <h3>Beca de Movilidad Internacional</h3>
                                <p>Para realizar estudios en universidades extranjeras con convenio. Incluye apoyo para transporte, hospedaje y manutención.</p>
                                <div class="beca-meta">
                                    <div class="meta-item">
                                        <i>📅</i> Convocatoria: Mayo
                                    </div>
                                    <div class="meta-item">
                                        <i>👥</i> Nivel: Licenciatura y Posgrado
                                    </div>
                                </div>
                                <div class="beca-footer">
                                    <div class="beca-monto unam-monto">$12,000 MXN/mes</div>
                                    <a href="#" class="btn">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Beca 6 IPN Posgrado -->
                        <div class="beca-card" data-beca="6">
                            <div class="beca-header">
                                <span class="beca-tag tag-ipn">IPN</span>
                                <img src="../imagenes/becapos.jpeg" alt="Beca Posgrado IPN">
                            </div>
                            <div class="beca-body ipn-title">
                                <h3>Beca de Posgrado CONACYT-IPN</h3>
                                <p>Para estudiantes de maestría y doctorado en programas registrados en el PNPC. Incluye manutención mensual.</p>
                                <div class="beca-meta">
                                    <div class="meta-item">
                                        <i>📅</i> Convocatoria: Anual
                                    </div>
                                    <div class="meta-item">
                                        <i>👥</i> Nivel: Posgrado
                                    </div>
                                </div>
                                <div class="beca-footer">
                                    <div class="beca-monto ipn-monto">$14,500 MXN/mes</div>
                                    <a href="#" class="btn btn-ipn">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Otros paneles de tabs se mostrarán dinámicamente con JavaScript -->
                <div class="tab-panel" id="unam-panel"></div>
                <div class="tab-panel" id="ipn-panel"></div>
                <div class="tab-panel" id="posgrado-panel"></div>
                <div class="tab-panel" id="internacional-panel"></div>
            </div>
        </div>
    </section>

    <!-- Sección de Requisitos -->
    <section class="requisitos section" id="requisitos">
        <div class="container">
            <div class="requisitos-grid">
                <div class="requisitos-img animate-slideRight">
                    <img src="../imagenes/requibecas.jpeg" alt="Requisitos para becas">
                </div>
                <div class="requisitos-content animate-slideLeft">
                    <h2>Requisitos Generales</h2>
                    <p>Para acceder a las diversas opciones de becas que ofrecen la UNAM y el IPN, es importante cumplir con ciertos requisitos generales. Cada programa de becas puede tener requisitos específicos adicionales.</p>
                    
                    <div class="requisitos-list">
                        <div class="requisito-item">
                            <div class="requisito-icon">📚</div>
                            <div class="requisito-text">
                                <h4>Ser estudiante inscrito</h4>
                                <p>Estar formalmente inscrito en algún programa académico de la UNAM o IPN, según corresponda la beca solicitada.</p>
                            </div>
                        </div>
                        
                        <div class="requisito-item">
                            <div class="requisito-icon">🎓</div>
                            <div class="requisito-text">
                                <h4>Promedio mínimo</h4>
                                <p>Contar con un promedio mínimo general de 8.0 o el especificado en la convocatoria particular.</p>
                            </div>
                        </div>
                        
                        <div class="requisito-item">
                            <div class="requisito-icon">📋</div>
                            <div class="requisito-text">
                                <h4>Documentación</h4>
                                <p>Presentar la documentación requerida en tiempo y forma según lo establezca cada convocatoria.</p>
                            </div>
                        </div>
                        
                        <div class="requisito-item">
                            <div class="requisito-icon">💼</div>
                            <div class="requisito-text">
                                <h4>Situación económica</h4>
                                <p>Para becas socioeconómicas, demostrar la necesidad de apoyo económico mediante los formatos establecidos.</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#" class="btn" style="margin-top: 30px;">Consultar convocatorias</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Proceso -->
    <section class="proceso section" id="proceso">
        <div class="container">
            <div class="section-title">
                <h2>Proceso de Solicitud</h2>
                <p>Conoce el proceso paso a paso para solicitar una beca en la UNAM o IPN. Cada etapa es importante para lograr obtener el apoyo económico que necesitas.</p>
            </div>
            
            <div class="timeline">
                <div class="timeline-item timeline-left">
                    <div class="timeline-content">
                        <h3>Consulta la convocatoria</h3>
                        <p>Revisa las convocatorias vigentes en los portales oficiales de la UNAM o IPN y verifica los requisitos específicos.</p>
                    </div>
                </div>
                
                <div class="timeline-item timeline-right">
                    <div class="timeline-content">
                        <h3>Prepara tu documentación</h3>
                        <p>Reúne todos los documentos solicitados en la convocatoria. Asegúrate que estén completos y actualizados.</p>
                    </div>
                </div>
                
                <div class="timeline-item timeline-left">
                    <div class="timeline-content">
                        <h3>Registro en línea</h3>
                        <p>Completa el formulario de registro en la plataforma correspondiente. Deberás proporcionar información personal y académica.</p>
                    </div>
                </div>
                
                <div class="timeline-item timeline-right">
                    <div class="timeline-content">
                        <h3>Entrega de documentos</h3>
                        <p>Según lo indique la convocatoria, entrega los documentos físicos o cárgalos en la plataforma digital designada.</p>
                    </div>
                </div>
                
                <div class="timeline-item timeline-left">
                    <div class="timeline-content">
                        <h3>Evaluación y selección</h3>
                        <p>El comité evaluador revisará las solicitudes y seleccionará a los beneficiarios según los criterios establecidos.</p>
                    </div>
                </div>
                
                <div class="timeline-item timeline-right">
                    <div class="timeline-content">
                        <h3>Publicación de resultados</h3>
                        <p>Consulta los resultados en la fecha indicada a través de los medios oficiales de la institución.</p>
                    </div>
                </div>
                
                <div class="timeline-item timeline-left">
                    <div class="timeline-content">
                        <h3>Formalización</h3>
                        <p>Si eres seleccionado, deberás seguir las instrucciones para formalizar tu beca y comenzar a recibir el apoyo económico.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Calendario -->
    <section class="calendario section" id="calendario">
        <div class="container">
            <div class="section-title">
                <h2>Calendario de Convocatorias</h2>
                <p>Mantente al tanto de las fechas importantes para no perder la oportunidad de solicitar tu beca.</p>
            </div>
            
            <div class="calendario-tabs">
                <div class="calendario-tab active" data-cal="unam">UNAM</div>
                <div class="calendario-tab ipn-tab" data-cal="ipn">IPN</div>
            </div>
            
            <div class="calendario-content">
                <!-- Panel UNAM -->
                <div class="calendario-panel active" id="unam-panel">
                    <div class="eventos-grid">
                        <div class="evento-card">
                            <div class="evento-fecha">Febrero 2025</div>
                            <div class="evento-titulo">Beca de Investigación</div>
                            <div class="evento-desc">Apertura de la convocatoria para estudiantes interesados en proyectos de investigación.</div>
                        </div>
                        
                        <div class="evento-card">
                            <div class="evento-fecha">Marzo 2025</div>
                            <div class="evento-titulo">Beca de Transporte</div>
                            <div class="evento-desc">Convocatoria para apoyo de transporte para estudiantes que viven a más de 20km de su plantel.</div>
                        </div>
                        
                        <div class="evento-card">
                            <div class="evento-fecha">Mayo 2025</div>
                            <div class="evento-titulo">Becas de Movilidad Internacional</div>
                            <div class="evento-desc">Apertura del período de solicitudes para intercambios académicos internacionales.</div>
                        </div>
                        
                        <div class="evento-card">
                            <div class="evento-fecha">Agosto 2025</div>
                            <div class="evento-titulo">Beca de Excelencia Académica</div>
                            <div class="evento-desc">Inicia el registro para estudiantes con promedio mínimo de 9.0.</div>
                        </div>
                        
                        <div class="evento-card">
                            <div class="evento-fecha">Septiembre 2025</div>
                            <div class="evento-titulo">Beca Alimentaria</div>
                            <div class="evento-desc">Convocatoria para apoyo alimentario en comedores universitarios.</div>
                        </div>
                        
                        <div class="evento-card">
                            <div class="evento-fecha">Noviembre 2025</div>
                            <div class="evento-titulo">Beca de Titulación</div>
                            <div class="evento-desc">Registro para apoyo económico a estudiantes en proceso de titulación.</div>
                        </div>
                    </div>
                </div>
                
                <!-- Panel IPN -->
                <div class="calendario-panel" id="ipn-panel">
                    <div class="eventos-grid">
                        <div class="evento-card ipn-card">
                            <div class="evento-fecha">Enero 2025</div>
                            <div class="evento-titulo">Beca Institucional</div>
                            <div class="evento-desc">Apertura del registro para beca de apoyo económico general.</div>
                        </div>
                        
                        <div class="evento-card ipn-card">
                            <div class="evento-fecha">Marzo 2025</div>
                            <div class="evento-titulo">Beca de Servicio Social</div>
                            <div class="evento-desc">Convocatoria para estudiantes realizando su servicio social.</div>
                        </div>
                        
                        <div class="evento-card ipn-card">
                            <div class="evento-fecha">Abril 2025</div>
                            <div class="evento-titulo">Becas Culturales y Deportivas</div>
                            <div class="evento-desc">Registro para estudiantes destacados en actividades culturales y deportivas.</div>
                        </div>
                        
                        <div class="evento-card ipn-card">
                            <div class="evento-fecha">Junio 2025</div>
                            <div class="evento-titulo">Becas de Verano Científico</div>
                            <div class="evento-desc">Convocatoria para participar en proyectos de investigación durante el verano.</div>
                        </div>
                        
                        <div class="evento-card ipn-card">
                            <div class="evento-fecha">Agosto 2025</div>
                            <div class="evento-titulo">Beca de Manutención</div>
                            <div class="evento-desc">Apoyo económico para estudiantes de bajos recursos con buen rendimiento académico.</div>
                        </div>
                        
                        <div class="evento-card ipn-card">
                            <div class="evento-fecha">Octubre 2025</div>
                            <div class="evento-titulo">Beca de Posgrado CONACYT</div>
                            <div class="evento-desc">Convocatoria para estudiantes de maestría y doctorado en programas registrados en el PNPC.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Sección de Preguntas Frecuentes -->
<section class="faq section" id="faq">
    <div class="container">
        <div class="section-title">
            <h2>Preguntas Frecuentes</h2>
            <p>Resuelve tus dudas sobre el proceso de solicitud, requisitos y beneficios de las becas UNAM e IPN.</p>
        </div>
        
        <div class="accordion">
            <!-- Pregunta 1 -->
            <div class="accordion-item">
                <div class="accordion-header">
                    <div class="accordion-title">¿Cuáles son los requisitos para solicitar una beca?</div>
                    <div class="accordion-icon"></div>
                </div>
                <div class="accordion-content">
                    <div class="accordion-body">
                        Los requisitos varían según el tipo de beca, pero en general incluyen estar inscrito en un programa académico, tener un promedio mínimo de 8.0 y presentar la documentación requerida.
                    </div>
                </div>
            </div>
            
            <!-- Pregunta 2 -->
            <div class="accordion-item">
                <div class="accordion-header">
                    <div class="accordion-title">¿Cómo sé si fui seleccionado para una beca?</div>
                    <div class="accordion-icon"></div>
                </div>
                <div class="accordion-content">
                    <div class="accordion-body">
                        Los resultados se publican en los portales oficiales de la UNAM o IPN. También puedes recibir notificaciones por correo electrónico.
                    </div>
                </div>
            </div>
            
            <!-- Pregunta 3 -->
            <div class="accordion-item">
                <div class="accordion-header">
                    <div class="accordion-title">¿Puedo solicitar más de una beca?</div>
                    <div class="accordion-icon"></div>
                </div>
                <div class="accordion-content">
                    <div class="accordion-body">
                        Depende de las bases de cada convocatoria. Algunas becas son compatibles, mientras que otras no permiten acumulación de apoyos.
                    </div>
                </div>
            </div>
            
            <!-- Pregunta 4 -->
            <div class="accordion-item">
                <div class="accordion-header">
                    <div class="accordion-title">¿Qué hago si no cumplo con el promedio mínimo?</div>
                    <div class="accordion-icon"></div>
                </div>
                <div class="accordion-content">
                    <div class="accordion-body">
                        Puedes buscar otras opciones de apoyo o mejorar tu promedio para la siguiente convocatoria. También existen becas que no requieren un promedio específico.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Obtiene todos los elementos con la clase .accordion-header
    const accordionItems = document.querySelectorAll('.accordion-header');

    accordionItems.forEach(item => {
        item.addEventListener('click', () => {
            // Alterna la clase 'active' en el item seleccionado
            item.parentElement.classList.toggle('active');
            
            // Alterna el despliegue de la sección
            const content = item.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    });
</script>



   

    <!-- Botón flotante -->
    <div class="floating-btn" id="floating-btn">
        <div class="floating-icon">⬆️</div>
    </div>

    <!-- Notificación -->
    <div class="notification" id="notification">
        <div class="notification-icon">✅</div>
        <div class="notification-text">Mensaje enviado correctamente.</div>
    </div>

    <!-- Modal de beca -->
    <div class="modal" id="modal-beca">
        <div class="modal-content">
            <div class="modal-header">
                <img src="https://via.placeholder.com/800x400?text=Detalles+Beca" alt="Detalles de la beca">
                <div class="modal-close" id="modal-close">×</div>
            </div>
            <div class="modal-body">
                <h2 class="modal-title">Beca de Excelencia UNAM</h2>
                <div class="modal-info">
                    <div class="info-item">
                        <div class="info-label">Monto Mensual</div>
                        <div class="info-value">$4,800 MXN</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Convocatoria</div>
                        <div class="info-value">Agosto 2025</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Nivel</div>
                        <div class="info-value">Licenciatura</div>
                    </div>
                </div>
                <div class="modal-description">
                    <p>La Beca de Excelencia UNAM está dirigida a estudiantes con un promedio mínimo de 9.0. Cubre el 100% de la colegiatura y ofrece un apoyo mensual para gastos personales.</p>
                </div>
                <div class="modal-section">
                    <h3>Requisitos</h3>
                    <ul class="requisitos-list-modal">
                        <li class="requisito-modal">
                            <div class="requisito-check">✔️</div>
                            <div class="requisito-text">Promedio mínimo de 9.0.</div>
                        </li>
                        <li class="requisito-modal">
                            <div class="requisito-check">✔️</div>
                            <div class="requisito-text">Estar inscrito en un programa de licenciatura.</div>
                        </li>
                        <li class="requisito-modal">
                            <div class="requisito-check">✔️</div>
                            <div class="requisito-text">No contar con otra beca simultánea.</div>
                        </li>
                    </ul>
                </div>
                <div class="modal-section">
                    <h3>Documentos Requeridos</h3>
                    <ul class="documentos-list">
                        <li class="documento-item">
                            <div class="documento-icon">📄</div>
                            <div class="documento-text">Historial académico.</div>
                        </li>
                        <li class="documento-item">
                            <div class="documento-icon">📄</div>
                            <div class="documento-text">Comprobante de domicilio.</div>
                        </li>
                        <li class="documento-item">
                            <div class="documento-icon">📄</div>
                            <div class="documento-text">Carta de motivos.</div>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <div class="compartir-buttons">
                        <div class="share-btn btn-facebook">F</div>
                        <div class="share-btn btn-twitter">T</div>
                        <div class="share-btn btn-whatsapp">W</div>
                    </div>
                    <a href="#" class="btn">Aplicar Ahora</a>
                </div>
            </div>
        </div>
    </div>
    <script>
    // Funcionalidad de tabs en la sección de becas
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanels = document.querySelectorAll('.tab-panel');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetPanel = button.getAttribute('data-tab');
            tabButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            tabPanels.forEach(panel => {
                panel.classList.remove('active');
                if (panel.id === `${targetPanel}-panel`) {
                    panel.classList.add('active');
                }
            });
        });
    });

   

    // Funcionalidad del botón flotante
    const floatingBtn = document.getElementById('floating-btn');
    floatingBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Funcionalidad del modal
    const modal = document.getElementById('modal-beca');
    const modalClose = document.getElementById('modal-close');
    const becaCards = document.querySelectorAll('.beca-card');

    becaCards.forEach(card => {
        card.addEventListener('click', () => {
            modal.style.display = 'block';
        });
    });

    modalClose.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });


</script>
</body>
</html>