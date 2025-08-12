<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num1 = $_POST['num1'] ?? 0;
    $num2 = $_POST['num2'] ?? 0;
    $valor = $_POST['operacao'] ?? 0;

    switch($valor){
        case "+":
            $resultado = $num1 + $num2;
            break;
        case "-":
            $resultado = $num1 - $num2;
            break;
        case "*":
            $resultado = $num1 * $num2;
            break;
        case "/":
            $resultado = $num1 / $num2;
            break;
    }
?>
    <table>
        <tr>
            <td><?php echo $num1; ?></td>
            <td><?php echo $valor; ?></td>
            <td><?php echo $num2; ?></td>
            <td><?php echo "="; ?></td>
            <td><?php echo $resultado; ?></td>
        </tr>
    </table>
</body>
</html>