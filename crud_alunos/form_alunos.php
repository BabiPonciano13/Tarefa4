<?php

include '../header.php';
include '../body.php';
include '../conexao.php';
$stmt = $conexao->prepare(" select * from professores ");
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_OBJ);
?>


<meta charset="UTF-8">
<div style="text-align: center"><h2>Cadastrar Aluno</h2></div>
<div class="col-md-11">
    <form action="form_inserir.php" method="POST">
        <fieldset>

            <div class="form-group">
                <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Nome">
                </div>
            </div>
            <div class="form-group">
                <label for="inputCPF" class="col-sm-2 control-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" name="cpf"  class="form-control" id="inputCPF" placeholder="CPF">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEstado" class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                    <input type="text" name="estado" class="form-control" id="inputEstado" placeholder="Estado">
                </div>
            </div>
            <div class="form-group">
                <label for="inputNumero" class="col-sm-2 control-label">Numero</label>
                <div class="col-sm-10">
                    <input type="text" name="numero" class="form-control" id="inputNumero" placeholder="Numero">
                </div>
            </div>
            <div class="form-group">
                <label for="inputprofessores" class="col-sm-2 control-label">Professores</label>
                <div class="col-sm-10">
                    <select name="professores">
                        <?php foreach ($dados as $key => $row) : ?>
                        <option value="<?php echo $row->id;?>"><?=$row->nome; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
           

        </fieldset>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Enviar</button>
            </div>
        </div>
    </form>
</div>   







 