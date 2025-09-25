<?php
require_once __DIR__ . '/config.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Menu Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h1 {
            display: block;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
    a {
    text-decoration: none;
    background: #007BFF;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    transition: background 0.3s;
    display: inline-block;   /* garante que ocupe “bloco” */
    margin-right: 10px;      /* espaço à direita */
    }

        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Menu Principal</h1>
    <ul>
        <li><a href="<?= BASE_URL ?>/usuarios/listar">Gerenciar Usuários</a></li>
        <li><a href="<?= BASE_URL ?>/desafios/listar">Gerenciar Desafios</a></li>
        <li><a href="<?= BASE_URL ?>/progresso/listar">Gerenciar Progresso</a></li>
    </ul>
</body>
</html>
