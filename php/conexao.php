<?php
$conexao = mysqli_connect("localhost", "root", "", "central_pet");

if (!$conexao) {
    header("Location: erro_conexao.html");
    exit();
}
?>