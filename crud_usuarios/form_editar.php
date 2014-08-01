<?php
include '../header.php';
include '../body.php';
include '../conexao.php';

include '../somente_admin.php';


$stmt = $conexao->prepare("SELECT * from usuarios where id = :id");
$stmt->bindParam(':id', trim($_GET['id']), PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_OBJ);

$stmt = $conexao->prepare("SELECT * from usuarios");
$stmt->execute();
$dados2 = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<meta charset="UTF-8">
<div style="text-align: center"><h2>Editar Usuários Cadastrados</h2></div>

<div class="col-md-11">
    <form action="editar.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?= $dados->id; ?>" /> 
            <div class="form-group">
                <label for="inputLogin" class="col-sm-2 control-label">Login</label>
                <div class="col-sm-10">
                    <input type="text" name="login" value="<?= $dados->login; ?>" class="form-control" id="inputLogin" placeholder="Login">
                </div>
            </div>
            <div class="form-group">
                <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10">
                    <input type="password" name="senha" value="<?= $dados->senha; ?>"  class="form-control" id="inputSenha" placeholder="Senha">
                </div>
             <div class="form-group">
                <label for="inputnivel_de_permissao" class="col-sm-2 control-label">Editar</label>
                <div class="col-sm-10">
                    <input type="checkbox" <?php if($dados->admin) echo "checked='checked'"  ?> name="admin" />
                </div>
                <label for="inputnivel_de_permissao" class="col-sm-2 control-label">Excluir</label>
                <div class="col-sm-10">
                    <input type="checkbox" <?php if($dados->admin_2) echo "checked='checked'"  ?> name="admin2" />
                </div>
            </div>
        </fieldset>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
            </div>
    </form>
</div>