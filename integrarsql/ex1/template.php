<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <div>
        <h1>Cadastrar Produtos</h1>
        <form method="post">
            <label>
                Nome do produto:
                <input type="text" name="nome">
            </label>
            <label>
                Preço unitário:
                <input type="number" name="preco">
            </label>
            <label>
                Quantidade:
                <input type="number" name="quantidade">
            </label>
            <input type="submit" name="cadastrar" value="Cadastrar">
        </form>
    </div>
    
</body>
</html>