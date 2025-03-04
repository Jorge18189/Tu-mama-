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
    <title>Programas Internacionales | IPN & UNAM</title>
    <style>
        /* Variables CSS globales */
        :root {
            --color-ipn: #731d31;
            --color-ipn-light: #a52c45;
            --color-ipn-dark: #521423;
            --color-unam: #00274c;
            --color-unam-light: #003d7c;
            --color-unam-dark: #001a33;
            --color-accent: #f8cf3e;
            --color-accent-light: #ffdc5c;
            --color-text: #333333;
            --color-text-light: #666666;
            --color-background: #f5f5f5;
            --color-background-alt: #e9e9e9;
            --color-white: #ffffff;
            --font-primary: 'Montserrat', sans-serif;
            --font-secondary: 'Roboto', sans-serif;
            --border-radius: 8px;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 6px 12px rgba(0, 0, 0, 0.15);
            --transition: all 0.3s ease;
        }

        /* Reset y estilos base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        body {
            font-family: var(--font-primary);
            color: var(--color-text);
            background-color: var(--color-background);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 1rem;
            color: var(--color-text);
        }

        h1 {
            font-size: 3.2rem;
        }

        h2 {
            font-size: 2.6rem;
            position: relative;
            padding-bottom: 15px;
        }

        h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 4px;
            background: var(--color-accent);
        }

        h3 {
            font-size: 2rem;
        }

        h4 {
            font-size: 1.5rem;
        }

        p {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        a {
            color: var(--color-ipn);
            text-decoration: none;
            transition: var(--transition);
        }

        a:hover {
            color: var(--color-ipn-light);
        }

        ul, ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: var(--border-radius);
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section {
            padding: 80px 0;
        }

        .section:nth-child(even) {
            background-color: var(--color-background-alt);
        }

        .text-center {
            text-align: center;
        }

        .section-title {
            margin-bottom: 50px;
            text-align: center;
        }

        .section-title h2 {
            display: inline-block;
        }

        .section-title h2::after {
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-primary {
            background-color: var(--color-ipn);
            color: var(--color-white);
        }

        .btn-primary:hover {
            background-color: var(--color-ipn-light);
            color: var(--color-white);
        }

        .btn-secondary {
            background-color: var(--color-unam);
            color: var(--color-white);
        }

        .btn-secondary:hover {
            background-color: var(--color-unam-light);
            color: var(--color-white);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--color-ipn);
            color: var(--color-ipn);
        }

        .btn-outline:hover {
            background-color: var(--color-ipn);
            color: var(--color-white);
        }

        .flex {
            display: flex;
        }

        .flex-column {
            flex-direction: column;
        }

        .flex-row {
            flex-direction: row;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .justify-center {
            justify-content: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .align-center {
            align-items: center;
        }

        .gap-10 {
            gap: 10px;
        }

        .gap-20 {
            gap: 20px;
        }

        .gap-30 {
            gap: 30px;
        }

        .mb-10 {
            margin-bottom: 10px;
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        .mb-30 {
            margin-bottom: 30px;
        }

        .mb-50 {
            margin-bottom: 50px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-30 {
            margin-top: 30px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        /* Header y navegación */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: var(--color-white);
            box-shadow: var(--shadow);
            z-index: 1000;
            transition: var(--transition);
        }

        header.scrolled {
            padding: 10px 0;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-ipn {
            height: 50px;
            transition: var(--transition);
        }

        .logo-unam {
            height: 50px;
            transition: var(--transition);
        }

        header.scrolled .logo-ipn,
        header.scrolled .logo-unam {
            height: 40px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 25px;
        }

        .nav-link {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--color-text);
            position: relative;
            padding: 5px 0;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--color-accent);
            transition: var(--transition);
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--color-ipn);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .mobile-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: var(--color-text);
        }

        /* Banner de encabezado */
        .hero {
            position: relative;
            height: 100vh;
            background: linear-gradient(135deg, var(--color-ipn-dark) 0%, var(--color-unam-dark) 100%);
            color: var(--color-white);
            display: flex;
            align-items: center;
            text-align: center;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/api/placeholder/1200/800') center/cover no-repeat;
            opacity: 0.2;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--color-white);
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        /* Sección de acerca de */
        .about-content {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .about-text {
            flex: 1;
        }

        .about-image {
            flex: 1;
        }

        .institution-logos {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 50px;
        }

        .institution-logo {
            max-width: 150px;
            transition: var(--transition);
        }

        .institution-logo:hover {
            transform: scale(1.1);
        }

        /* Sección de programas */
        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            border-bottom: 1px solid var(--color-text-light);
        }

        .tab-btn {
            padding: 15px 25px;
            font-size: 1.2rem;
            font-weight: 600;
            background: transparent;
            border: none;
            color: var(--color-text-light);
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .tab-btn::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 0;
            height: 3px;
            background-color: var(--color-accent);
            transition: var(--transition);
        }

        .tab-btn:hover {
            color: var(--color-text);
        }

        .tab-btn.active {
            color: var(--color-ipn);
        }

        .tab-btn.active::after {
            width: 100%;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .program-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        .program-card {
            background-color: var(--color-white);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .program-header {
            position: relative;
            height: 200px;
        }

        .program-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .program-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 10px;
            background-color: var(--color-accent);
            color: var(--color-text);
            font-weight: 600;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .program-body {
            padding: 25px;
        }

        .program-title {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: var(--color-text);
        }

        .program-institution {
            display: inline-block;
            margin-bottom: 15px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--color-text-light);
        }

        .program-details {
            margin-bottom: 20px;
        }

        .program-detail {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .program-detail-icon {
            margin-right: 10px;
            color: var(--color-accent);
        }

        .program-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        /* Sección de requisitos */
        .requirements-container {
            display: flex;
            gap: 30px;
        }

        .requirements-content {
            flex: 2;
        }

        .requirements-image {
            flex: 1;
        }

        .accordion {
            margin-bottom: 30px;
        }

        .accordion-item {
            margin-bottom: 15px;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .accordion-header {
            background-color: var(--color-white);
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition);
        }

        .accordion-header:hover {
            background-color: var(--color-background-alt);
        }

        .accordion-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
        }

        .accordion-icon {
            transition: var(--transition);
            font-size: 1.2rem;
        }

        .accordion-content {
            background-color: var(--color-white);
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .accordion-content-inner {
            padding: 20px 0;
        }

        .accordion-item.active .accordion-header {
            background-color: var(--color-ipn-light);
            color: var(--color-white);
        }

        .accordion-item.active .accordion-icon {
            transform: rotate(180deg);
        }

        .accordion-item.active .accordion-content {
            max-height: 500px;
        }

        /* Sección de testimonios */
        .testimonials {
            background: linear-gradient(135deg, var(--color-ipn-dark) 0%, var(--color-unam-dark) 100%);
            color: var(--color-white);
            position: relative;
            overflow: hidden;
        }

        .testimonials::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/api/placeholder/1200/800') center/cover no-repeat;
            opacity: 0.1;
        }

        .testimonials .section-title h2 {
            color: var(--color-white);
        }

        .testimonials-slider {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
        }

        .testimonials-track {
            display: flex;
            transition: transform 0.5s ease;
        }

        .testimonial {
            min-width: 100%;
            padding: 20px;
            text-align: center;
        }

        .testimonial-content {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            position: relative;
        }

        .testimonial-content::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-top: 15px solid rgba(255, 255, 255, 0.1);
        }

        .testimonial-content p {
            font-style: italic;
            margin-bottom: 0;
        }

        .testimonial-author {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .author-image {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--color-accent);
            margin-bottom: 15px;
        }

        .author-name {
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .author-program {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .testimonial-nav {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 10px;
        }

        .testimonial-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: var(--transition);
        }

        .testimonial-dot.active {
            background-color: var(--color-accent);
        }

        /* Sección de universidades asociadas */
        .partners-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 30px;
            justify-items: center;
        }

        .partner-logo {
            height: 100px;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: var(--transition);
        }

        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.1);
        }

        /* Sección de estadísticas */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .stat-item {
            text-align: center;
            padding: 30px;
            background-color: var(--color-white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .stat-item:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .stat-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--color-accent);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(to right, var(--color-ipn), var(--color-unam));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-label {
            font-size: 1.2rem;
            color: var(--color-text);
        }

        /* Sección de contacto */
        .contact-container {
            display: flex;
            gap: 50px;
        }

        .contact-info {
            flex: 1;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background-color: var(--color-ipn-light);
            color: var(--color-white);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            margin-right: 15px;
        }

        .contact-text {
            flex: 1;
        }

        .contact-text h4 {
            margin-bottom: 5px;
        }

        .contact-form {
            flex: 1;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-family: var(--font-primary);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-ipn);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        /* Footer */
        footer {
            background-color: var(--color-unam-dark);
            color: var(--color-white);
            padding: 60px 0 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-logo {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .footer-logo img {
            height: 60px;
        }

        .footer-text {
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--color-white);
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .social-link:hover {
            background-color: var(--color-accent);
            color: var(--color-text);
            transform: translateY(-5px);
        }

        .footer-title {
            margin-bottom: 25px;
            color: var(--color-white);
            font-size: 1.4rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-link {
            margin-bottom: 15px;
        }

        .footer-link a {
            color: var(--color-white);
            opacity: 0.8;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
        }

        .footer-link a i {
            margin-right: 10px;
            font-size: 0.8rem;
        }

        .footer-link a:hover {
            opacity: 1;
            color: var(--color-accent);
            padding-left: 5px;
        }

        .footer-newsletter p {
            opacity: 0.8;
            margin-bottom: 20px;
        }

        .newsletter-form {
            display: flex;
        }

        .newsletter-input {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: var(--border-radius) 0 0 var(--border-radius);
            font-family: var(--font-primary);
        }

        .newsletter-btn {
            background-color: var(--color-accent);
            color: var(--color-text);
            border: none;
            padding: 0 20px;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter-btn:hover {
            background-color: var(--color-accent-light);
        }

        .footer-bottom {
            background-color: rgba(0, 0, 0, 0.2);
            padding: 20px 0;
            text-align: center;
        }

        .footer-bottom p {
            margin-bottom: 0;
            opacity: 0.7;
            font-size: 0.9rem;
        }

        /* Reglas responsivas */
        @media (max-width: 1024px) {
            h1 {
                font-size: 2.8rem;
            }

            h2 {
                font-size: 2.2rem;
            }

            .hero h1 {
                font-size: 3.5rem;
            }

            .hero p {
                font-size: 1.3rem;
            }

            .about-content {
                flex-direction: column;
            }

            .about-text, .about-image {
                width: 100%;
            }

            .requirements-container {
                flex-direction: column;
            }

            .requirements-content, .requirements-image {
                width: 100%;
            }

            .contact-container {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .section {
                padding: 60px 0;
            }

            h1 {
                font-size: 2.5rem;
            }

            h2 {
                font-size: 2rem;
            }

            .hero h1 {
                font-size: 3rem;
            }

            .hero p {
                font-size: 1.2rem;
            }

            .hero-btns {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                position: fixed;
                top: 80px;
                right: -100%;
                flex-direction: column;
                background-color: var(--color-white);
                width: 80%;
                height: calc(100vh - 80px);
                padding: 40px;
                box-shadow: var(--shadow);
                transition: var(--transition);
                z-index: 999;
            }

            .nav-menu.active {
                right: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .tabs {
                flex-wrap: wrap;
            }

            .tab-btn {
                flex: 1 0 calc(50% - 10px);
                text-align: center;
                padding: 10px;
                font-size: 1rem;
            }

            .program-cards {
                grid-template-columns: 1fr;
            }

            .stats-container {
                grid-template-columns: 1fr 1fr;
            }

            .partners-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }

        @media (max-width: 576px) {
            .section {
                padding: 50px 0;
            }

            h1 {
                font-size: 2.2rem;
            }

            h2 {
                font-size: 1.8rem;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .logo-ipn, .logo-unam {
                height: 40px;
            }

            header.scrolled .logo-ipn, 
            header.scrolled .logo-unam {
                height: 35px;
            }

            .institution-logos {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .tab-btn {
                flex: 1 0 100%;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        /* Animaciones y efectos */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Contador numérico animado */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated-counter {
            animation: countUp 1s ease forwards;
            display: inline-block;
        }

        /* Botón de regresar al inicio */
     /* Completando el CSS del botón back-to-top */
.back-to-top {
    position: fixed;
    right: 30px;
    bottom: 30px;
    width: 50px;
    height: 50px;
    background-color: var(--color-ipn);
    color: var(--color-white);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.5rem;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: var(--transition);
    z-index: 99;
    box-shadow: var(--shadow);
}

.back-to-top.visible {
    opacity: 1;
    visibility: visible;
}
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

.back-to-top:hover {
    background-color: var(--color-ipn-light);
    transform: translateY(-5px);
}
</style>
    <!-- Agregar enlace a fuentes y Font Awesome para iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header y navegación -->
    

    <!-- Sección Hero -->
    <section id="home" class="hero">
        <div class="container hero-content">
            <h1>Programas Internacionales</h1>
            <p>Expande tus horizontes académicos con las oportunidades de movilidad internacional del IPN y la UNAM</p>
            <div class="hero-btns">
                <a href="#programs" class="btn btn-primary">Ver Programas</a>
                <a href="#contact" class="btn btn-outline">Contáctanos</a>
            </div>
        </div>
    </section>

    <!-- Sección Acerca de -->
    <section id="about" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Acerca de Nuestros Programas</h2>
            </div>
            <div class="about-content">
                <div class="about-text fade-in">
                    <h3>Excelencia Académica Internacional</h3>
                    <p>Los programas de movilidad internacional del IPN y la UNAM ofrecen a los estudiantes la oportunidad única de enriquecer su formación académica, profesional y personal en prestigiosas instituciones alrededor del mundo.</p>
                    <p>A través de estos programas, nuestros estudiantes pueden cursar un semestre o un año académico en universidades extranjeras, participar en proyectos de investigación, realizar estancias profesionales y expandir sus horizontes culturales.</p>
                    <p>La colaboración entre el Instituto Politécnico Nacional y la Universidad Nacional Autónoma de México permite ofrecer una amplia gama de destinos académicos y programas especializados que se adaptan a las necesidades e intereses de nuestros estudiantes.</p>
                    <a href="#programs" class="btn btn-primary mt-20">Descubre nuestros programas</a>
                </div>
                <div class="about-image fade-in">
                    <img src="/api/placeholder/500/400" alt="Estudiantes internacionales">
                </div>
            </div>
            <div class="institution-logos fade-in">
                <img src="/api/placeholder/150/150" alt="IPN Logo" class="institution-logo">
                <img src="/api/placeholder/150/150" alt="UNAM Logo" class="institution-logo">
            </div>
        </div>
    </section>

    <!-- Sección de Programas -->
    <section id="programs" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Nuestros Programas</h2>
            </div>
            <div class="tabs">
                <button class="tab-btn active" data-tab="exchange">Intercambio Académico</button>
                <button class="tab-btn" data-tab="internship">Prácticas Profesionales</button>
                <button class="tab-btn" data-tab="research">Investigación</button>
                <button class="tab-btn" data-tab="language">Cursos de Idiomas</button>
            </div>
            
            <!-- Contenido de las pestañas -->
            <div class="tab-content active" id="exchange">
                <div class="program-cards">
                    <!-- Programa 1 -->
                    <div class="program-card fade-in">
                        <div class="program-header">
                            <img src="/api/placeholder/400/200" alt="Intercambio en Europa" class="program-image">
                            <span class="program-badge">Popular</span>
                        </div>
                        <div class="program-body">
                            <h3 class="program-title">Intercambio Académico en Europa</h3>
                            <span class="program-institution">IPN</span>
                            <div class="program-details">
                                <div class="program-detail">
                                    <i class="fas fa-calendar-alt program-detail-icon"></i>
                                    <span>Duración: 1-2 semestres</span>
                                </div>
                                <div class="program-detail">
                                    <i class="fas fa-globe program-detail-icon"></i>
                                    <span>Destinos: España, Francia, Alemania, Italia</span>
                                </div>
                                <div class="program-detail">
                                    <i class="fas fa-graduation-cap program-detail-icon"></i>
                                    <span>Nivel: Licenciatura y Posgrado</span>
                                </div>
                            </div>
                            <p>Realiza un intercambio académico en universidades europeas de prestigio, cursa materias equivalentes a tu plan de estudios y obtén una experiencia internacional invaluable.</p>
                            <div class="program-footer">
                                <a href="#" class="btn btn-primary">Más información</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Programa 2 -->
                    <div class="program-card fade-in">
                        <div class="program-header">
                            <img src="/api/placeholder/400/200" alt="Intercambio en Norteamérica" class="program-image">
                        </div>
                        <div class="program-body">
                            <h3 class="program-title">Intercambio en Norteamérica</h3>
                            <span class="program-institution">UNAM</span>
                            <div class="program-details">
                                <div class="program-detail">
                                    <i class="fas fa-calendar-alt program-detail-icon"></i>
                                    <span>Duración: 1-2 semestres</span>
                                </div>
                                <div class="program-detail">
                                    <i class="fas fa-globe program-detail-icon"></i>
                                    <span>Destinos: EE.UU., Canadá</span>
                                </div>
                                <div class="program-detail">
                                    <i class="fas fa-graduation-cap program-detail-icon"></i>
                                    <span>Nivel: Licenciatura y Posgrado</span>
                                </div>
                            </div>
                            <p>Programa de intercambio académico con importantes universidades de Estados Unidos y Canadá, con posibilidad de obtener becas y apoyos económicos.</p>
                            <div class="program-footer">
                                <a href="#" class="btn btn-secondary">Más información</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Programa 3 -->
                    <div class="program-card fade-in">
                        <div class="program-header">
                            <img src="/api/placeholder/400/200" alt="Intercambio en Asia" class="program-image">
                            <span class="program-badge">Nuevo</span>
                        </div>
                        <div class="program-body">
                            <h3 class="program-title">Intercambio en Asia</h3>
                            <span class="program-institution">IPN y UNAM</span>
                            <div class="program-details">
                                <div class="program-detail">
                                    <i class="fas fa-calendar-alt program-detail-icon"></i>
                                    <span>Duración: 1-2 semestres</span>
                                </div>
                                <div class="program-detail">
                                    <i class="fas fa-globe program-detail-icon"></i>
                                    <span>Destinos: Japón, Corea del Sur, China</span>
                                </div>
                                <div class="program-detail">
                                    <i class="fas fa-graduation-cap program-detail-icon"></i>
                                    <span>Nivel: Licenciatura y Posgrado</span>
                                </div>
                            </div>
                            <p>Vive la experiencia de estudiar en prestigiosas universidades asiáticas, aprender nuevos idiomas y descubrir culturas milenarias mientras continúas con tu formación académica.</p>
                            <div class="program-footer">
                                <a href="#" class="btn btn-primary">Más información</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Otros contenidos de pestañas -->
            <div class="tab-content" id="internship">
                <!-- Contenido de prácticas profesionales -->
                <div class="program-cards">
                    <!-- Añadir programas similares para prácticas profesionales -->
                </div>
            </div>
            
            <div class="tab-content" id="research">
                <!-- Contenido de investigación -->
                <div class="program-cards">
                    <!-- Añadir programas de investigación -->
                </div>
            </div>
            
            <div class="tab-content" id="language">
                <!-- Contenido de cursos de idiomas -->
                <div class="program-cards">
                    <!-- Añadir programas de idiomas -->
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

    <!-- JavaScript -->
    <script>
        // Funcionalidad para el header al hacer scroll
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        
        // Funcionalidad para el menú móvil
        const mobileToggle = document.querySelector('.mobile-toggle');
        const navMenu = document.querySelector('.nav-menu');
        
        mobileToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            mobileToggle.querySelector('i').classList.toggle('fa-bars');
            mobileToggle.querySelector('i').classList.toggle('fa-times');
        });
        
        // Funcionalidad para las pestañas
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Desactivar todas las pestañas
                tabBtns.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Activar la pestaña seleccionada
                this.classList.add('active');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // Funcionalidad para el acordeón de requisitos
        const accordionItems = document.querySelectorAll('.accordion-item');
        
        accordionItems.forEach(item => {
            const header = item.querySelector('.accordion-header');
            
            header.addEventListener('click', function() {
                item.classList.toggle('active');
            });
        });
        
        // Funcionalidad para el slider de testimonios
        let currentSlide = 0;
        const testimonialDots = document.querySelectorAll('.testimonial-dot');
        const testimonialTrack = document.querySelector('.testimonials-track');
        const testimonials = document.querySelectorAll('.testimonial');
        
        function showSlide(index) {
            testimonialTrack.style.transform = `translateX(-${index * 100}%)`;
            
            // Actualizar dots
            testimonialDots.forEach(dot => dot.classList.remove('active'));
            testimonialDots[index].classList.add('active');
            
            currentSlide = index;
        }
        
        testimonialDots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                showSlide(index);
            });
        });
        
        // Funcionalidad para animaciones de desplazamiento
        const fadeElements = document.querySelectorAll('.fade-in');
        
        function checkFade() {
            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                
                if (elementTop < windowHeight * 0.9) {
                    element.classList.add('visible');
                }
            });
        }
        
        // Verificar elementos al cargar la página
        window.addEventListener('load', checkFade);
        // Verificar elementos al hacer scroll
        window.addEventListener('scroll', checkFade);
        
        // Funcionalidad para el botón de regresar arriba
        const backToTopBtn = document.querySelector('.back-to-top');
        
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });
        
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
            </script>
</body>
</html>