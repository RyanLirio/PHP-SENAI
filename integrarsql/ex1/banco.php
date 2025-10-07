<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//linhas para explanar os erros



$BdServidor = '127.0.0.1';
$BdUsuario = 'ryan_lirio';
$BdSenha = '123';
$BdBanco = 'cadastro_produtos';
//configuração do banco

$conexao = mysqli_connect($BdServidor, $BdUsuario, $BdSenha, $BdBanco);

if (mysqli_connect_errno()) {//usado pra verificar se a conexão funcionou
    echo "Problemas para conectar no banco. Erro: ";
    echo mysqli_connect_error();
    die();
}

function buscar_produto_por_id($conexao, $id) {
    $id = intval($id);
    $sqlBusca = "SELECT * FROM produtos WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $sqlBusca);
    return mysqli_fetch_assoc($resultado);
}

function buscar_produtos($conexao) {//para exibir a lista de tarefas
    $sqlBusca = 'SELECT * FROM produtos';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $produtos = array();
    while ($produto = mysqli_fetch_assoc($resultado)) {
        $produtos[] = $produto;
    }
    return $produtos;
}

function gravar_produtos($conexao, $produto) {//grava produtos
    $nome = $produto['nome'];
    $preco = $produto['preco'];
    $quantidade = $produto['quantidade'];

    $sqlGravar = "
        INSERT INTO produtos
        (nome, preco, quantidade)
        VALUES
        (
            '{$nome}',
            {$preco},
            {$quantidade}
        )
    ";
    mysqli_query($conexao, $sqlGravar);
}

function editar_produto($conexao, $produto) {
    $id = intval($produto['id']);
    $preco = intval($produto['preco']);
    $nome = mysqli_real_escape_string($conexao, $produto['nome']);
    $quantidade = intval($produto['quantidade']);
    $sqlEditar = "
        UPDATE produtos SET
            nome = '{$nome}',
            preco = '{$preco}',
            quantidade = {$quantidade}
        WHERE id = {$id}
    ";
    mysqli_query($conexao, $sqlEditar);
}

function excluir_produto($conexao, $id) {//exclui produtos
    $id = intval($id);
    $sqlExcluir = "DELETE FROM produtos WHERE id = {$id}";
    mysqli_query($conexao, $sqlExcluir);
}