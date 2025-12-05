<?php
header("Content-Type: application/json; charset=utf-8");

require_once "./generic/Autoload.php";

$uri = explode("/", trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/"));
$method = $_SERVER["REQUEST_METHOD"];

// REMOVA O VAR_DUMP DEPOIS DO TESTE
// var_dump($uri); exit;

// IGNORA A PASTA "fitness_mvc"
$resource = $uri[1] ?? null;
$id = $uri[2] ?? null;

if ($resource === "login") {
    $controller = new LoginController();
    $controller->login();
    exit;
}

AuthMiddleware::proteger();

switch ($resource) {
    case "usuarios":
        $controller = new UsuarioController();
        break;

    case "progresso":
        $controller = new ProgressoController();
        break;

    case "desafios":
        $controller = new DesafioController();
        break;

    default:
        echo json_encode(["error" => "Rota não encontrada"]);
        exit;
}

$controller->handleRequest($method, $id);
