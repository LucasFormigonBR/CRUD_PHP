<?php
session_start();

include_once 'php_action/db_connect.php';
include_once 'includes/header.php';

if(isset($_POST['login'])) 
{
    $error = array();
    $usuario = mysqli_escape_string($connect, $_POST['email']);
    $password = mysqli_escape_string($connect, $_POST['senha']);

    if(empty($usuario) or empty($password))
    {
        $error[] = "<li> O campo email/senha precisa ser preenchido! </li>";
    } else {
        $sql = "SELECT email FROM usuario WHERE email = '$usuario'";
        $result = mysqli_query($connect, $sql);

        echo $sql;

        if(mysqli_num_rows($result) > 0)
        {
            $cripto = sha1($senha);
            $sql = "SELECT * FROM usuario WHERE email = '$usuario' AND senha = '$password'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) == 1)
            {
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['id_usuario'] = $dados['id'];
                header('Location: menu.php');

            } else
            {
                $error[] = "<li> Usuario e senha não conferem!";
            }
        }else{
            $error[] = "<li> Conta não existe! </li>";
            }
        
    }
}
?>
 <?php
        if(!empty($error))
        {
            foreach($error as $erro)
            {
                echo $erro;
            }
        }
        ?>
<hr>
<div class="row justify-content-center col-sm-12">
    <div class="form-geral">
        <form action="" method="POST">
            <div class="form-group col-sm-12">
                <h3 class="light">Login</h3>
                <label for="nome">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu email">
            </div>
            <div class="form-group col-sm-12">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Acessar</button>
            <a class="link" href="cadastroLogin.php">Criar conta</a>
    </div>
</div>

<?php

include_once 'includes/footer.php';

/*if($result->rowCount() >= 1){
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] = $usuario;
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}

*/

//usuarios de pruebaen la base de datos
//usuario:admin pass:12345
//usuario:demo pass:demo