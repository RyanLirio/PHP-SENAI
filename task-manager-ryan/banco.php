<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$BdServidor = '127.0.0.1';
$BdUsuario = 'ryan_lirio';
$BdSenha = '123';
$BdBanco = 'gerenciador';

$conexao = mysqli_connect($BdServidor, $BdUsuario, $BdSenha, $BdBanco);

if (mysqli_connect_errno()) {
    echo "Problemas para conectar no banco. Erro: ";
    echo mysqli_connect_error();
    die();
}

function buscar_tarefas($conexao) {
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $tarefas = array();
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }
    return $tarefas;
}

function gravar_tarefas($conexao, $tarefa) {
    $prazo = $tarefa['prazo'] == '' ? 'NULL' : "'{$tarefa['prazo']}'";
    $prioridade = intval($tarefa['prioridade']); // Garante que seja inteiro

    $sqlGravar = "
        INSERT INTO tarefas
        (nome, descricao, prioridade, prazo, concluida)
        VALUES
        (
            '{$tarefa['nome']}',
            '{$tarefa['descricao']}',
            {$prioridade},
            {$prazo},
            '{$tarefa['concluida']}'
        )
    ";
    mysqli_query($conexao, $sqlGravar);
}

function excluir_tarefa($conexao, $id) {
    $id = intval($id);
    $sqlExcluir = "DELETE FROM tarefas WHERE id = {$id}";
    mysqli_query($conexao, $sqlExcluir);
}
?>