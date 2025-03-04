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

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            border: 1px solid #ddd;
            text-decoration: none; /* Quita el subrayado del enlace */
            color: inherit; /* Hereda el color del texto */
        }

        .card:hover {
            transform: scale(1.01);
        }

        .card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 1rem;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
        }

        @media (max-width: 768px) {
            .grid-container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <h1 class="title">Juegos</h1>
    
    <div class="grid-container">
        <a href="ahorcado/categorias.php" class="card">
            <img src="../imagenes/ahorcado.png" class="card-image">
            <div class="card-content">Ahorcado</div>
        </a>
        
        <a href="sopadeletras/categorias.php" class="card">
            <img src="../imagenes/sopa.png" class="card-image">
            <div class="card-content">Sopa de Letras</div>
        </a>
        
        <a href="crucigrama/categorias.php" class="card">
            <img src="../imagenes/crucigrama.png" class="card-image">
            <div class="card-content">Crucigrama</div>
        </a>
    </div>
</body>
</html>