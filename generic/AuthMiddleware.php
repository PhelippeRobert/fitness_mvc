<?php

class AuthMiddleware {

    public static function proteger() {

        $headers = apache_request_headers();

        if (!isset($headers["Authorization"])) {
            echo json_encode(["erro" => "Acesso não autorizado"]);
            exit;
        }

        $token = str_replace("Bearer ", "", $headers["Authorization"]);

        $dados = JWTHelper::validarToken($token);

        if (!$dados) {
            echo json_encode(["erro" => "Token inválido ou expirado"]);
            exit;
        }
    }
}
