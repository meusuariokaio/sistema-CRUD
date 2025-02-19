<?php
$host = "localhost";
$user = "root"; // Usuário do MySQL
$pass = ""; // Senha do MySQL (deixe vazio se estiver usando XAMPP)
$dbname = "crud_php";

$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
