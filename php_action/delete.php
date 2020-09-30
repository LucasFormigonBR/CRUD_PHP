<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['deletar']))
{
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM usuario WHERE id = '$id'";

    if(mysqli_query($connect, $sql))
    {
        header('Location: ../menu.php?sucesso');
    } else
    {
        header('Location: ../menu.php?falhou');
    }
}

?>