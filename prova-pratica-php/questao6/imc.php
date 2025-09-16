<?php
//IMC = Peso (kg) / (Altura (m) x Altura (m))

$peso = ($_POST['peso']);
$altura = ($_POST['altura']);//pega os dados do formulario

function imc($peso, $altura){
    return $peso / ($altura*$altura);
}//função pra calcular o imc

echo imc($peso, $altura);//chama e exibe a função

?>