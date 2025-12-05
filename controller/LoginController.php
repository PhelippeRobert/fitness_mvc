<?php

class LoginController {
    private $service;

    public function __construct() {
        $this->service = new UsuarioService();
        header("Content-Type: application/json; charset=utf-8");
    }

    public function login() {
        try {
            // Lê o JSON enviado no POST
            $data = json_decode(file_get_contents("php://input"), true);

            if (!isset($data["email"]) || !isset($data["senha"])) {
                echo json_encode(["erro" => "Email e senha obrigatórios"]);
                return;
            }

            // Busca o usuário no banco
            $usuario = $this->service->buscarPorEmailSenha($data["email"], $data["senha"]);

            if (!$usuario) {
                echo json_encode(["erro" => "Credenciais inválidas"]);
                return;
            }

            // Gera o token JWT
            $token = JWTHelper::gerarToken([
                "id" => $usuario["id"],
                "email" => $usuario["email"]
            ]);

            // Retorna JSON
            echo json_encode([
                "mensagem" => "Login realizado com sucesso",
                "token" => $token
            ]);

        } catch (Exception $e) {
            echo json_encode([
                "erro" => "Erro ao realizar login",
                "detalhes" => $e->getMessage()
            ]);
        }
    }
}
