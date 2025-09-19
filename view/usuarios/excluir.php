<?php require_once __DIR__ . '/../../config.php'; ?>
<h1>Excluir Usuário</h1>
<?php if ($usuario): ?>
    <p>Tem certeza que deseja excluir <?= htmlspecialchars($usuario['nome']) ?>?</p>
    <form method="POST" action="<?= BASE_URL ?>/usuarios/excluir">
        <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
        <button type="submit">Confirmar</button>
        <a href="<?= BASE_URL ?>/usuarios/listar">Cancelar</a>
    </form>
<?php else: ?>
    <p>Usuário não encontrado.</p>
<?php endif; ?>
