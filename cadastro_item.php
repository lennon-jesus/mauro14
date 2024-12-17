<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="salva_item.php" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" name="nome"><br>
        <label for="">Imagem:</label>
        <input type="file" name="imagem"><br>
        <label for="">Valor mínimo:</label>
        <input type="text" name="minimo"><br>
        <input type="submit">
    </form>
</body>
</html>