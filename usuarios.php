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
                <?php if ($_SESSION['admin'] and $_SESSION['admin_2'] == 'true'): ?>
                    <th>Senha</th>
                    <th>Níveis de Permissão</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $key => $row) : ?>

                <tr>
                    <td><?= $row->id; ?></td>
                    <td><?= $row->login; ?></td>
                    <?php if ($_SESSION['admin'] and $_SESSION['admin_2'] == 'true'): ?>
                        <td><?= $row->senha; ?></td>
                        <!--<td><?= $row->nivel_de_permissao; ?></td>-->
                        <td><?php if ($row->admin_2 == TRUE) {
                                echo 'Administrador';
                            } else if ($row-> admin == TRUE AND $row-> admin_2 == FALSE) {
                                echo 'Usuário';
                            } else if ($row->admin == FALSE) {
                                echo 'Visitante';
                            }; ?></td>
                        <td><a href="crud_usuarios/form_editar.php?id=<?= $row->id; ?>" class="btn btn-info">Editar</a></td>

                        <td><a href="crud_usuarios/deletar_usuarios.php?id=<?= $row->id; ?>" class="btn btn-danger">Excluir</a></td>
                <?php endif; ?>
                </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
    <?php if ($_SESSION['admin'] == 'true'): ?>
        <a href="crud_usuarios/form_usuarios.php" class="btn btn-success">Inserir</a>
    <?php endif; ?>

<?php include "footer.php"; ?>
</div>
