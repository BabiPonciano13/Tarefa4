<?php

include '../conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];




$stmt = $conexao->prepare("INSERT INTO usuarios( login, senha) VALUES (:login, md5(:senha))");
$stmt->bindParam(':login', strtoupper(trim($_POST['login'])), PDO::PARAM_INT);
$stmt->bindParam(':senha', strtoupper(trim($_POST['senha'])), PDO::PARAM_STR);
$stmt->execute();




header("location: /usuarios.php");