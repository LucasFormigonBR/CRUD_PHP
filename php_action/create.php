<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['cadastrar']))
{
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    $codificada = sha1($senha);

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$codificada')";

    if(mysqli_query($connect, $sql))
    {
        header('Location: ../menu.php?sucesso');
    } else
    {
        header('Location: ../menu.php?falhou');
    }
}

?>