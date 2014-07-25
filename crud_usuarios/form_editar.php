<?php
include '../header.php';
include '../body.php';
include '../conexao.php';

$stmt = $conexao->prepare("SELECT * from usuarios order by id");
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<meta charset="UTF-8">
<div style="text-align: center"><h2>Editar Usuários Cadastrados</h2></div>

<div class="col-md-11">
    <form action="editar.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?= $_POST['id']; ?>" /> 
            <div class="form-group">
                <label for="inputLogin" class="col-sm-2 control-label">Login</label>
                <div class="col-sm-10">
                    <input type="text" name="login" value="<?= $_POST['login']; ?>" class="form-control" id="inputLogin" placeholder="Login">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10">
                    <input type="password" name="senha" value="<?= $_POST['senha']; ?>"  class="form-control" id="inputSenha" placeholder="Senha">
                </div>
            </div>

        </fieldset>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
            </div>
    </form>
</div>