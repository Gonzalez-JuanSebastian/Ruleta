<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Datos</title>

    <link rel="stylesheet" href="css/nuevo_juego.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <title>Inicio</title>

</head>

<body>

<?php include '../src/auth_check.php'; ?>

    <!-- Barra de Navegacion -->
    <div class="header">
        <div class="log">
            <img src="IMG/Imagen de WhatsApp 2024-05-23 a las 09.20.37_9e5fdaab.jpg" class="logo" id="header-text" alt="ABIN">
            <p>¡Pasión por lo que Hacemos!</p>

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
        <a class="inicio" id="header-text" href="menu.php"><p>INICIO</p></a>
    </div>
    
    <!-- Selector de Datos -->
    <div class="container">
        <h2>Toma de Datos</h2>
        <form id="data-form" action="../src/auth.php" method="POST">

            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="city">Ciudad:</label>
                <input type="text" id="city" name="city">
            </div>

            <div class="form-group">
                <label for="phone">Celular:</label>
                <input type="text" id="phone" name="phone">
            </div>

            <div class="form-group">
                <label for="company">Empresa:</label>
                <input type="text" id="company" name="company">
            </div>

            <div class="form-group">
                <label for="nit">Nit:</label>
                <input type="text" id="nit" name="nit">
            </div>

            <div class="form-group">
                <label for="products">Categoría de Producto:</label>
                <select id="products" name="products">
                    <option value="" disabled selected>Elija una opción</option>
                    <option value="Refrigeración">Refrigeración</option>
                    <option value="Filtración">Filtración</option>
                    <option value="Motor">Motor</option>
                    <option value="Suspensión">Suspensión</option>
                    <option value="Eléctrico">Eléctrico</option>
                    <option value="Miscelania">Miscelania</option>
                    
                </select>
            </div>
            
            <div class="form-group" id="tratamiento-de-datos">
                <label for="accept-data" class="checkbox-label">
                    <input type="checkbox" id="accept-data" name="accept-data">
                    Acepto el tratamiento de mis datos personales bajo la ley <a href="https://www.funcionpublica.gov.co/eva/gestornormativo/norma.php?i=49981">Ley 1581 de 2012</a>
                </label>
            </div>
            
            <!-- boton enviar -->
            <div class="submit">
                <input class="submitButton" type="submit" value="Guardar y Continuar">
            </div>

        </form>
    </div>
    
    <script src="js/nuevo_juego.js"></script>
</body>
</html>
