<?php
class UsuarioController {
    private $service;
    public function __construct() { $this->service = new UsuarioService(); }

    public function listar() {
        $usuarios = $this->service->listar();
        include __DIR__ . '/../view/usuarios/listar.php';
    }

    public function criar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->service->criar($_POST["nome"], $_POST["email"]);
            header("Location: /usuarios/listar");
            exit;
        }
        include __DIR__ . '/../view/usuarios/criar.php';
    }

    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->service->editar($_POST["id"], $_POST["nome"], $_POST["email"]);
            header("Location: /usuarios/listar");
            exit;
        }
        // Para melhorar: buscar dados atuais para prefilling (se houver id)
        $usuarioAtual = null;
        if (isset($_GET["id"])) {
            $usuarioAtual = $this->service->buscarPorId($_GET["id"]);
        }
        include __DIR__ . '/../view/usuarios/editar.php';
    }

    public function excluir() {
        // POST: executa exclusão
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"] ?? null;
            if ($id) {
                $this->service->excluir($id);
            }
            header("Location: /usuarios/listar");
            exit;
        }

        // GET: mostra página de confirmação
        $usuario = null;
        if (isset($_GET["id"])) {
            $usuario = $this->service->buscarPorId($_GET["id"]);
        }
        include __DIR__ . '/../view/usuarios/excluir.php';
    }
}
