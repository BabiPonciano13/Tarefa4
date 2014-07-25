<?php
include '../conexao.php';
//var_dump($_POST);
$stmt = $conexao->prepare("UPDATE professores SET nome = :nome, turno = :turno WHERE id = :id");
$stmt->bindParam(':id', trim($_POST['id']), PDO::PARAM_INT);
$stmt->bindParam(':nome', strtoupper(trim($_POST['nome'])), PDO::PARAM_STR);
$stmt->bindParam(':turno', strtoupper(trim($_POST['turno'])), PDO::PARAM_STR);
$stmt->execute();

header("location: /professores.php");
