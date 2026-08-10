<?php

session_start();
include("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $sql);


if (mysqli_num_rows($resultado) == 1) {
    
    
    $dados_usuario = mysqli_fetch_assoc($resultado);
    
    
    $_SESSION['usuario'] = $dados_usuario['email'];
    $_SESSION['perfil'] = $dados_usuario['tipo_perfil'];
    
    header("Location: mensagens.php");
    exit();
} else {
    header("Location: login.php?erro=dados_invalidos");
    exit();
}
?>