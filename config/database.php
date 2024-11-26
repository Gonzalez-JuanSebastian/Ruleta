<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$user = 'ruletabinservici_abinusr';
$pass = '7Nk;kO%7HPhy';
$db = 'ruletabinservici_abin';

// Crear una nueva conexión a MySQL
$mysqli = new mysqli($host, $user, $pass, $db);

// Verificar si hay errores de conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Retornar la conexión
return $mysqli;
?>
