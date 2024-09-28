<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'prueba';

// Crear una nueva conexión a MySQL
$mysqli = new mysqli($host, $user, $pass, $db);

// Verificar si hay errores de conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Retornar la conexión
return $mysqli;
?>
