<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$user = 'ruletabinservici_abinusr';
$pass = '7Nk;kO%7HPhy';
$db = 'ruletabinservici_abin';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>