<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $titulo_tarefa = $_POST['titulo_tarefa'];
    $descricao = $_POST['descricao'];
    $data_vencimento = $_POST['data_vencimento'];
    $status_tarefa = $_POST['status_tarefa'];

    $sql = "UPDATE usuarios SET 
            nome='$nome', 
            email='$email', 
            telefone='$telefone',
            titulo_tarefa='$titulo_tarefa',
            descricao='$descricao',
            data_vencimento='$data_vencimento',
            status_tarefa='$status_tarefa' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="estilo_suave.css">
</head>
<body>
    <div class="container">
        <h2>Editar Usuário</h2>
        <form method="POST">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
            </div>

            <div class="form-group">
                <label>Telefone:</label>
                <input type="text" name="telefone" value="<?= $usuario['telefone'] ?>" required>
            </div>

            <div class="form-group">
                <label>Título da Tarefa:</label>
                <input type="text" name="titulo_tarefa" value="<?= $usuario['titulo_tarefa'] ?>" required>
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="descricao"><?= $usuario['descricao'] ?></textarea>
            </div>

            <div class="form-group">
                <label>Data de Vencimento:</label>
                <input type="date" name="data_vencimento" value="<?= $usuario['data_vencimento'] ?>" required>
            </div>

            <div class="form-group">
                <label>Status da Tarefa:</label>
                <select name="status_tarefa" required>
                    <option value="pendente" <?= $usuario['status_tarefa'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
                    <option value="em_andamento" <?= $usuario['status_tarefa'] == 'em_andamento' ? 'selected' : '' ?>>Em Andamento</option>
                    <option value="concluida" <?= $usuario['status_tarefa'] == 'concluida' ? 'selected' : '' ?>>Concluída</option>
                </select>
            </div>

            <button type="submit">Atualizar</button>
            <a href="index.php"><button type="button" id="segundo">Voltar</button></a>
        </form>
    </div>
</body>
</html>
