<?php
session_start();
include("conexao.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?erro=restrito");
    exit();
}

$remetente = $_SESSION['usuario'];
$texto = $_POST['conteudo_mensagem'];

$sql = "INSERT INTO mensagens (remetente, texto, data_envio) 
        VALUES ('$remetente', '$texto', NOW())";

if (mysqli_query($conexao, $sql)) {
    header("Location: mensagens.php?sucesso=enviado");
    exit();
} else {
    echo "Erro ao enviar mensagem.";
}
?>