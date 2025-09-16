<?php

$BdServidor = '127.0.0.1';
$BdUsuario = 'ryan_lirio';
$BdSenha = '123';
$BdBanco = 'prova_php';
//configuração do banco


$conexao = mysqli_connect($BdServidor, $BdUsuario, $BdSenha, $BdBanco);

if (mysqli_connect_errno()) {//verificar se a conexão funcionou
    echo "Problemas para conectar no banco. Erro: ";
    echo mysqli_connect_error();
    die();
}

function buscar_alunos($conexao){
    $sqlBusca = 'SELECT * FROM alunos';//comando de seleção no mysql
    $resultado_busca = mysqli_query($conexao, $sqlBusca); //função pra realizar o select , passa a conexão e o comando
    
    $alunos = [];//incia o array pra guardar os alunos que tem na tabela

    while ($aluno = mysqli_fetch_assoc($resultado_busca)){
        $alunos[] = $aluno;
    }//percorre a tabela buscada e atribui os alunos ao array alunos

    return $alunos;
}//função pra buscar os alunos

function gravar_alunos($conexao, $aluno){
    // "Limpando" os dados para segurança
    // (int) força o valor a ser um número inteiro
    $id = (int) $aluno['id']; 
    // mysqli_real_escape_string protege contra SQL Injection em textos
    $nome = mysqli_real_escape_string($conexao, $aluno['nome']);
    $idade = (int) $aluno['idade'];

    $sqlGravar = "
        INSERT INTO alunos
        (id, nome, idade)
        VALUES
        (
            {$id},
            '{$nome}',
            {$idade}
        )
    ";
    mysqli_query($conexao, $sqlGravar);
}//função pra gravar os alunos


?>