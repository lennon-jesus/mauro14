<?php
include('conexao.php');

$comandoSQL = "SELECT id, nome, minimo FROM itens WHERE estado = 'aberto'";
$comando = $conexao->prepare($comandoSQL);
$comando->execute();
$itens = $comando->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens Abertos</title>
</head>
<body>
    <h1>Itens em Leilão</h1>
    <ul>
        <?php foreach ($itens as $item): ?>
            <li>
                <a href="ver_item.php?id=<?= $item['id'] ?>">
                    <?= htmlspecialchars($item['nome']) ?> - Valor mínimo: R$ <?= number_format($item['minimo'], 2, ',', '.') ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
