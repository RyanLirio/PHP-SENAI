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
            <legend>New Task</legend>
            <label>
                Tarefa:
                <input type="text" name="nome">
            </label>

            <label>
                Horario:
                <input type="date" name="prazo">
            </label>

            <label>
                Descrição:
                <input type="text" name="descricao">
            </label>

            <label>
                Prioridade:
                <select name="prioridade">
                    <option value="baixa">Baixa</option>
                    <option value="media">Média</option>
                    <option value="alta">Alta</option>
                </select>
            </label>

            <label>
                Concluida:
                <input type="checkbox" name="concluida" value="1">
            </label>

            <input type="submit" value="Cadastrar">
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
                        <form method="post" style="display:inline; border:none;">
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

