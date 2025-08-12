<?php
    if (isset($_GET['numero'])) {
        $numero = $_GET['numero'];
        echo "<h2>Tabuada do $numero</h2>";
    for ($i = 1; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "$numero x $i = $resultado<br>";
    }
}
?>