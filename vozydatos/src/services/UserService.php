<?php

require_once './backend/config.php';

class UserService
{
    public function contarUsuariosActivos()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT COUNT(*) FROM usuarios WHERE estado = 'Activo'");
        return (int) $stmt->fetchColumn();
    }

    public function usuarioExiste($usuario)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        return $stmt->fetchColumn() > 0;
    }
}