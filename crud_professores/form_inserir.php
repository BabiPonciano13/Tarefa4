<?php

include '../conexao.php';

$nome = $_POST['nome'];
$turno = $_POST['turno'];



$stmt = $conexao->prepare("INSERT INTO professores( nome, turno) VALUES (:nome, :turno)");
$stmt->bindParam(':nome', strtoupper(trim($_POST['nome'])), PDO::PARAM_INT);
$stmt->bindParam(':turno', strtoupper(trim($_POST['turno'])), PDO::PARAM_STR);
$stmt->execute();




header("location: /professores.php");


