<?php
require_once '../config/database.php';
require_once '../src/User.php';

// Obtener la conexión a la base de datos
$mysqli = require '../config/database.php';
$user = new User($mysqli);

// Manejar el formulario de registro
$registroExitoso = null;
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        if ($user->register($username, $password)) {
            $registroExitoso = true;
            $mensaje = "Registro exitoso. Ahora puedes <a href='login.php'>iniciar sesión</a>.";
        } else {
            $registroExitoso = false;
            $mensaje = "Error al registrar el usuario.";
        }
    } catch (Exception $e) {
        $registroExitoso = false;
        $mensaje = $e->getMessage(); // Mostrar el mensaje de la excepción
    }
}

// Incluir el formulario de registro
include '../templates/register_form.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var registroExitoso = <?php echo json_encode($registroExitoso); ?>;
        var mensaje = <?php echo json_encode($mensaje); ?>;
        if (registroExitoso !== null) {
            var modal = document.getElementById("myModal");
            var modalMessage = document.getElementById("modalMessage");
            modalMessage.innerHTML = mensaje;
            modal.style.display = "block";
        }

        // Obtener el elemento <span> que cierra el modal
        var span = document.getElementsByClassName("close")[0];

        // Cuando el usuario hace clic en <span> (x), cierra el modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cuando el usuario hace clic en cualquier lugar fuera del modal, ciérralo
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
</script>
