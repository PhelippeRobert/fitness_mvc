<?php
class ProgressoController {
    private $service;
    public function __construct() { $this->service = new ProgressoService(); }

    public function listar() {
        $progresso = $this->service->listar();

        // buscar listas para popular selects no formulário de criação
        $usuarioService = new UsuarioService();
        $desafioService = new DesafioService();
        $usuarios = $usuarioService->listar();
        $desafios = $desafioService->listar();

        include __DIR__ . '/../view/progresso/listar.php';
    }

    public function atualizar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->service->atualizar($_POST['id'], $_POST['progresso']);
        header("Location: " . BASE_URL . "/progresso/listar");
        exit;
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $progressoAtual = $this->service->buscarPorId($id);  // ✅ busca no banco
    } else {
        $progressoAtual = null;
    }

    include __DIR__ . '/../view/progresso/atualizar.php';
}


    public function criar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->service->criar($_POST["usuario_id"], $_POST["desafio_id"], $_POST["progresso"]);
            header("Location: " . BASE_URL . "/progresso/listar");
            exit;
        }
    }
}
