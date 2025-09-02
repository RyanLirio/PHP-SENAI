<?php
// Incluir arquivo de conexão
require_once 'conexao.php';

// Capturar dados do formulário
$nome = $_POST['nome'];
// Criar consulta SQL para inserção
$sql = "INSERT INTO pessoas (nome) VALUES ('$nome')";

// Executar a consulta
if (mysqli_query($con, $sql)) {
echo "Cadastro realizado com sucesso!";
} else {
echo "Erro ao cadastrar: " . mysqli_error($con);
}

// Fechar conexão
mysqli_close($con);
?>