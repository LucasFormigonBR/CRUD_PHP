<?php
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';

if(isset($_GET['id']))
{
    $id = mysqli_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM usuario WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($result);
}
?>

<div class="row justify-content-center col-sm-12">
    <div class="form-geral">
        <h3 class="light"> Editar Usuário</h3>
        <form action="php_action/update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
            <div class="form-group col-sm-12">
                <label for="nome">Nome</label>
                <input type="nome" class="form-control" id="nome" value="<?php echo $dados['nome'];?>" name="nome" placeholder="Digite seu nome">
            </div>
            <div class="form-group col-sm-12">
                <label for="email">Endereço de email</label>
                <input type="email" class="form-control" id="email" value="<?php echo $dados['email'];?>" name="email" placeholder="Digite seu email">
            </div>
            <div class="form-group col-sm-12">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" value="<?php echo $dados['senha'];?>" name="senha" placeholder="Digite sua senha">
            </div>
            <button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
            <a href="menu.php" class="btn btn-orange">Lista de Usuários</a>
        </form>
    </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>

     