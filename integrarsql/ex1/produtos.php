<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);


session_start();

include "banco.php";

$produto_editando = null;

// Exclui um produto
if (isset($_POST['excluir'])) {
    $excluirId = $_POST['excluir'];
    excluir_produto($conexao, $excluirId);
}

// Processa edição (preenche o formulário)
if (isset($_POST['editar'])) {
    $editId = $_POST['editar'];
    $produto_editando = buscar_produto_por_id($conexao, $editId);
}

if(
    isset($_POST['salvar_edicao']) &&
    isset($_POST['id']) &&
    isset($_POST['nome']) && trim($_POST['nome']) !== '' &&
    isset($_POST['preco']) && trim($_POST['preco']) !== '' &&
    isset($_POST['quantidade']) && trim($_POST['quantidade']) !== ''
)   {
        $produto = [
            'id' => $_POST['id'],   
            'nome' => $_POST['nome'],
            'preco' => $_POST['preco'],
            'quantidade' => $_POST['quantidade']
        ];
        editar_produto($conexao, $produto);
        $produto_editando = null; // Limpa edição após salvar
    }   

// Adiciona um novo produto
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
}

$lista_produtos = buscar_produtos($conexao);

include 'template.php';
?>