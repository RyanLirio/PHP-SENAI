<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <h1>Cadastro</h1>
        <form action="processar_cadastro.php" method="post">
            <label>
                Nome: <input type="text" name="nome_cadastro" required>
                Email: <input type="email" name="email_cadastro" required>
                Senha: <input type="password" name="senha_cadastro" required>
                <input type="submit" value="Enviar">
            </label>
            <label>
                Já possui cadastro? <a href="processar_cadastro.php">Login</a>
            </label>
        </form>
    </main>
</body>
</html>