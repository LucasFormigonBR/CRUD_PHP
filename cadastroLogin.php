<?php

include_once 'includes/header.php';
?>

<div class="row justify-content-center col-sm-12">
    <div class="form-geral">
        <form action="php_action/create.php" method="POST">
            <div class="form-group col-sm-12">
                <h3 class="light">Novo Cadastro</h3>
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome">
            </div>
            <div class="form-group col-sm-12">
                <label for="email">Endereço de email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
            </div>
            <div class="form-group col-sm-12">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
            </div>
            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
            <a href="index.php" class="btn btn-orange">Voltar</a>
        </form>
    </div>
</div>


<?php

include_once 'includes/footer.php';
?>