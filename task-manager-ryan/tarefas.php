<?php
session_start();

// Primeiro processa exclusão
if(isset($_GET['delete'])){
    $deleteIndex = $_GET['delete'];
    if(isset($_SESSION['task_list'][$deleteIndex])){
        unset($_SESSION['task_list'][$deleteIndex]);
        $_SESSION['task_list'] = array_values($_SESSION['task_list']);
    }
}

// Só adiciona se o campo não estiver vazio
if (
    isset($_GET['name']) && trim($_GET['name']) !== '' &&
    isset($_GET['description']) && trim($_GET['description']) !== '' &&
    isset($_GET['hour']) && trim($_GET['hour']) !== ''
) {
    $task = [
        'name' => $_GET['name'],
        'description' => $_GET['description'],
        'hour' => $_GET['hour'],
        'concluida' => $_GET['concluida']
    ];
    $_SESSION['task_list'][] = $task;
}

if (array_key_exists('task_list', $_SESSION)) {
    $task_list = $_SESSION['task_list'];
} else {
    $task_list = [];
}

// Inclui o template visual
include 'template.php';

