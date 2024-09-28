<?php
session_start();
require_once '../config/database.php';
require_once '../src/Token.php';
include '../templates/header.php';

// Obtener la conexión a la base de datos
$mysqli = require '../config/database.php';
$token = new Token($mysqli);

// Verificar si el usuario está autenticado
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    // Generar el token
    $tokenValue = $token->generateToken($userId);
    $urlConToken = "http://tu-dominio.com/public/verify.php?token=" . $tokenValue;
    include '../templates/token_link.php';
} else {
    echo "Debes iniciar sesión primero.";
}

include '../templates/footer.php';
?>
