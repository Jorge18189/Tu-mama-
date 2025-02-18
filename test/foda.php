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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh; /* Esto ayuda a centrar las cartas verticalmente */
            gap: 2rem;
            padding: 0 2rem;
        }

        .card {
            width: 500px;
            height: 650px; /* Ajustado para hacerlo más alto */
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            border: 1px solid #ddd;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: scale(1.003);
        }

        .card-image {
            width: 100%;
            height: 60%; /* Ajustado para que ocupe más espacio vertical */
            object-fit: cover;
        }

        .card-content {
            flex-grow: 1;
            padding: 1rem;
            font-size: 3rem;
            font-weight: bold;
            color: #333;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-top: 1px solid #ddd;
        }

        @media (max-width: 768px) {
            .grid-container {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .card {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>
    <h1 class="title">Test de Orientacion</h1>
    
    <div class="grid-container">
        <div class="card">
            <img src="../imagenes/musculo.png" class="card-image">
            <div class="card-content">Para que eres bueno</div>
        </div>
        
        <div class="card">
            <img src="../imagenes/fodaa.jpeg" class="card-image">
            <div class="card-content">FODA</div>
        </div>
    </div>
</body>
</html>
