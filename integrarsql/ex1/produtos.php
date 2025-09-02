<?php

session_start();

include "banco.php";

// Adiciona nova tarefa
if (
    isset($_POST['cadastrar']) &&
    isset($_POST['nome']) && trim($_POST['nome']) !== '' &&
    isset($_POST['preco']) && trim($_POST['preco']) !== '' &&
    isset($_POST['quantidade']) && trim($_POST['quantidade']) !== ''
) {

    $produto = [
        'nome' => $_POST['nome'],
        'preco' => $_POST['preco'],
        'quantidade' => $_POST['quantidade']
    ];
    gravar_produtos($conexao, $produto);
}else{
    echo "TA AQUI O ERRO RYAN";
}

$listar_produtos = buscar_produtos($conexao);

include 'template.php';
?>