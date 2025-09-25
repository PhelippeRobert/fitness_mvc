<?php require_once __DIR__ . '/../../config.php'; ?>
<h1>Desafios</h1>
<a href="<?= BASE_URL ?>/desafios/criar">Novo Desafio</a>
<ul>
<?php foreach ($desafios as $d): ?>
    <li><?= htmlspecialchars($d["nome"]) ?> - <?= htmlspecialchars($d["descricao"]) ?>
        <a href="<?= BASE_URL ?>/desafios/editar?id=<?= $d["id"] ?>">Editar</a>
        <a href="<?= BASE_URL ?>/desafios/excluir?id=<?= $d["id"] ?>">Excluir</a>
    </li>
<?php endforeach; ?>
</ul>
<a href="<?= BASE_URL ?>/menu.php">Voltar</a>
