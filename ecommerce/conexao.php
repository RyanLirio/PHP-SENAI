<?php
//Vou usar o PDO pra conectar com o banco pois vi que é mais flexivel a migrações e mais seguro em relação a SQL Injections
$host = '127.0.0.1';
$dbname = 'ecommerce';
$user = 'ryan_lirio'; 
$password = '123';

try {   
    // Cria uma nova conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Define o modo de erro para lançar exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem e para o script
    die("Erro na conexão: " . $e->getMessage());
}



?>