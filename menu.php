<?php

include_once 'php_action/db_connect.php';
include_once 'includes/header.php';
include_once 'includes/message.php';

?>

<div class="body col-sm-12">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Senha</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM usuario";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($dados = mysqli_fetch_array($result)) {
            ?>
                    <tr>
                        <td><?php echo $dados['nome'] ?></td>
                        <td><?php echo $dados['email'] ?></td>
                        <td><?php echo $dados['senha'] ?></td>

                        <td id="editar"><a href="editar.php?id=<?php echo $dados['id'] ?>" class="btn btn-warning" name="btn-editar"><i class="icon-edit">Editar</i></a></td>
                        <td id="deletar"><a href="#modal" class="btn btn-danger" data-toggle="modal" data-target="#modalV<?php echo $dados['id'] ?>" name="btn-deletar"><i class="icon-delete">Deletar</i></a></td>

                        <div class="modal fade" id="modalV<?php echo $dados['id'] ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ops!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Deseja mesmo excluir esse usuário?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                        <form action="php_action/delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $dados['id'] ?>">
                                            <button type="submit" name="deletar">Sim</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                    </tr>
                <?php } ?>
        </tbody>
    </table>

<?php
            } else { ?>

    <tr>
        <td> - </td>
        <td> - </td>
        <td> - </td>
    </tr>

<?php } ?>
</tbody>
</table>
<br>
<div id="btn-add col-6">
    <a class="btn btn-primary" href="cadastroMenu.php" role="button">Adicionar Usuário</a>
</div>
</div>
</div>




</div>
</div>

<?php

include_once 'includes/footer.php';
?>