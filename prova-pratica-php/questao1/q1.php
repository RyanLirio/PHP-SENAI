<?php
    session_start();

    $nome = ($_POST['nome']);
    $sobrenome = $_POST['sobrenome'];
    
    if(isset($nome)){
        echo "Olá, Meu nome é {$nome} {$sobrenome}, estou aprendendo PHP!";
    }
    //captura e exibe os dados em texto
?>