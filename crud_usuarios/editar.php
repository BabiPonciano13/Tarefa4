<?php

include '../conexao.php';

$id = $_POST['id'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$admin = $_POST['admin'];
$admin2 = $_POST['admin2'];

if (!$admin) {
    $admin = false;
} else {
    $admin = true;
}
if (!$admin2) {
    $admin2 = false;
} else {
    $admin2 = true;
}

//var_dump($_POST);

$stmt = $conexao->prepare("UPDATE usuarios SET login = :login, senha = md5(:senha), admin = :lol, admin_2 = :oiu WHERE id = :id");
$stmt->bindParam(':id', trim($_POST['id']), PDO::PARAM_INT);
$stmt->bindParam(':login', strtoupper(trim($_POST['login'])), PDO::PARAM_STR);
$stmt->bindParam(':senha', strtoupper(trim($_POST['senha'])), PDO::PARAM_STR);
$stmt->bindParam(':lol', $admin, PDO::PARAM_BOOL);
$stmt->bindParam(':oiu', $admin2, PDO::PARAM_BOOL);
$stmt->execute();

header("location: /usuarios.php");