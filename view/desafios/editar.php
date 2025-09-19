<?php require_once __DIR__ . '/../../config.php'; ?>
<h1>Editar Desafio</h1>
<form method="POST" action="<?= BASE_URL ?>/desafios/editar">
    <input type="hidden" name="id" value="<?= htmlspecialchars($desafioAtual['id']) ?>">
    Nome: <input type="text" name="nome" value="<?= htmlspecialchars($desafioAtual['nome']) ?>"><br>
    Descrição: <textarea name="descricao"><?= htmlspecialchars($desafioAtual['descricao']) ?></textarea><br>
    <button type="submit">Salvar</button>
</form>
<a href="<?= BASE_URL ?>/desafios/listar">Cancelar</a>
