<?php

include '../conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel_de_permissao'];

$true = true;
$false = false;



$stmt = $conexao->prepare("INSERT INTO usuarios( login, senha, admin, admin_2) VALUES (:login, md5(:senha), :admin, :admin_2 )");
$stmt->bindParam(':login', strtoupper(trim($login)), PDO::PARAM_STR);
$stmt->bindParam(':senha', strtoupper(trim($senha)), PDO::PARAM_STR);
if ($nivel == 'admin') {
    $stmt->bindParam(':admin', $true, PDO::PARAM_BOOL);
    $stmt->bindParam(':admin_2', $true, PDO::PARAM_BOOL);
} else if ($nivel == 'user') {
    $stmt->bindParam(':admin', $true, PDO::PARAM_BOOL);
    $stmt->bindParam(':admin_2', $false, PDO::PARAM_BOOL);
} else if ($nivel == 'guest') {
    $stmt->bindParam(':admin', $false, PDO::PARAM_BOOL);
    $stmt->bindParam(':admin_2', $false, PDO::PARAM_BOOL);
}

$stmt->execute();




header("location: /usuarios.php");
