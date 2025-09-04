<?php
require_once "../config.php";

header("Content-Type: application/json");

// Obtener datos JSON POST
$data = json_decode(file_get_contents("php://input"));

if (!$data || !isset($data->usuario) || !isset($data->password)) {
    http_response_code(400);
    echo json_encode(["error" => "Datos incompletos"]);
    exit;
}

$username = $data->usuario;
$password = $data->password;

try {
    // Buscar usuario en la base de datos
    $stmt = $pdo->prepare("SELECT id_usuario, contraseña, id_rol, estado FROM usuario WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        http_response_code(401);
        echo json_encode(["error" => "Usuario no encontrado"]);
        exit;
    }

    if ((int)$user['estado'] !== 1) {
        http_response_code(403);
        echo json_encode(["error" => "Usuario desactivado"]);
        exit;
    }

    if (!password_verify($password, $user['contraseña'])) {
        http_response_code(401);
        echo json_encode(["error" => "Contraseña incorrecta"]);
        exit;
    }

    echo json_encode([
        "message" => "Login exitoso",
        "usuario_id" => $user['id_usuario'],
        "rol" => $user['id_rol']
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Error servidor: " . $e->getMessage()]);
}
?>
