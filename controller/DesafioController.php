<?php

class DesafioController {
    private $service;

    public function __construct() {
        $this->service = new DesafioService();
        header("Content-Type: application/json; charset=utf-8");
    }

    public function handleRequest($method, $id) {
        switch ($method) {
            case "GET":
                if ($id) {
                    $this->buscar($id);
                } else {
                    $this->listar();
                }
                break;

            case "POST":
                $this->criar();
                break;

            case "PUT":
                $this->editar($id);
                break;

            case "DELETE":
                $this->excluir($id);
                break;

            default:
                echo json_encode(["erro" => "Método inválido"]);
        }
    }

    private function listar() {
        $dados = $this->service->listar();
        echo json_encode($dados);
    }

    private function buscar($id) {
        $dados = $this->service->buscarPorId($id);
        echo json_encode($dados);
    }

    private function criar() {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->service->criar($data["nome"], $data["descricao"]);
        echo json_encode(["mensagem" => "Desafio criado"]);
    }

    private function editar($id) {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->service->editar($id, $data["nome"], $data["descricao"]);
        echo json_encode(["mensagem" => "Desafio editado"]);
    }

    private function excluir($id) {
        $this->service->excluir($id);
        echo json_encode(["mensagem" => "Desafio excluído"]);
    }
}
