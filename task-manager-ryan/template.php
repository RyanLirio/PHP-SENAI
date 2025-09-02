<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="tarefas.css">
</head>
<body>
    <h1>Task Manager</h1>
    <form method="post">
        <fieldset>
            <legend><?php echo isset($tarefa_editando) && $tarefa_editando ? 'Editar Tarefa' : 'Nova Tarefa'; ?></legend>
            <?php if (isset($tarefa_editando) && $tarefa_editando): ?>
                <input type="hidden" name="id" value="<?php echo $tarefa_editando['id']; ?>">
            <?php endif; ?>
            <label>
                Tarefa:
                <input type="text" name="nome" value="<?php echo isset($tarefa_editando) && $tarefa_editando ? htmlspecialchars($tarefa_editando['nome']) : ''; ?>">
            </label>
            <label>
                Horario:
                <input type="date" name="prazo" value="<?php echo isset($tarefa_editando) && $tarefa_editando ? $tarefa_editando['prazo'] : ''; ?>">
            </label>
            <label>
                Descrição:
                <input type="text" name="descricao" value="<?php echo isset($tarefa_editando) && $tarefa_editando ? htmlspecialchars($tarefa_editando['descricao']) : ''; ?>">
            </label>
            <label>
                Prioridade:
                <select name="prioridade">
                    <option value="baixa" <?php echo (isset($tarefa_editando) && $tarefa_editando['prioridade']==1) ? 'selected' : ''; ?>>Baixa</option>
                    <option value="media" <?php echo (isset($tarefa_editando) && $tarefa_editando['prioridade']==2) ? 'selected' : ''; ?>>Média</option>
                    <option value="alta" <?php echo (isset($tarefa_editando) && $tarefa_editando['prioridade']==3) ? 'selected' : ''; ?>>Alta</option>
                </select>
            </label>
            <label>
                Concluida:
                <input type="checkbox" name="concluida" value="1" <?php echo (isset($tarefa_editando) && $tarefa_editando['concluida']==1) ? 'checked' : ''; ?>>
            </label>
            <input type="submit" name="<?php echo isset($tarefa_editando) && $tarefa_editando ? 'salvar_edicao' : 'cadastrar'; ?>" value="<?php echo isset($tarefa_editando) && $tarefa_editando ? 'Salvar edição' : 'Cadastrar'; ?>">
        </fieldset>
    </form>

    <table>
        <thead>
            <tr>
                <th>Tarefa</th>
                <th>Descrição</th>
                <th>Horário</th>
                <th>Prioridade</th>
                <th>Concluida</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php if(isset($lista_tarefas)): ?>
            <?php foreach($lista_tarefas as $tarefa): ?>
                <tr>
                    <td><?php echo htmlspecialchars($tarefa['nome']); ?></td>
                    <td><?php echo htmlspecialchars($tarefa['descricao']); ?></td>
                    <td><?php echo traduz_data_para_exibir($tarefa['prazo']); ?></td>
                    <td><?php echo traduz_prioridade($tarefa['prioridade']); ?></td>
                    <td><?php echo traduz_concluida($tarefa['concluida']); ?></td>
                    <td>
                        <form method="post" class="form-botoes">
                            <input type="hidden" name="edit" value="<?php echo $tarefa['id']; ?>">
                            <input type="submit" value="Editar">
                        </form>
                        <form method="post" class="form-botoes">
                            <input type="hidden" name="delete" value="<?php echo $tarefa['id']; ?>">
                            <input type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

