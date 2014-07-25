<?php 
session_start();

if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    
    session_destroy();
    unset($_SESSION['email']); 
    unset($_SESSION['senha']);
    
    header('location: verifica_login.php');
}

    