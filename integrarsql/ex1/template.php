<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <div>
        <h1>Cadastrar Produtos</h1>
        <form method="post">
            <?php if (isset($produto_editando) && $produto_editando): ?>
                <input type="hidden" name="id" value="<?php echo $produto_editando['id']; ?>">
            <?php endif; ?>
            <label>
                Nome do produto:
                <input type="text" value="<?php echo isset($produto_editando) && $produto_editando ? htmlspecialchars($produto_editando['nome']) : ''; ?>" name="nome">
            </label>
            <label>
                Preço unitário:
                <input type="number" value="<?php echo isset($produto_editando) && $produto_editando ? $produto_editando['preco'] : ''; ?>" name="preco">
            </label>
            <label>
                Quantidade:
                <input type="number" value="<?php echo isset($produto_editando) && $produto_editando ? $produto_editando['quantidade'] : ''; ?>" name="quantidade">
            </label>
            <input type="submit" name="<?php echo isset($produto_editando) && $produto_editando ? 'salvar_edicao' : 'cadastrar'; ?>" value="<?php echo isset($produto_editando) && $produto_editando ? 'Salvar edição' : 'Cadastrar';?>">
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php foreach($lista_produtos as $produto) : ?>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                    <td><?php echo htmlspecialchars($produto['preco']); ?></td>
                    <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                    <td style="display: flex;">
                        <form method="post">
                            <input type="hidden" name="excluir" value="<?php echo $produto['id']?>">
                            <input type="submit" value="excluir">
                        </form>
                        <form method="post">
                            <input type="hidden" name="editar" value="<?php echo $produto['id']?>">
                            <input type="submit" value="editar">
                        </form>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
    
</body>
</html>