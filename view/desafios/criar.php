<?php require_once __DIR__ . '/../../config.php'; ?>
<h1>Novo Desafio</h1>
<form method="POST" action="<?= BASE_URL ?>/desafios/criar">
    Nome: <input type="text" name="nome"><br>
    Descrição: <textarea name="descricao"></textarea><br>
    <button type="submit">Salvar</button>
</form>
<a href="<?= BASE_URL ?>/desafios/listar">Voltar</a>
