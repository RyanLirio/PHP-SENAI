<form method="post" action="adicionar.php">
 <input type="hidden" name="id" value="1">
 <input type="hidden" name="nome" value="Produto A">
 <input type="hidden" name="preco" value="29.90">
 <input type="submit" value="Adicionar ao Carrinho">
</form>

<?php
    session_start();
    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carinho'] = array();
    }

    $id = $_POST['id'];
    $_SESSION['carrinho'][$id] = array(
        'nome' => $_POST['nome'],
        'preco' => $_POST['preco'],
        'qtd' => ($_SESSION['carrinho'][$id]['qtd'] ?? 0)+1;
        
    );
?>