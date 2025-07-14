<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID inválido");
}

// Busca registro
$stmt = $pdo->prepare("SELECT * FROM pessoas WHERE id = ?");
$stmt->execute([$id]);
$pessoa = $stmt->fetch();

if (!$pessoa) {
    die("Pessoa não encontrada");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE pessoas SET nome = ?, email = ? WHERE id = ?");
    $stmt->execute([$_POST['nome'], $_POST['email'], $id]);
    header("Location: index.php");
    exit;
}
?>
<h1>Editar Pessoa</h1>
<form method="POST">
    Nome: <input name="nome" value="<?= htmlspecialchars($pessoa['nome']) ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($pessoa['email']) ?>" required><br><br>
    <button type="submit">Salvar</button>
</form>
