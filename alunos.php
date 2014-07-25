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
                <th>Editar</th>
                <th>Excluir</th>

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
                            <td>
                                <form method="POST" action="crud_alunos/form_editar.php">
                                    <input type="hidden" name="id" value="<?= $row->id; ?>" />
                                    <input type="hidden" name="nome" value="<?= $row->nome; ?>" />
                                    <input type="hidden" name="cpf" value="<?= $row->cpf; ?>" />
                                    <input type="hidden" name="estado" value="<?= $row->estado; ?>" />
                                    <input type="hidden" name="numero" value="<?= $row->numero; ?>" />
                                    <input type="hidden" name="professores" value="<?= $row->prof_id; ?>" />
                                    <input type="submit" value="Editar" class="btn btn-info" />
                                </form>
                            </td>
                    <td><a href="crud_alunos/deletar_alunos.php?id=<?= $row->id; ?>" class="btn btn-danger">Excluir</a></td>
                </tr>
<?php endforeach; ?>
        </tbody>
   </table>
    <a href="crud_alunos/form_alunos.php" class="btn btn-success">Inserir</a>
   
        
        <?php
    include "footer.php"; ?>
    </div>