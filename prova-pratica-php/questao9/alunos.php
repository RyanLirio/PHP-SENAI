<?php

    session_start();

    include "conexao.php";
    
    // Adiciona um novo aluno, é onde chama a função gravar
    if (isset($_POST['enviar']) &&
        isset($_POST['id']) && trim($_POST['id']) !== '' &&
        isset($_POST['nome']) && trim($_POST['nome']) !== '' &&
        isset($_POST['idade']) && trim($_POST['idade']) !== ''
    ) {
        $aluno = [
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'idade' => $_POST['idade']
        ];//cria o aluno e adiciona seus atributos

        gravar_alunos($conexao, $aluno);//chama o gravar
        header('Location: alunos.php');
        die();
    }

    $lista_alunos = buscar_alunos($conexao);//chama a lista de alunos pra exibir

    include 'template.php';

?>