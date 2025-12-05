<?php

class UsuarioController {

    private $service;

    public function __construct() {
        $this->service = new UsuarioService();
        header("Content-Type: application/json; charset=utf-8");
    }

    // Método principal chamado pelo index.php
    public function handleRequest($method, $id = null) {

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
                if ($id) {
                    $this->atualizar($id);
                } else {
                    echo json_encode(["erro" => "ID obrigatório para atualização"]);
                }
                break;

            case "DELETE":
                if ($id) {
                    $this->excluir($id);
                } else {
                    echo json_encode(["erro" => "ID obrigatório para exclusão"]);
                }
                break;

            default:
                echo json_encode(["erro" => "Método não suportado"]);
        }
    }

    // GET /usuarios
    private function listar() {
        $dados = $this->service->listar();
        echo json_encode($dados);
    }

    // GET /usuarios/{id}
    private function buscar($id) {
        $usuario = $this->service->buscarPorId($id);

        if ($usuario) {
            echo json_encode($usuario);
        } else {
            echo json_encode(["erro" => "Usuário não encontrado"]);
        }
    }

    // POST /usuarios
    private function criar() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data["nome"], $data["email"], $data["senha"])) {
            echo json_encode(["erro" => "Nome, email e senha são obrigatórios"]);
            return;
        }

        $id = $this->service->criar($data["nome"], $data["email"], $data["senha"]);

        echo json_encode([
            "mensagem" => "Usuário criado com sucesso",
            "id" => $id
        ]);
    }

    // PUT /usuarios/{id}
    private function atualizar($id) {

        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data["nome"], $data["email"])) {
            echo json_encode(["erro" => "Nome e email são obrigatórios"]);
            return;
        }

        $resultado = $this->service->atualizar($id, $data["nome"], $data["email"]);

        if ($resultado) {
            echo json_encode(["mensagem" => "Usuário atualizado"]);
        } else {
            echo json_encode(["erro" => "Erro ao atualizar usuário"]);
        }
    }

    // DELETE /usuarios/{id}
    private function excluir($id) {
        $resultado = $this->service->excluir($id);

        if ($resultado) {
            echo json_encode(["mensagem" => "Usuário excluído"]);
        } else {
            echo json_encode(["erro" => "Erro ao excluir usuário"]);
        }
    }
}
