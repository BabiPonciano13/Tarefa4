<?php
include '../header.php';
include '../body.php';
include '../conexao.php';
include '../somente_admin.php';

$stmt = $conexao->prepare("SELECT * from alunos where id = :id");
$stmt->bindParam(':id', trim($_GET['id']), PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_OBJ);

$stmt = $conexao->prepare("SELECT * from professores");
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<meta charset="UTF-8">
<div style="text-align: center"><h2>Editar Alunos Cadastrados</h2></div>

<div class="col-md-11">
    <form action="editar.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?= $dados->id; ?>" /> 
            <div class="form-group">
                <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" name="nome" value="<?= $dados->nome; ?>" class="form-control" id="inputNome" placeholder="Nome">
                </div>
            </div>
            <div class="form-group">
                <label for="inputCPF" class="col-sm-2 control-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" name="cpf" value="<?= $dados->cpf; ?>"  class="form-control" id="inputCPF" placeholder="CPF">
                </div>
            </div>
            <div class="form-group">
                <label for="editar2.php" class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                    <input type="text" name="estado" value="<?= $dados->estado; ?>" class="form-control" id="inputEstado" placeholder="Estado">
                </div>
            </div>
            <div class="form-group">
                <label for="inputNumero" class="col-sm-2 control-label">Numero</label>
                <div class="col-sm-10">
                    <input type="text" name="numero" value="<?= $dados->numero; ?>" class="form-control" id="inputNumero" placeholder="Numero">
                </div>
            </div>
            <div class="form-group">
                <label for="inputprofessores" class="col-sm-2 control-label">Professores</label>
                <div class="col-sm-10">
                    <select name="professores">
                        <?php foreach ($row as $key => $row) : ?>
                            <option <?php
                            if ($row->id == $dados->prof_id) {
                                echo 'selected';
                            }
                            ?> value="<?php echo $row->id; ?>"><?= $row->nome ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
            </div>
    </form>
</div>

