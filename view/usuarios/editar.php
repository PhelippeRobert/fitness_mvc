<?php require_once __DIR__ . '/../../config.php'; ?>
<h1>Editar Usuário</h1>
<form method="POST" action="<?= BASE_URL ?>/usuarios/editar">
    <input type="hidden" name="id" value="<?= htmlspecialchars($usuarioAtual['id']) ?>">
    Nome: <input type="text" name="nome" value="<?= htmlspecialchars($usuarioAtual['nome']) ?>"><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($usuarioAtual['email']) ?>"><br>
    <button type="submit">Salvar</button>
</form>
<a href="<?= BASE_URL ?>/usuarios/listar">Cancelar</a>
