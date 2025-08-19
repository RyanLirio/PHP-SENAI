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
    <form>
        <fieldset>
            <legend>New Task</legend>
            <label>
                Tarefa:
                <input type="text" name="name">
            </label>

            <label>
                Horario:
                <input type="time" name="hour">
            </label>

            <label>
                Descrição:
                <input type="text" name="description">
            </label>

            <label>
                Concluida:
                <input type="radio" name="cocluida" value="sim">
                Sim
                <input type="radio" name="cocluida" value="nao">
                Não
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
                <th>Concluida</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php if(isset($task_list)): ?>
            <?php foreach($task_list as $index => $task): ?>
                <?php if(isset($task['name']) && trim($task['name']) !== ''): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task['name']); ?></td>
                    <td><?php echo htmlspecialchars($task['description']); ?></td>
                    <td><?php echo htmlspecialchars($task['hour']); ?></td>
                    <td><?php echo htmlspecialchars($task['concluida']); ?></td>
                    <td>
                        <form method="get" style="display:inline; border:none;">
                            <input type="hidden" name="delete" value="<?php echo $index; ?>">
                            <input type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

      