<?php

$nome = $_FILES['imagem']['name'];
$tempo = time();
$nome_imagem = "imagens/" . str_replace('.', "$tempo.", $nome );
$origem = $_FILES['imagem']['tmp_name'];

$resultado_copia = move_uploaded_file($origem, $nome_imagem);

if($resultado_copia) {
    $comandoSQL = "INSERT INTO `itens` (`id`, `nome`, `imagem`, `minimo`, `estado`, `id_vencedor`) VALUES (NULL, :nome, :caminho, :minimo, 'aberto', NULL)";

    $vetor = array("nome" => $_POST['nome'], "minimo" => $_POST['minimo'], "caminho"=> $nome_imagem);

    include('conexao.php');

    $comando = $conexao->prepare($comandoSQL);
    $resultado = $comando->execute($vetor);

    if($resultado) {
        echo "Item criado";
    } else {
        echo "Erro ao criar item";
    }
}

?>