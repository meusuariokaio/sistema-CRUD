<?php
include 'config.php';

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="estilo_suave.css">
</head>
<body>
    <div class="container">
        <h2>Usuários</h2>
        <a href="create.php" class="add-btn">Adicionar Usuário</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Título da Tarefa</th>
                <th>Descrição</th>
                <th>Data Vencimento</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['telefone'] ?></td>
                    <td><?= $row['titulo_tarefa'] ?></td>
                    <td><?= htmlspecialchars($row['descricao']) ?></td>
                    <td><?= date('d/m/Y', strtotime($row['data_vencimento'])) ?></td>
                    <td>
                        <?php
                        $status_classe = '';
                        $status_texto = '';
                        switch($row['status_tarefa']) {
                            case 'pendente':
                                $status_classe = 'status-pendente';
                                $status_texto = 'Pendente';
                                break;
                            case 'em_andamento':
                                $status_classe = 'status-andamento';
                                $status_texto = 'Em Andamento';
                                break;
                            case 'concluida':
                                $status_classe = 'status-concluida';
                                $status_texto = 'Concluída';
                                break;
                        }
                        ?>
                        <span class="status <?= $status_classe ?>"><?= $status_texto ?></span>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="edit-btn">Editar</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="delete-btn">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
