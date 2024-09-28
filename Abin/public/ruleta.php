<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruleta</title>
    <link rel="stylesheet" href="css/ruleta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <script src="js/ruleta.js" defer></script>
</head>
<body>




    <!-- Barra de Navegacion -->
    <div class="header">
        <div class="log">
            <img src="" class="logo" id="header-text" alt="LOGO">
            <p>¡Frase de Marca! </p>
            
        </div>
    </div>
    <div class="body">
        <!-- Ruleta -->
        <div class="ruleta">
            <div class="spin">
                <canvas id="canvas" width="500" height="500"></canvas>
                <div class="center-button">
                    <input class="ruleta-boton" type="button" value="" id="spin">
                </div>
            </div>
            <!-- Div para mostrar el resultado -->
            <div id="result"></div>
            <!-- La ventana modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p id="modal-text"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario oculto para enviar datos al servidor -->
    <form id="resultForm" method="POST" action="../src/guardar_priza.php" style="display:none;">
        <input type="hidden" name="prize" id="prizeInput">
        <input type="hidden" name="user_name" id="userNameInput">
    </form>
</body>
</html>
