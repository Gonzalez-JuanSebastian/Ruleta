<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión o Registrarse</title>

    <link rel="stylesheet" href="css/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="log">
            <img class="logo" id="header-text" alt="LOGO">
            <p>Frase de Marca</p>
        </div>
    </div>

    <div class="info">
        <p class="info_p1">Informacion de <span class="highlight">Ingreso</span></p> 
    </div>

    <div class="contenedor">
        <div class="botones">
            <h2>Bienvenido</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button class="Boton" type="submit" name="action" value="login">Iniciar Sesión</button>
                <button type="submit" name="action" value="register">Registrarse</button>
            </form>
        </div>
    </div>
    

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST['action'];

        if ($action == 'login') {
            echo "<p>Has elegido Iniciar Sesión.</p>";
            header("Location: login.php"); // Redirigir a la página de inicio de sesión
            exit();
        } elseif ($action == 'register') {
            echo "<p>Has elegido Registrarse.</p>";
            header("Location: register.php"); // Redirigir a la página de registro
            exit();
        }
    }
    ?>
</body>
</html>
