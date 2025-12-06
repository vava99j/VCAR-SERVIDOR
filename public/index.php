<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Carro</title>
</head>
<body>

<h2>Cadastrar carro</h2>

<form action="/api/cadastrar.php" method="POST" enctype="multipart/form-data">

    Marca: <input type="text" name="marca" required><br><br>
    Modelo: <input type="text" name="modelo" required><br><br>

    Descrição: <br>
    <textarea name="descricao"></textarea><br><br>

    Preço: <input type="number" step="0.01" name="preco" required><br><br>

    Contato: <input type="text" name="contato" required><br><br>

    Foto 1 (obrigatória): <input type="file" name="ft1" required><br><br>
    Foto 2: <input type="file" name="ft2"><br><br>
    Foto 3: <input type="file" name="ft3"><br><br>
    Foto 4: <input type="file" name="ft4"><br><br>
    Foto 5: <input type="file" name="ft5"><br><br>

    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
