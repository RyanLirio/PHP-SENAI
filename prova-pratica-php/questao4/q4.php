<?php
    session_start();

    $idade = $_POST['idade'];//pega a idade
    
    if(isset($idade)){
        if($idade >= 18){
            echo "Maior de idade!";
        }
        else{
            echo "Menor de idade!";
        }
    }//se existir alguma coisa em idade ele vai comparar e retornar se é de maior ou menor
    
?>