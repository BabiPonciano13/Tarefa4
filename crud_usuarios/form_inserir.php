<?php

include '../conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];
$admin = $_POST['admin'];
$admin2 = $_POST['admin2'];

if (!$admin) {
    $admin = false;
}
if (!$admin2) {
    $admin2 = false;
}

$stmt = $conexao->prepare("INSERT INTO usuarios( login, senha, admin, admin_2) VALUES (:login, md5(:senha), :admin, :admin_2 )");
$stmt->bindParam(':login', strtoupper(trim($login)), PDO::PARAM_STR);
$stmt->bindParam(':senha', strtoupper(trim($senha)), PDO::PARAM_STR);
$stmt->bindParam(':admin', $admin, PDO::PARAM_BOOL);
$stmt->bindParam(':admin_2', $admin2, PDO::PARAM_BOOL);

$stmt->execute();




header("location: /usuarios.php");
