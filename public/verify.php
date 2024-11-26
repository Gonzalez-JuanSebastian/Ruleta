<?php
require_once '../config/database.php';
require_once '../src/Token.php';
include '../templates/header.php';

// Obtener la conexión a la base de datos
$mysqli = require '../config/database.php';
$token = new Token($mysqli);

// Verificar si el token está presente en la solicitud
if (isset($_GET['token'])) {
    $tokenValue = $_GET['token'];
    $userId = $token->verifyToken($tokenValue);

    if ($userId) {
        echo "Token válido para el usuario ID: " . $userId;
        $token->deleteToken($tokenValue);
    } else {
        echo "Token inválido o expirado.";
    }
} else {
    echo "Token no proporcionado.";
}

include '../templates/footer.php';
?>
