<?php
include 'header.php';
include 'body.php';
include 'conexao.php';

$stmt = $conexao->prepare("SELECT * from usuarios order by id");
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_OBJ);


?>

<div class="col-md-12">
    <div style="text-align: center"><h2>Usuários</h2></div>
   <table class="table table-bordered table-hover" style="background-color: #935D69;">
        <thead>
            <tr>
                <th>#</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Editar</th>
                <th>Excluir</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $key => $row) : ?>

                <tr>
                    <td><?= $row->id; ?></td>
                    <td><?= $row->login; ?></td>
                    <td><?= $row->senha; ?></td>
                            <td>
                                <form method="POST" action="crud_usuarios/form_editar.php">
                                    <input type="hidden" name="id" value="<?= $row->id; ?>" />
                                    <input type="hidden" name="login" value="<?= $row->login; ?>" />
                                    <input type="hidden" name="senha" value="<?= $row->senha; ?>" />
                                    <input type="submit" value="Editar" class="btn btn-info" />
                                </form>
                            </td>
                            <td><a href="crud_usuarios/deletar_usuarios.php?id=<?= $row->id; ?>" class="btn btn-danger">Excluir</a></td>
                </tr>
<?php endforeach; ?>
        </tbody>
   </table>
    <a href="crud_usuarios/form_usuarios.php" class="btn btn-success">Inserir</a>
   
        
        <?php
    include "footer.php"; ?>
    </div>