<?php
    session_start();

    $nome = ($_POST['nome']);
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    //vai pegar nome, idade e altura
    if(isset($nome)){
        echo "Meu nome é {$nome}, tenho {$idade} anos e {$altura} de altura.";
    }
    //exibe os dados capturados em forma de texto
?>