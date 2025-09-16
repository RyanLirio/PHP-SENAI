<?php

session_start();

include "banco.php";

// Exclui um produto
if (isset($_POST['excluir'])) {
    $excluirId = $_POST['excluir'];
    excluir_produto($conexao, $excluirId);
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
/*else{
    echo "TA AQUI O ERRO RYAN";}*/

// Preenche o Formulario da do item que queremos editar
if (isset($_POST['editar'])){
    $editId = $_POST['editar'];
    $produto_editando = buscar_produto_por_id($conexao, $editId);
}

$lista_produtos = buscar_produtos($conexao);

include 'template.php';
?>