<?php require_once __DIR__ . '/../../config.php'; ?>
<h1>Atualizar Progresso</h1>
<?php if ($progressoAtual): ?>
    <form method="POST" action="<?= BASE_URL ?>/progresso/atualizar">
        <input type="hidden" name="id" value="<?= htmlspecialchars($progressoAtual['id']) ?>">
        
        Usuário: <?= htmlspecialchars($progressoAtual['usuario']) ?><br>
        Desafio: <?= htmlspecialchars($progressoAtual['desafio']) ?><br>
        
        Progresso (%): 
        <input type="number" name="progresso" min="0" max="100" 
               value="<?= htmlspecialchars($progressoAtual['progresso']) ?>"><br>
        
        <button type="submit">Salvar</button>
    </form>
    <a href="<?= BASE_URL ?>/progresso/listar">Cancelar</a>
<?php else: ?>
    <p>Registro de progresso não encontrado.</p>
<?php endif; ?>
