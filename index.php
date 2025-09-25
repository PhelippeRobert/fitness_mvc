<?php
require_once __DIR__ . '/generic/Autoload.php';
require_once __DIR__ . '/config.php';   // ✅ adiciona isso

$param = $_GET['param'] ?? 'usuarios/listar';
list($controllerName, $action) = explode('/', $param);

$controllerClass = rtrim(ucfirst($controllerName), 's') . 'Controller';
$controllerFile = __DIR__ . "/controller/$controllerClass.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerClass();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        echo "Ação '$action' não encontrada.";
    }
} else {
    echo "Controller '$controllerName' não encontrado.";
}
