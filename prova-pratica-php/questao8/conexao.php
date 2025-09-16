<?php

$BdServidor = '127.0.0.1';
$BdUsuario = 'ryan_lirio';
$BdSenha = '123';
$BdBanco = 'prova_php';
//configuração do banco


$conexao = mysqli_connect($BdServidor, $BdUsuario, $BdSenha, $BdBanco);//conecta no banco

if (mysqli_connect_errno()) {//verificar se a conexão funcionou
    echo "Problemas para conectar no banco. Erro: ";
    echo mysqli_connect_error();
    die();
}
else{
    echo "Conexão realizada com sucesso";//exibe que deu boa
}

?>