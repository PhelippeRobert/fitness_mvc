<?php

class JWTHelper {

    private static $secret = "SEGREDO_SUPER_SEGURO_AQUI"; // troque por algo forte

    // Criar token JWT
    public static function gerarToken($dados) {
        $header = json_encode(['alg' => 'HS256', 'typ' => 'JWT']);
        $payload = json_encode([
            'iat' => time(),
            'exp' => time() + 3600,
            'dados' => $dados
        ]);

        $headerBase64 = self::base64url_encode($header);
        $payloadBase64 = self::base64url_encode($payload);

        $assinatura = hash_hmac('sha256', "$headerBase64.$payloadBase64", self::$secret, true);
        $assinaturaBase64 = self::base64url_encode($assinatura);

        return "$headerBase64.$payloadBase64.$assinaturaBase64";
    }

    // Validar token
    public static function validarToken($token) {
        $partes = explode('.', $token);

        if (count($partes) !== 3) {
            return false;
        }

        list($headerBase64, $payloadBase64, $assinaturaRecebida) = $partes;

        // recalcula assinatura
        $assinatura = hash_hmac('sha256', "$headerBase64.$payloadBase64", self::$secret, true);
        $assinaturaBase64 = self::base64url_encode($assinatura);

        if ($assinaturaBase64 !== $assinaturaRecebida) {
            return false;
        }

        $payload = json_decode(self::base64url_decode($payloadBase64), true);

        if ($payload['exp'] < time()) {
            return false;
        }

        return $payload;
    }

    private static function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private static function base64url_decode($data) {
        return base64_decode(strtr($data, '-_', '+/'));
    }
}
