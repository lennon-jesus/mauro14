<?php
include('conexao.php');

$item_id = $_POST['id'];
$valor_lance = $_POST['valor'];

$comandoSQL = "INSERT INTO lances (id , valor) VALUES (:id, :valor)";
$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute(['id' => $item_id, 'valor' => $valor_lance]);

if ($resultado) {
    echo "Lance enviado com sucesso!";
} else {
    echo "Erro ao enviar lance.";
}
?>
