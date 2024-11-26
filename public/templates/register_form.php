<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/nuevo_juego.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <title>Registro</title>

</head>
<body>
    <div class="header">
        <div class="log">
            <img src="../public/img/Imagen de WhatsApp 2024-05-23 a las 09.20.37_9e5fdaab.jpg" class="logo" id="header-text" alt="ABIN">
            <p>¡Pasión por lo que Hacemos!</p>
        </div>

        <a class="inicio" id="header-text" href="index.php"><p>INICIO</p></a>
    </div>

    <div class="container">
        <h2>Nuevo Usuario</h2>
        <form method="post" action="register.php">
            <div class="form-group">

                <label for="username">Usuario:</label>
                
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="submit">
                <button class="submitButton" type="submit">Registrar</button>
            </div>
        </form>
    </div>

    <!-- El Modal -->
    <div id="myModal" class="modal">
        <!-- Contenido del Modal -->
        <div class="modal-content">
            <div class="modal-close">
                <span class="close">&times;</span>
            </div>
            <div class="modal-message">
                <p id="modalMessage"></p>
            </div>
            
        </div>
    </div>
</body>
</html>
