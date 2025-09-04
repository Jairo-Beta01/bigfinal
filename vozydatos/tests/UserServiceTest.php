<?php
use PHPUnit\Framework\TestCase;
require_once './src/services/UserService.php';

class UserServiceTest extends TestCase
{
    public function testUsuarioNoExiste()
    {
        $servicio = new UserService();
        $resultado = $servicio->usuarioExiste('usuario_fake');
        $this->assertFalse($resultado);
    }

    public function testContarUsuariosActivos()
    {
        $servicio = new UserService();
        $cantidad = $servicio->contarUsuariosActivos();
        $this->assertEquals(2, $cantidad); // Esperamos 2 usuarios activos como en tu BD
    }
}
