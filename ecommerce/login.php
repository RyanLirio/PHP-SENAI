<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <main>
        <h1>Login</h1>
        <form action="validar_login.php" method="post">
            <label>
                Email: <input type="email" name="email" required>
                Senha: <input type="password" name="senha" required>
                <input type="submit" value="Enviar">
            </label>
            <label>
                Ainda não possui cadastro? <a href="cadastro.php">Cadastrar-se</a>
            </label>
        </form>
    </main>
</body>
</html>