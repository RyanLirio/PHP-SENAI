<?php
    $nome = ($_POST['nome']);
    $idade = $_POST['idade'];
    if(isset($nome)){
        echo "Olá, {$nome}, você tem {$idade} anos";
    }
    
?>