<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do usuário</title>
    <script>
window.onload = function() {
    var botao = document.getElementById('botao');
    botao.addEventListener('click', envia);
}

function envia() {
    var nome = document.getElementById('nome').value;
    var senha = document.getElementById('senha').value;

    var endereco = 'salva_usuario.php';
    endereco += '?nome=' + nome;
    endereco += '&senha=' + senha;

    const objetoRequisicao = new XMLHttpRequest();
    objetoRequisicao.onload = function() {
        var objResposta = JSON.parse(this.responseText);
        if(objResposta.resposta) {
            document.getElementById("saida").innerHTML = objResposta.resposta;
        } else {
            document.getElementById("saida").innerHTML = objResposta.erro;
        }
    }
    objetoRequisicao.open("GET", endereco, true);
    objetoRequisicao.send();
    
}
    </script>
</head>
<body>
    <label for="">Nome:</label>
    <input type="text" id="nome">
    <label for="">Senha:</label>
    <input type="text" id="senha">
    <input type="button" id="botao" value="Cadastrar">
    <p id="saida"></p>
</body>
</html>