<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVA PHP</title>
</head>
<body>

    <form method="post">
        <label>
            ID do aluno: <input type="number" value="<?php isset($produto_editando) && $produto_editando ? $produto_editando['id'] : ''; ?>" name="id" required>
        </label>
        <label>
            Nome do aluno: <input type="text" value=""<?php isset($produto_editando) && $produto_editando ? htmlspecialchars($produto_editando['nome']) : ''; ?>" name="nome" required>
        </label>
        <label>
            Idade do aluno: <input type="number" value="<?php isset($produto_editando) && $produto_editando ? $produto_editando['idade'] : ''; ?>" name="idade" required>
        </label>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>IDADE</th>
            </tr>
        </thead>
        <?php foreach($lista_alunos as $aluno) : ?>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($aluno['id']) ?></td>
                    <td><?php echo htmlspecialchars($aluno['nome']) ?></td>
                    <td><?php echo htmlspecialchars($aluno['idade']) ?></td>
                </tr>
            </tbody>

        <?php endforeach; ?>
    </table>

</body>
</html>