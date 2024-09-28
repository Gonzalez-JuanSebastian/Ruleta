<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prize = isset($_POST['prize']) ? $conn->real_escape_string($_POST['prize']) : '';

    // Obtener los datos almacenados en la sesión
    $name = $conn->real_escape_string($_SESSION['name']);
    $email = $conn->real_escape_string($_SESSION['email']);
    $city = $conn->real_escape_string($_SESSION['city']);
    $phone = $conn->real_escape_string($_SESSION['phone']);
    $company = $conn->real_escape_string($_SESSION['company']);
    $nit = $conn->real_escape_string($_SESSION['nit']);
    $products = $conn->real_escape_string($_SESSION['products']);
    $user_name = $conn->real_escape_string($_SESSION['user_name']); // Nuevo

    // Insertar todos los datos en la tabla 'datos'
    $sql = "INSERT INTO datos (name, email, city, phone, company, nit, products, prize, user_name) 
            VALUES ('$name', '$email', '$city', '$phone', '$company', '$nit', '$products', '$prize', '$user_name')"; // Actualizado

    if ($conn->query($sql) === TRUE) {

        header("Location: ../public/menu.php");
        exit();
    } else {
        echo "ERROR al ingresar datos: " . $conn->error;
    }

    $conn->close();
}
?>
