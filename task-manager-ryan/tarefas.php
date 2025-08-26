<?php

session_start();

include "banco.php";
include "ajudantes.php";

// Processa exclusão
if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete'];
    excluir_tarefa($conexao, $deleteId);
}

// Só adiciona se os campos não estiverem vazios
if (
    isset($_POST['nome']) && trim($_POST['nome']) !== '' &&
    isset($_POST['descricao']) && trim($_POST['descricao']) !== '' &&
    isset($_POST['prazo']) && trim($_POST['prazo']) !== ''
) {
    $prioridade = 1; // Baixa
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