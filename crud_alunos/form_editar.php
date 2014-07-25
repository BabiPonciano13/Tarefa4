<?php

include '../header.php';
include '../body.php';
include '../conexao.php';

$stmt = $conexao->prepare("SELECT * from professores order by id");
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_OBJ);


?>

<meta charset="UTF-8">
<div style="text-align: center"><h2>Editar Alunos Cadastrados</h2></div>

<div class="col-md-11">
    <form action="editar.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?= $_POST['id']; ?>" /> 
            <div class="form-group">
                <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" name="nome" value="<?= $_POST['nome']; ?>" class="form-control" id="inputNome" placeholder="Nome">
                </div>
            </div>
            <div class="form-group">
                <label for="inputCPF" class="col-sm-2 control-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" name="cpf" value="<?= $_POST['cpf']; ?>"  class="form-control" id="inputCPF" placeholder="CPF">
                </div>
            </div>
            <div class="form-group">
                <label for="editar2.php" class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                    <input type="text" name="estado" value="<?= $_POST['estado']; ?>" class="form-control" id="inputEstado" placeholder="Estado">
                </div>
            </div>
            <div class="form-group">
                <label for="inputNumero" class="col-sm-2 control-label">Numero</label>
                <div class="col-sm-10">
                    <input type="text" name="numero" value="<?= $_POST['numero']; ?>" class="form-control" id="inputNumero" placeholder="Numero">
                </div>
            </div>
            <div class="form-group">
                <label for="inputprofessores" class="col-sm-2 control-label">Professores</label>
                <div class="col-sm-10">
                   <select name="professores">
                        <?php foreach ($dados as $key => $row) : ?>
                        <option <?php if ($row->id == $_POST['professores']) {echo 'selected';} ?> value="<?php echo $row->id;?>"><?=$row->nome?></option>
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

