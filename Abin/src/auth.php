<?php
session_start(); // Iniciar la sesión

require_once '../config/db.php'; // Llamar DB

// Verificar que se recibieron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar y obtener los datos del formulario
    $_SESSION['name'] = isset($_POST["name"]) ? $conn->real_escape_string($_POST["name"]) : '';
    $_SESSION['email'] = isset($_POST["email"]) ? $conn->real_escape_string($_POST["email"]) : '';
    $_SESSION['city'] = isset($_POST["city"]) ? $conn->real_escape_string($_POST["city"]) : '';
    $_SESSION['phone'] = isset($_POST["phone"]) ? $conn->real_escape_string($_POST["phone"]) : '';
    $_SESSION['company'] = isset($_POST["company"]) ? $conn->real_escape_string($_POST["company"]) : '';
    $_SESSION['nit'] = isset($_POST["nit"]) ? $conn->real_escape_string($_POST["nit"]) : '';
    $_SESSION['products'] = isset($_POST["products"]) ? $conn->real_escape_string($_POST["products"]) : '';

    // Asegurarse de que user_name esté establecido en la sesión si está disponible
    if (isset($_SESSION['user_name'])) {
        $_SESSION['user_name'] = $_SESSION['user_name'];
    } else {
        // Si no está disponible, puedes establecerlo como un valor predeterminado o dejarlo en blanco
        $_SESSION['user_name'] = ''; // Cambiar esto según sea necesario
    }

    // Redirigir a la siguiente página para obtener el dato adicional
    header("Location: ../public/ruleta.php");
    exit();
}
?>
