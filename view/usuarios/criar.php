<?php require_once __DIR__ . '/../../config.php'; ?>
<h1>Novo Usuário</h1>
<form method="POST" action="<?= BASE_URL ?>/usuarios/criar">
    Nome: <input type="text" name="nome"><br>
    Email: <input type="email" name="email"><br>
    <button type="submit">Salvar</button>
</form>
<a href="<?= BASE_URL ?>/usuarios/listar">Voltar</a>
