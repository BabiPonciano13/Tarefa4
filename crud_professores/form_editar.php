<?php
include '../header.php';
include '../body.php';
include '../conexao.php';
include '../somente_admin.php';


$stmt = $conexao->prepare("select * from professores where id = :id");
$stmt->bindParam(':id', trim($_GET['id']), PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_OBJ);
?>

<meta charset="UTF-8">
<div style="text-align: center"><h2>Editar Professores Cadastrados</h2></div>

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
                <label for="inputturno" class="col-sm-2 control-label">Turno</label>
                <div class="col-sm-10">
                    <input type="text" name="turno" value="<?= $dados->turno; ?>"  class="form-control" id="inputturno" placeholder="Turno">
                </div>
            </div>

        </fieldset>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
            </div>
    </form>
</div>