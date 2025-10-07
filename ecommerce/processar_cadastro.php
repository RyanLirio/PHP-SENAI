<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {//se foram dados enviados por post:
    //pego os dados enviados
    $nome_usuario = $_POST['nome_cadastro'];
    $email_usuario = $_POST['email_cadastro'];
    $senha_usuario = $_POST['senha_cadastro'];

    // Criptografa a senha antes de qualquer coisa
    $senha_hash = password_hash($senha_usuario, PASSWORD_DEFAULT);

    try {
        //Prepara a consulta SQL com placeholders (?). Isso é feito pra prevenir SQL Injection
        $comando_sql = "INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($comando_sql);
        
        // Executa a consulta, passando os dados no array
        // O PDO lida com a segurança aqui
        $stmt->execute([$nome_usuario, $email_usuario, $senha_hash]);

        // Redireciona o usuário para uma página de sucesso
        header("Location: login.php");
        exit();

    } catch (PDOException $e) {
        die("Erro ao cadastrar usuário: " . $e->getMessage());
    }
}
?>