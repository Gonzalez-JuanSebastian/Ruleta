<?php
session_start();

require_once '../config/database.php';
require_once '../src/User.php';

// Obtener la conexión a la base de datos
$mysqli = require '../config/database.php';
$user = new User($mysqli);

// Manejar el formulario de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userData = $user->login($username, $password);

    if ($userData) {
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['user_name'] = $userData['username'];
        header("Location: menu.php");
        exit;
    } else {
        echo "Login fallido.";
    }
}

// Incluir el formulario de login
include '../templates/login_form.php';
?>
