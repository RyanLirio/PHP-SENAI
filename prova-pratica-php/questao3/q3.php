<?php
    session_start();
    //pega os dados
    $numero1 = ($_POST['numero1']);
    $numero2 = $_POST['numero2'];
    $operacao = $_POST['operacao'];
    $resultado;//inicia uma variavel pra armazenar o resultado


    switch ($operacao){
        case "+":
            $resultado = $numero1+$numero2;
            break;
        case "-":
            $resultado = $numero1-$numero2;
            break;
        case "*":
            $resultado = $numero1*$numero2;
            break;
        case "/":
            $resultado = $numero1/$numero2;
            break;
        }
        //o switch vai comparar qual sinal a pessoa deseja e executar seu respectivo calculo

    if(isset($resultado)){
        echo "O resultado de {$numero1} {$operacao} {$numero2} é {$resultado}!";
    }//se resultado conter algo, vai exibir o valor dele junto a sua respectiva operação
    
?>