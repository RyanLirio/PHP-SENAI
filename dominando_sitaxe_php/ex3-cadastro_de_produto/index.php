<form method="POST" action="">
    
    Nome:   <input type="text" name="nome"><br>
    Quantidade: <input type="number" name="qtd"><br>
    Preço:      <input type="number" name="price"><br>
    
    <input type="submit" value="Calcular">
</form>

<?php

    $nome = $_POST['nome'];
    $qtd = $_POST['qtd'];
    $price = $_POST['price'];

?>


