<?php

$serverName = "localhost";
$username = "root";
$password = "";
$db = "crud";

$connect = mysqli_connect($serverName, $username, $password, $db);
mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error())
{
    echo "Erro ao conectar o banco de dados: ". mysqli_connect_error();
    exit;
}

?>