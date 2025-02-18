<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}


// Inicializar variables de sesión si no existen
if (!isset($_SESSION['palabra_secreta'])) {
    $_SESSION['palabra_secreta'] = '';
    $_SESSION['pista'] = '';
    $_SESSION['letras_adivinadas'] = [];
    $_SESSION['intentos_restantes'] = 6;
    $_SESSION['mensaje'] = '';
}

// Cargar la lista de palabras y pistas desde el archivo
$palabras_pistas = file('general.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Seleccionar una palabra y pista aleatoria si no hay una seleccionada
if (empty($_SESSION['palabra_secreta'])) {
    $indice_aleatorio = array_rand($palabras_pistas);
    list($_SESSION['palabra_secreta'], $_SESSION['pista']) = explode('|', $palabras_pistas[$indice_aleatorio]);
    $_SESSION['palabra_secreta'] = strtoupper($_SESSION['palabra_secreta']);
    $_SESSION['letras_adivinadas'] = array_fill(0, strlen($_SESSION['palabra_secreta']), '_');
}

// Procesar la letra ingresada por el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['letra'])) {
    $letra = strtoupper($_POST['letra']);

    if (in_array($letra, $_SESSION['letras_adivinadas'])) {
        $_SESSION['mensaje'] = "Ya has ingresado la letra $letra.";
    } elseif (strpos($_SESSION['palabra_secreta'], $letra) !== false) {
        // La letra está en la palabra secreta
        for ($i = 0; $i < strlen($_SESSION['palabra_secreta']); $i++) {
            if ($_SESSION['palabra_secreta'][$i] === $letra) {
                $_SESSION['letras_adivinadas'][$i] = $letra;
            }
        }
        $_SESSION['mensaje'] = "¡Bien! La letra $letra está en la palabra.";
    } else {
        // La letra no está en la palabra secreta
        $_SESSION['intentos_restantes']--;
        $_SESSION['mensaje'] = "La letra $letra no está en la palabra. Te quedan " . $_SESSION['intentos_restantes'] . " intentos.";
    }
}

// Verificar si el jugador ha ganado o perdido
if ($_SESSION['intentos_restantes'] <= 0) {
    $_SESSION['mensaje'] = "¡Perdiste! La palabra era: " . $_SESSION['palabra_secreta'];
    session_destroy();
} elseif (implode('', $_SESSION['letras_adivinadas']) === $_SESSION['palabra_secreta']) {
    $_SESSION['mensaje'] = "¡Felicidades! Has adivinado la palabra: " . $_SESSION['palabra_secreta'];
    session_destroy();
}

// Reiniciar el juego si se solicita
if (isset($_GET['reset'])) {
    // Mantener la sesión activa, solo reiniciar las variables del juego
    $_SESSION['palabra_secreta'] = '';
    $_SESSION['pista'] = '';
    $_SESSION['letras_adivinadas'] = [];
    $_SESSION['intentos_restantes'] = 6;
    $_SESSION['mensaje'] = '';
    
    // Redirigir a la misma página para reiniciar el juego
    header("Location: general.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego del Ahorcado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #333;
        }
        .palabra {
            font-size: 2rem;
            letter-spacing: 0.5rem;
            margin: 2rem 0;
        }
        .mensaje {
            font-size: 1.2rem;
            color: #d9534f;
            margin: 1rem 0;
        }
        .intentos {
            font-size: 1.2rem;
            color: #333;
        }
        .pista {
            font-size: 1.2rem;
            color: #5bc0de;
            margin: 1rem 0;
        }
        .ahorcado {
            font-family: monospace;
            white-space: pre;
            font-size: 1.5rem;
            margin: 1rem 0;
        }
        input[type="text"] {
            padding: 0.5rem;
            font-size: 1rem;
            width: 50px;
            text-align: center;
        }
        button {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin: 2rem;
            text-align: left;
        }
    </style>
</head>
<body>
<h1 class="title">
<a href="../juegos.php">Juegos</a> > <a href="categorias.php">Ahorcado</a> > General
</h1>
<div class="ahorcado">
        <?php
        // Dibujo del ahorcado según los intentos restantes
        $etapas = [
            "
              -----  
              |   |  
              O   |  
             /|\\  |  
             / \\  |  
                  |  
            --------
            ",
            "
              -----  
              |   |  
              O   |  
             /|\\  |  
             /    |  
                  |  
            --------
            ",
            "
              -----  
              |   |  
              O   |  
             /|\\  |  
                  |  
                  |  
            --------
            ",
            "
              -----  
              |   |  
              O   |  
             /|   |  
                  |  
                  |  
            --------
            ",
            "
              -----  
              |   |  
              O   |  
              |   |  
                  |  
                  |  
            --------
            ",
            "
              -----  
              |   |  
              O   |  
                  |  
                  |  
                  |  
            --------
            ",
            "
              -----  
              |   |  
                  |  
                  |  
                  |  
                  |  
            --------
            "
        ];
        echo $etapas[$_SESSION['intentos_restantes']];
        ?>
    </div>
    <div class="palabra">
        <?php echo implode(' ', $_SESSION['letras_adivinadas']); ?>
    </div>
    <div class="pista">
        Pista: <?php echo $_SESSION['pista']; ?>
    </div>
    <div class="mensaje">
        <?php echo $_SESSION['mensaje']; ?>
    </div>
    <div class="intentos">
        Intentos restantes: <?php echo $_SESSION['intentos_restantes']; ?>
    </div>
    <form method="POST" action="">
        <input type="text" name="letra" maxlength="1" required autofocus>
        <button type="submit">Adivinar</button>
    </form>
    <br>
    <a href="?reset=1">Reiniciar Juego</a>
</body>
</html>
