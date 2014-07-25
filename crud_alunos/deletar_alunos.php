<?php

include '../conexao.php';
$id = $_GET['id'];

$stmt = $conexao->prepare("DELETE FROM alunos WHERE id = :id");
$stmt->bindParam(':id', trim($_GET['id']), PDO::PARAM_INT);
$stmt->execute();


header("location: /alunos.php");
