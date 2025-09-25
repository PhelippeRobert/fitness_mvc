<?php require_once __DIR__ . '/../../config.php'; ?>
<h1>Excluir Desafio</h1>
<?php if ($desafio): ?>
    <p>Tem certeza que deseja excluir o desafio <strong><?= htmlspecialchars($desafio['nome']) ?></strong>?</p>
    <form method="POST" action="<?= BASE_URL ?>/desafios/excluir">
        <input type="hidden" name="id" value="<?= htmlspecialchars($desafio['id']) ?>">
        <button type="submit">Confirmar</button>
        <a href="<?= BASE_URL ?>/desafios/listar">Cancelar</a>
    </form>
<?php else: ?>
    <p>Desafio não encontrado.</p>
<?php endif; ?>
