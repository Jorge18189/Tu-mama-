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
    <title>Aquí estará Saby</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            color: #333;
        }

        .image {
            max-width: 90%;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Aquí estará Saby</h1>
        <img src="../imagenes/LogoRectangulo.jpg" alt="Imagen de Saby" class="image">
    </div>
</body>
</html>

