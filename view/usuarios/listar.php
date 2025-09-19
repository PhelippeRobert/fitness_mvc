<?php require_once __DIR__ . '/../../config.php'; ?>
<h1>Usuários</h1>
<a href="<?= BASE_URL ?>/usuarios/criar">Novo Usuário</a>
<ul>
<?php foreach ($usuarios as $u): ?>
    <li><?= htmlspecialchars($u["nome"]) ?> (<?= htmlspecialchars($u["email"]) ?>)
        <a href="<?= BASE_URL ?>/usuarios/editar?id=<?= $u["id"] ?>">Editar</a>
        <a href="<?= BASE_URL ?>/usuarios/excluir?id=<?= $u["id"] ?>">Excluir</a>
    </li>
<?php endforeach; ?>
</ul>
