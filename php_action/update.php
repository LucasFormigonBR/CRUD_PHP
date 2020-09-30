<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['atualizar']))
{
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "UPDATE usuario SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = '$id'";

    if(mysqli_query($connect, $sql))
    {
        header('Location: ../menu.php?sucesso');
    } else
    {
        header('Location: ../menu.php?falha');
    }
}

?>