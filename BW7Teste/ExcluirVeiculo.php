<?php
require_once  "Controller/VeiculoController.php";
require_once  "Model/Veiculo.php";
session_start();
//Verifica se há algum usuário autenticado durante a requsição, caso não, retorna para a tela de login
if (!isset($_SESSION["UserId"])) {
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'Login.php';
  header("Location: http://$host$uri/$extra");
  exit;
} else {
  //Caso a requisição esteja correta, com o ID do veículo no metodo get, executa a exclusão
  if (isset($_GET["IDVeiculo"])) {        
    VeiculoController::ExcluirVeiculo($_GET["IDVeiculo"]);
  }
  //Retorno para a tela de index
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'Index.php';
  header("Location: http://$host$uri/$extra");
  exit; 
}
?>