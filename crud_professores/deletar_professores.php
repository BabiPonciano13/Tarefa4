<?php

include '../conexao.php';
$id = $_GET['id'];

$stmt = $conexao->prepare("DELETE FROM professores WHERE id = :id");
$stmt->bindParam(':id', trim($_GET['id']), PDO::PARAM_INT);
$stmt->execute();


header("location: /professores.php");
