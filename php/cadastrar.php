<?php
include("conexao.php");

$email = $_POST['email'];
$confirmar_email = $_POST['confirmar_email'];
$tipo_perfil = $_POST['tipo_perfil'];
$data_nascimento = $_POST['data_nascimento'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];

if ($email != $confirmar_email) {
    header("Location: cadastro.php?erro=email");
    exit();
}

if ($senha != $confirmar_senha) {
    header("Location: cadastro.php?erro=senha");
    exit();
}

if ($tipo_perfil == 'administrador') {
    $tipo_perfil = 'comum';
}

$sql = "INSERT INTO usuarios (email, tipo_perfil, data_nascimento, senha) 
        VALUES ('$email', '$tipo_perfil', '$data_nascimento', '$senha')";

if (mysqli_query($conexao, $sql)) {
    header("Location: login.php?sucesso=cadastrado");
    exit();
} else {
    
    header("Location: cadastro.php?erro=banco");
    exit();
}
?>