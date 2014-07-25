<?php

include '../conexao.php';

//$nome = $_POST['nome'];
//$cpf = $_POST['cpf'];
//$estado = $_POST['estado'];
//$numero = $_POST['numero'];


$stmt = $conexao->prepare("INSERT INTO alunos( nome, cpf, estado, numero, prof_id) VALUES (:nome, :cpf, :estado, :numero, :professores)");
$stmt->bindParam(':nome', trim($_POST['nome']), PDO::PARAM_INT);
$stmt->bindParam(':cpf', strtoupper(trim($_POST['cpf'])), PDO::PARAM_STR);
$stmt->bindParam(':estado', strtoupper(trim($_POST['estado'])), PDO::PARAM_STR);
$stmt->bindParam(':numero', strtoupper(trim($_POST['numero'])), PDO::PARAM_STR);
$stmt->bindParam(':professores', strtoupper(trim($_POST['professores'])), PDO::PARAM_STR);
$stmt->execute();




header("location: /alunos.php");




