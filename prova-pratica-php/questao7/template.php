<?php
session_start();
$usuario = $_POST['usuario'];//pega o usuario e senha
$senha = $_POST['senha'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($usuario == "admin" && $senha == 123) {
            //Redirecionar para a ação desejada
            header("Location: boas-vindas.php");
        
        } else {
            echo "Usuário ou senha incorretos.";
        }
    }//compara e retorna se esta certo ou nao usuario e senha, além de redirecionar
?>

<form method="post" action="template.php">
Usuário: <input type="text" name="usuario">
Senha: <input type="password" name="senha">
<input type="submit" value="Enviar">
</form>

