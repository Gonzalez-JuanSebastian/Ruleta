<?php
class User {
    private $mysqli;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    // Método para registrar un nuevo usuario
    public function register($username, $password) {
        // Verificar si el nombre de usuario ya existe
        if ($this->usernameExists($username)) {
            // Si el nombre de usuario ya existe, lanzar una excepción
            throw new Exception("El nombre de usuario ya existe.");
        }

        // Hashear la contraseña antes de guardarla en la base de datos
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // Preparar la consulta de inserción
        $stmt = $this->mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);
        // Ejecutar la consulta y retornar el resultado
        return $stmt->execute();
    }

    // Método para iniciar sesión
    public function login($username, $password) {
        // Preparar la consulta de selección
        $stmt = $this->mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($id, $fetchedUsername, $hashedPassword);
        $stmt->fetch();
        $stmt->close();

        // Verificar si la contraseña proporcionada coincide con la almacenada
        if ($id && password_verify($password, $hashedPassword)) {
            // Devolver un array con el ID y el nombre del usuario
            return ['id' => $id, 'username' => $fetchedUsername];
        }

        return false;
    }

    // Método para verificar si un nombre de usuario ya existe
    private function usernameExists($username) {
        $stmt = $this->mysqli->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->fetch();
        $stmt->close();

        return !is_null($id);
    }
}
?>
