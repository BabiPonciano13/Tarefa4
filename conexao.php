<?php

$servidor = 'localhost';
$usuario = 'curso_alpha';
$postgressenha = 'cursoalpha';
$dbname = 'curso_alpha';

$conexao = new PDO("pgsql:dbname=$dbname; host=$servidor", "$usuario", "$postgressenha")
        or die("Não foi possivel se conectar");
