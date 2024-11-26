
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <title>Inicio</title>
</head>
<body>
    
    <?php include '../src/auth_check.php'; ?>

    <div class="header">
        <div class="log">
            <img src="img/Imagen de WhatsApp 2024-05-23 a las 09.20.37_9e5fdaab.jpg" class="logo" id="header-text" alt="ABIN">
            <p>¡Pasión por lo que Hacemos!</p>
        </div>
        <div class="user-info">
        <?php 
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION['user_name'])): ?>
                <p><?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="contenedor">
        <div class="botones">
            <div class="boton">
                <a class="Boton" href="nuevo_juego.php"><p>Nuevo Juego</p></a>
            </div>
            <form class="boton" action="../src/logout.php" method="post">
                <button class="Boton" id="Boton2" type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </div>
    <div class="fondo">
        <canvas id="canvas" width="500" height="500"></canvas>
    </div>
</body>
</html>
