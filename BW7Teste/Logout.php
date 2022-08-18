<?php
//Destroi a sessão atual e retorna para a página Index, que então deverá retornar para tela de login.

session_start();

session_unset();

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'Index.php';
header("Location: http://$host$uri/$extra");
exit;


?>