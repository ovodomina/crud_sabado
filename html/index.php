<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM pessoas");
if ($stmt === false) {
    die("Erro ao executar a consulta SQL");
}
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Lista de Pessoas</h1>
<a href="create.php">Criar nova</a>
<table border="1" cellpadding="5" cellspacing="0">
<tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>
<?php foreach ($rows as $row): ?>
<tr>
    <td><?= htmlspecialchars($row['id']) ?></td>
    <td><?= htmlspecialchars($row['nome']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
    <td>
        <a href="edit.php?id=<?= urlencode($row['id']) ?>">Editar</a>
        <a href="delete.php?id=<?= urlencode($row['id']) ?>" onclick="return confirm('Confirmar exclusão?')">Excluir</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
