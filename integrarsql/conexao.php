<?php

$con = mysqli_connect("localhost", "root", "", "meubanco");
if (!$con) { die("Erro: " . mysqli_connect_error()); }

?>

<form method="post" action="insert.php">
Nome: <input type="text" name="nome">
<input type="submit" value="Cadastrar">
</form>

