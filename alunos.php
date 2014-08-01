<?php
include 'header.php';
include 'body.php';
include 'conexao.php';

$stmt = $conexao->prepare(" select alunos.*, professores.nome as professor from alunos left join professores on alunos.prof_id = professores.id  ");
//$stmt = $conexao->prepare("select alunos.*,professores.nome as professores from professores join alunos on professores.id=alunos.professores order by id;");
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="col-md-12">
    <div style="text-align: center"><h2>Alunos</h2></div>
    <table class="table table-bordered table-hover" style="background-color: #935D69;">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Estado</th>
                <th>Numero</th>
                <th>Professores</th>
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
                    <td><?= $row->cpf; ?></td>
                    <td><?= $row->estado; ?></td>
                    <td><?= $row->numero; ?></td>
                    <td><?= $row->professor; ?></td>
                    <?php if ($_SESSION['admin'] and $_SESSION['admin_2'] == 'true'): ?>
                        <td><a href="crud_alunos/form_editar.php?id=<?= $row->id; ?>" class="btn btn-info">Editar</a></td>

                        <td><a href="crud_alunos/deletar_alunos.php?id=<?= $row->id; ?>" class="btn btn-danger">Excluir</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if ($_SESSION['admin'] or $_SESSION['admin_2'] == 'true'): ?>
        <a href="crud_alunos/form_alunos.php" class="btn btn-success">Inserir</a>
    <?php endif; ?>
    <?php include "footer.php"; ?>
</div>