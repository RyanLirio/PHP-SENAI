<?php


session_start();

include "banco.php";
include "ajudantes.php";

$tarefa_editando = null;

// Processa exclusão
if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete'];
    excluir_tarefa($conexao, $deleteId);
}

// Processa edição (preenche o formulário)
if (isset($_POST['edit'])) {
    $editId = $_POST['edit'];
    $tarefa_editando = buscar_tarefa_por_id($conexao, $editId);
}

// Salva edição
if (
    isset($_POST['salvar_edicao']) &&
    isset($_POST['id']) &&
    isset($_POST['nome']) && trim($_POST['nome']) !== '' &&
    isset($_POST['descricao']) && trim($_POST['descricao']) !== '' &&
    isset($_POST['prazo']) && trim($_POST['prazo']) !== ''
) {
    $prioridade = 1;
    if ($_POST['prioridade'] == 'media') $prioridade = 2;
    if ($_POST['prioridade'] == 'alta') $prioridade = 3;

    $tarefa = [
        'id' => $_POST['id'],
        'nome' => $_POST['nome'],
        'descricao' => $_POST['descricao'],
        'prazo' => traduz_data_para_banco($_POST['prazo']),
        'prioridade' => $prioridade,
        'concluida' => isset($_POST['concluida']) ? 1 : 0
    ];
    editar_tarefa($conexao, $tarefa);
    $tarefa_editando = null; // Limpa edição após salvar
}

// Adiciona nova tarefa
if (
    isset($_POST['cadastrar']) &&
    isset($_POST['nome']) && trim($_POST['nome']) !== '' &&
    isset($_POST['descricao']) && trim($_POST['descricao']) !== '' &&
    isset($_POST['prazo']) && trim($_POST['prazo']) !== ''
) {
    $prioridade = 1;
    if ($_POST['prioridade'] == 'media') $prioridade = 2;
    if ($_POST['prioridade'] == 'alta') $prioridade = 3;

    $tarefa = [
        'nome' => $_POST['nome'],
        'descricao' => $_POST['descricao'],
        'prazo' => traduz_data_para_banco($_POST['prazo']),
        'prioridade' => $prioridade,
        'concluida' => isset($_POST['concluida']) ? 1 : 0
    ];
    gravar_tarefas($conexao, $tarefa);
}

$lista_tarefas = buscar_tarefas($conexao);

include 'template.php';
?>