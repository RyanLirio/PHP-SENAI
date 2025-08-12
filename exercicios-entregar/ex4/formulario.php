<form method="post" action="">
    nome: <input type="text" name="nome">
    Preço: <input type="number" name="preco">
    Quantidade: <input type="number" name="quantidade">
    <input type="submit" value="Gerar Tabuada">
</form>

<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';

    
    if($nome !== '' && $preco !== '' && $quantidade !== '') {
        $_SESSION['produtos'][] = array(
            'nome' => $nome,
            'preco' => $preco,
            'quantidade' => $quantidade
        );
    }
}

if (!empty($_SESSION['produtos'])) {
    echo "<table border='1'>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>";
    foreach($_SESSION['produtos'] as $valor) {
        echo "<tr>
                <td>{$valor['nome']}</td>
                <td>{$valor['preco']}</td>
                <td>{$valor['quantidade']}</td>
              </tr>";
    }
    echo "</table>";
}
?>