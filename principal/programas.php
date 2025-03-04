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
    <title>Programas Académicos UNAM & IPN</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        .section {
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #0057b7;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #003f87;
        }
        .announcements-grid {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin: 20px 0;
        }
        .announcement-card {
            text-decoration: none;
            color: inherit;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 45%;
            text-align: center;
        }
        .announcement-button {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background: #0057b7;
            color: #fff;
            border-radius: 5px;
        }
        .announcement-card:hover .announcement-button {
            background: #003f87;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Programas Académicos UNAM & IPN</h1>
        
        <div class="announcements-grid">
            <a href="../pdf/convocatoriaunam.pdf" target="_blank" class="announcement-card unam-card">
                <div class="announcement-content">
                    <h3 class="announcement-title">Convocatoria UNAM</h3>
                    <p class="announcement-text">Conoce todos los detalles del proceso de admisión UNAM</p>
                    <span class="announcement-button">Ver PDF</span>
                </div>
            </a>
            <a href="https://www.admision.ipn.mx/nse/convocatoria/index.html" target="_blank" class="announcement-card ipn-card">
                <div class="announcement-content">
                    <h3 class="announcement-title">Convocatoria IPN</h3>
                    <p class="announcement-text">Información completa sobre el proceso de admisión IPN</p>
                    <span class="announcement-button">Ver más</span>
                </div>
            </a>
        </div>
        
        <div class="section">
            <h2>Requisitos Generales</h2>
            <ul>
                <li>Haber concluido el nivel medio superior.</li>
                <li>Aprobar el examen de admisión correspondiente.</li>
                <li>Realizar el proceso de registro en línea.</li>
            </ul>
        </div>
        
        <div class="section">
            <h2>Contacto</h2>
            <p>Si tienes dudas sobre el proceso de admisión, contáctanos:</p>
            <p>Email: contacto@universidades.mx</p>
            <p>Teléfono: 55 1234 5678</p>
        </div>
    </div>
</body>
</html>
