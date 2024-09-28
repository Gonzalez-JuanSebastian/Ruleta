<?php
class Token {
    private $mysqli;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    // Método para generar un nuevo token
    public function generateToken($userId) {
        // Generar un token aleatorio
        $token = bin2hex(random_bytes(32));
        // Establecer la fecha de expiración del token
        $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Preparar la consulta de inserción
        $stmt = $this->mysqli->prepare("INSERT INTO tokens (user_id, token, expires_at) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $userId, $token, $expiresAt);
        $stmt->execute();

        return $token;
    }

    // Método para verificar un token
    public function verifyToken($token) {
        // Preparar la consulta de selección
        $stmt = $this->mysqli->prepare("SELECT user_id, expires_at FROM tokens WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->bind_result($userId, $expiresAt);
        $stmt->fetch();

        // Verificar si el token es válido y no ha expirado
        if ($userId && strtotime($expiresAt) > time()) {
            return $userId;
        }

        return false;
    }

    // Método para eliminar un token
    public function deleteToken($token) {
        // Preparar la consulta de eliminación
        $stmt = $this->mysqli->prepare("DELETE FROM tokens WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
    }
}
?>
