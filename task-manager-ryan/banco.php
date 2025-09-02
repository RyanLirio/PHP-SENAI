<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//linhas para explanar os erros

$BdServidor = '127.0.0.1';
$BdUsuario = 'ryan_lirio';
$BdSenha = '123';
$BdBanco = 'gerenciador';
//configuração do banco

$conexao = mysqli_connect($BdServidor, $BdUsuario, $BdSenha, $BdBanco);

if (mysqli_connect_errno()) {//usado pra verificar se a conexão funcionou
    echo "Problemas para conectar no banco. Erro: ";
    echo mysqli_connect_error();
    die();
}

function buscar_tarefa_por_id($conexao, $id) {
    $id = intval($id);
    $sqlBusca = "SELECT * FROM tarefas WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $sqlBusca);
    return mysqli_fetch_assoc($resultado);
}

function buscar_tarefas($conexao) {//para exibir a lista de tarefas
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $tarefas = array();
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }
    return $tarefas;
}

function gravar_tarefas($conexao, $tarefa) {//grava tarefas
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

function editar_tarefa($conexao, $tarefa) {
    $id = intval($tarefa['id']);
    $nome = mysqli_real_escape_string($conexao, $tarefa['nome']);
    $descricao = mysqli_real_escape_string($conexao, $tarefa['descricao']);
    $prioridade = intval($tarefa['prioridade']);
    $prazo = $tarefa['prazo'] == '' ? 'NULL' : "'{$tarefa['prazo']}'";
    $concluida = intval($tarefa['concluida']);

    $sqlEditar = "
        UPDATE tarefas SET
            nome = '{$nome}',
            descricao = '{$descricao}',
            prioridade = {$prioridade},
            prazo = {$prazo},
            concluida = {$concluida}
        WHERE id = {$id}
    ";
    mysqli_query($conexao, $sqlEditar);
}

function excluir_tarefa($conexao, $id) {//exclui tarefas
    $id = intval($id);
    $sqlExcluir = "DELETE FROM tarefas WHERE id = {$id}";
    mysqli_query($conexao, $sqlExcluir);
}
?>