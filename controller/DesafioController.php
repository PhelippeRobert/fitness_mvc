<?php
class DesafioController {
    private $service;
    public function __construct() { $this->service = new DesafioService(); }

    public function listar() {
        $desafios = $this->service->listar();
        include __DIR__ . '/../view/desafios/listar.php';
    }

    public function criar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->service->criar($_POST["nome"], $_POST["descricao"]);
            header("Location: /desafios/listar");
            exit;
        }
        include __DIR__ . '/../view/desafios/criar.php';
    }

    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->service->editar($_POST["id"], $_POST["nome"], $_POST["descricao"]);
            header("Location: /desafios/listar");
            exit;
        }
        $desafioAtual = null;
        if (isset($_GET["id"])) {
            $desafioAtual = $this->service->buscarPorId($_GET["id"]);
        }
        include __DIR__ . '/../view/desafios/editar.php';
    }

    public function excluir() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"] ?? null;
            if ($id) {
                $this->service->excluir($id);
            }
            header("Location: /desafios/listar");
            exit;
        }

        $desafio = null;
        if (isset($_GET["id"])) {
            $desafio = $this->service->buscarPorId($_GET["id"]);
        }
        include __DIR__ . '/../view/desafios/excluir.php';
    }
}
