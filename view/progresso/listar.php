<?php require_once __DIR__ . '/../../config.php'; ?>
<h1>Progresso</h1>

<table border="1" cellpadding="5">
    <tr>
        <th>Usuário</th>
        <th>Desafio</th>
        <th>Progresso (%)</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($progresso as $p): ?>
    <tr>
        <td><?= htmlspecialchars($p['usuario']) ?></td>
        <td><?= htmlspecialchars($p['desafio']) ?></td>
        <td><?= htmlspecialchars($p['progresso']) ?>%</td>
        <td>
            <a href="<?= BASE_URL ?>/progresso/atualizar?id=<?= $p['id'] ?>">Atualizar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Novo Progresso</h2>
<form method="POST" action="<?= BASE_URL ?>/progresso/criar">
    Usuário:
    <select name="usuario_id">
        <?php foreach ($usuarios as $u): ?>
            <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['nome']) ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    Desafio:
    <select name="desafio_id">
        <?php foreach ($desafios as $d): ?>
            <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nome']) ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    Progresso (%): <input type="number" name="progresso" min="0" max="100"><br>
    <button type="submit">Salvar</button>
</form>

<a href="<?= BASE_URL ?>/menu.php">Voltar</a>
