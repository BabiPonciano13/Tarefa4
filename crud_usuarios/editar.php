<?php
include '../conexao.php';

//$id = $_POST['id'];
//$login = $_POST['login'];
//$senha = $_POST['senha'];

$stmt = $conexao->prepare("UPDATE usuarios SET login = :login, senha = md5(:senha) WHERE id = :id");
$stmt->bindParam(':id', trim($_POST['id']), PDO::PARAM_INT);
$stmt->bindParam(':login', strtoupper(trim($_POST['login'])), PDO::PARAM_STR);
$stmt->bindParam(':senha', strtoupper(trim($_POST['senha'])), PDO::PARAM_STR);
$stmt->execute();

header("location: /usuarios.php");
