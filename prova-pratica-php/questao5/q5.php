<?php

    session_start();

    $numero = ($_POST['numero']);//pega o dado
    $tabuada = [];//inicia um array
    $cont = 0;//inicia um contador

    for($i = 1; $i<=10; $i++){
        $tabuada[$i] = $numero*$i;
    }//vai fazer o calculo da tabuada de x de 1 a 10 e guardar no array
    echo "<h1>Tabuada</h1>";
    foreach ($tabuada as $t){//percorre e exibe cada indice do array
        $cont += 1;
        echo $cont . " X " . $numero . " = " . $t . "<br>";
    }
    
?>