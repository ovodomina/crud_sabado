<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO pessoas (nome, email) VALUES (?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['email']]);
    header("Location: index.php");
    exit;
}
?>
<h1>Criar Pessoa</h1>
<form method="POST">
    Nome: <input name="nome" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <button type="submit">Salvar</button>
</form>
