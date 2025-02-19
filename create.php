<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $titulo_tarefa = $_POST['titulo_tarefa'];
    $descricao = $_POST['descricao'];
    $data_vencimento = $_POST['data_vencimento'];
    $status_tarefa = $_POST['status_tarefa'];

    $sql = "INSERT INTO usuarios (nome, email, telefone, titulo_tarefa, descricao, data_vencimento, status_tarefa) 
            VALUES ('$nome', '$email', '$telefone', '$titulo_tarefa', '$descricao', '$data_vencimento', '$status_tarefa')";
    
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
    <title>Adicionar Usuário</title>
    <link rel="stylesheet" href="estilo_suave.css">
</head>
<body>
    <div class="container">
        <h2>Adicionar Usuário</h2>
        <form method="POST">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Telefone:</label>
                <input type="text" name="telefone" required>
            </div>

            <div class="form-group">
                <label>Título da Tarefa:</label>
                <input type="text" name="titulo_tarefa" required>
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="descricao"></textarea>
            </div>

            <div class="form-group">
                <label>Data de Vencimento:</label>
                <input type="date" name="data_vencimento" required>
            </div>

            <div class="form-group">
                <label>Status da Tarefa:</label>
                <select name="status_tarefa" required>
                    <option value="pendente">Pendente</option>
                    <option value="em_andamento">Em Andamento</option>
                    <option value="concluida">Concluída</option>
                </select>
            </div>

            <button type="submit">Salvar</button>
            <a href="index.php"><button type="button" class="delete-btn">Voltar</button></a>
        </form>
    </div>
</body>
</html>
