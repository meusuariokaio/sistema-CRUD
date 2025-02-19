<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $sql = "DELETE FROM usuarios WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Usuário</title>
    <link rel="stylesheet" href="estilo_suave.css">
</head>
<body>
    <div class="container">
        <h2>Confirmar Exclusão</h2>
        <div class="message message-error">
            Tem certeza que deseja excluir o usuário "<?= $usuario['nome'] ?>" e sua tarefa "<?= $usuario['titulo_tarefa'] ?>"?
        </div>
        <form method="POST" style="text-align: center;">
            <input type="hidden" name="id" value="<?= $id ?>">
            <button type="submit" class="delete-btn">Confirmar Exclusão</button>
            <a href="index.php"><button type="button">Cancelar</button></a>
        </form>
    </div>
</body>
</html>
