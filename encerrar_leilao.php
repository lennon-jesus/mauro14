<?php
include('conexao.php');


$item_id = $_POST['item_id'];

$lanceSQL = "SELECT usuario_id, valor FROM lances WHERE item_id = :item_id ORDER BY valor DESC LIMIT 1";
$lanceComando = $conexao->prepare($lanceSQL);
$lanceComando->execute(['item_id' => $item_id]);
$maiorLance = $lanceComando->fetch(PDO::FETCH_ASSOC);

if (!$maiorLance) {
    die("Nenhum lance foi dado neste item.");
}

$comandoSQL = "UPDATE itens SET estado = 'encerrado', id_vencedor = :vencedor_id WHERE id = :item_id";
$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute([
    'vencedor_id' => $maiorLance['usuario_id'],
    'item_id' => $item_id
]);

if ($resultado) {
    echo "Leilão encerrado com sucesso!";
} else {
    echo "Erro ao encerrar leilão.";
}
?>
