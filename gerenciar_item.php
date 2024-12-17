<?php
include('conexao.php');


$item_id = $_GET['id'];

$comandoSQL = "SELECT * FROM itens WHERE id = :id";
$comando = $conexao->prepare($comandoSQL);
$comando->execute(['id' => $item_id]);
$item = $comando->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    die("Você não tem permissão para gerenciar este item.");
}

$lancesSQL = "SELECT lances.valor, usuarios.nome AS nome_usuario FROM lances JOIN usuarios ON lances.idUsuario = usuarios.id WHERE lances.id = :id ORDER BY lances.valor DESC";
$lancesComando = $conexao->prepare($lancesSQL);
$lancesComando->execute(['item_id' => $item_id]);
$lances = $lancesComando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Item</title>
</head>
<body>
    <h1>Gerenciar Item: <?= htmlspecialchars($item['nome']) ?></h1>
    <h2>Lances</h2>
    <ul>
        <?php foreach ($lances as $lance): ?>
            <li><?= htmlspecialchars($lance['nome_usuario']) ?>: R$ <?= number_format($lance['valor'], 2, ',', '.') ?></li>
        <?php endforeach; ?>
    </ul>

    <form action="encerrar_leilao.php" method="POST">
        <input type="hidden" name="item_id" value="<?= $item_id ?>">
        <button type="submit">Encerrar Leilão</button>
    </form>
</body>
</html>
