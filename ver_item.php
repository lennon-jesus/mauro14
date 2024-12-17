<?php
include('conexao.php');

$item_id = $_GET['id'];
$comandoSQL = "SELECT * FROM itens WHERE id = :id";
$comando = $conexao->prepare($comandoSQL);
$comando->execute(['id' => $item_id]);
$item = $comando->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    die("Item não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Item</title>
</head>
<body>
    <h1><?= htmlspecialchars($item['nome']) ?></h1>
    <p>Descrição: <?= htmlspecialchars($item['descricao'] ?? 'Sem descrição') ?></p>
    <p>Valor mínimo: R$ <?= number_format($item['minimo'], 2, ',', '.') ?></p>

    <h2>Enviar Lance</h2>
    <form action="salva_lance.php" method="POST">
        <input type="hidden" name="id" value="<?= $item_id ?>">
        <label for="valor">Valor do Lance:</label>
        <input type="number" name="valor" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
