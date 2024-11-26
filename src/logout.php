<?php
// Iniciar la sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

//también se debe borrar la cookie de sesión.
// 
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión u otra página
header("Location: ../public/index.php");
exit;
?>
