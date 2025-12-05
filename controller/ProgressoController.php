<?php

class ProgressoController {
    private $service;

    public function __construct() {
        $this->service = new ProgressoService();
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
                $this->atualizar($id);
                break;

            case "DELETE":
                $this->excluir($id);
                break;

            default:
                echo json_encode(["erro" => "Método não suportado"]);
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
        $json = json_decode(file_get_contents("php://input"), true);

        if (!isset($json["usuario_id"], $json["desafio_id"], $json["progresso"])) {
            echo json_encode(["erro" => "Campos obrigatórios não enviados"]);
            return;
        }

        $this->service->criar(
            $json["usuario_id"],
            $json["desafio_id"],
            $json["progresso"]
        );

        echo json_encode(["mensagem" => "Progresso registrado com sucesso"]);
    }

    private function atualizar($id) {
        $json = json_decode(file_get_contents("php://input"), true);

        if (!isset($json["progresso"])) {
            echo json_encode(["erro" => "Campo progresso é obrigatório"]);
            return;
        }

        $this->service->atualizar($id, $json["progresso"]);
        echo json_encode(["mensagem" => "Progresso atualizado"]);
    }

    private function excluir($id) {
        $this->service->excluir($id);
        echo json_encode(["mensagem" => "Progresso excluído"]);
    }
}
