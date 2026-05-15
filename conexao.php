<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "uniao_solidaria_bd";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
Something is wrong with the XAMPP installation :-(
