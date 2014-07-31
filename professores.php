<?php
include 'header.php';
include 'body.php';
include 'conexao.php';

$stmt = $conexao->prepare("SELECT * from professores order by id");
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="col-md-12">
    <div style="text-align: center"><h2>Professores</h2></div>
    '    <table class="table table-bordered table-hover" style="background-color: #935D69;">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Turno</th>
                <?php if ($_SESSION['admin'] and $_SESSION['admin_2'] == 'true'): ?>
                    <th>Editar</th>
                    <th>Excluir</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $key => $row) : ?>

                <tr>
                    <td><?= $row->id; ?></td>
                    <td><?= $row->nome; ?></td>
                    <td><?= $row->turno; ?></td>
                    <?php if ($_SESSION['admin'] and $_SESSION['admin_2'] == 'true'): ?>

                        <td><a href="crud_professores/form_editar.php?id=<?= $row->id; ?>" class="btn btn-info">Editar</a></td>

                        <td><a href="crud_professores/deletar_professores.php?id=<?= $row->id; ?>" class="btn btn-danger">Excluir</a></td>

                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if ($_SESSION['admin'] == 'true'): ?>
        <a href="crud_professores/form_professores.php" class="btn btn-success">Inserir</a>
    <?php endif; ?>
    <?php include "footer.php"; ?>
</div>