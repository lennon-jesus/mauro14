<?php
include('conexao.php');

$comandoSQL = "INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES (NULL, :nome, :senha)";

$senha_cripto = hash('sha256', $_GET['senha']);
$comando = $conexao->prepare($comandoSQL);
$resultado = $comando->execute(array('nome' => $_GET['nome'], 'senha' => $senha_cripto));

if($resultado) {
    $resposta = array('resposta' => "Usuário cadastrado!");
} else {
    $resposta = array('erro' => "Erro ao cadastrar {$_GET['nome']}");
}

echo json_encode($resposta);



?>