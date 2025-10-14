<?php
session_start();
require_once('login.php');
require_once('conexao.php');    

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $email = $_POST['email'];
    $senha = $_POST['senha'];   

    try {
        // Busca o usuário pelo email
        $comando_sql = "SELECT * FROM usuarios WHERE email_usuario = ?";
        $stmt = $pdo->prepare($comando_sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha_usuario'])) {
            $_SESSION['nome_usuario'] = $usuario['nome_usuario']; // Salva o nome
            // Login OK
            header("Location: index_logado.php");
            exit();
        } else {
            // Login falhou
            echo "Email ou senha inválidos!";
        }

    } catch (PDOException $e) {
        die("Erro ao validar login: " . $e->getMessage());
    }
}
?>