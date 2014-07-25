<?php
include 'verifica.php';
//session_start();

if (!$_SESSION['logado']) {
    header("location: index.php");
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Curso Alpha </title>
        <link rel="shortcut icon" href="sasokaEm.png" />
        <!--<link rel="shortcut icon" href="logo.png" />-->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <script src="js/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
        
    </head>
    
        
