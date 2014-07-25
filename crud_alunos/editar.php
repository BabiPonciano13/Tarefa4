<?php
include '../conexao.php';

//$id = $_POST['id'];
//$nome = $_POST['nome'];
//$cpf = $_POST['cpf'];
//$estado = $_POST['estado'];
//$numero = $_POST['numero'];


$stmt = $conexao->prepare("UPDATE alunos SET nome = :nome, cpf = :cpf, estado = :estado, numero = :numero, prof_id = :professores WHERE id = :id");
$stmt->bindParam(':id', trim($_POST['id']), PDO::PARAM_INT);
$stmt->bindParam(':nome', strtoupper(trim($_POST['nome'])), PDO::PARAM_STR);
$stmt->bindParam(':cpf', strtoupper(trim($_POST['cpf'])), PDO::PARAM_STR);
$stmt->bindParam(':estado', strtoupper(trim($_POST['estado'])), PDO::PARAM_STR);
$stmt->bindParam(':numero', strtoupper(trim($_POST['numero'])), PDO::PARAM_STR);
$stmt->bindParam(':professores', strtoupper(trim($_POST['professores'])), PDO::PARAM_STR);
$stmt->execute();


header("location: /alunos.php");
