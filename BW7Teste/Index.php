<?php
require_once  "Controller/VeiculoController.php";
require_once  "Model/Veiculo.php";
session_start();
//Caso o usuário não esteja autenticado, retorna para a tela de login
if (!isset($_SESSION["UserId"])) {
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'Login.php';
  header("Location: http://$host$uri/$extra");
  exit;
} else {
  //array de objeto com todos os veículos cadastrado pelo usuário autenticado
  $veiculos = VeiculoController::GetAllVeiculos();
  $disponiveis = array();
  $alugados = array();
  //repopula o array de veículo, filtrando pelas propriedades nome, placa e marca, levando em consideração a string pesquisada
  if(isset($_GET['Pesquisa'])){

    $veiculos =  array_filter($veiculos, function($veiculo) {
      return (str_contains($veiculo->getNome(), $_GET['Pesquisa']) || str_contains($veiculo->getPlaca(), $_GET['Pesquisa']) || str_contains($veiculo->getMarca(), $_GET['Pesquisa'])) ;
    });
  }
  //popula os arrays disponiveis e alugados
  foreach ($veiculos as $veiculo){
    if($veiculo->getDisponivel() == 1){
      array_push($disponiveis,$veiculo);
    }else{
      array_push($alugados,$veiculo);
    }
  }
  
  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="BW7" content="Gerenciamento de veículos" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>BW7 - Index</title>
</head>

<body class="container-fluid vh-100 clearfix p-0">

  <nav class="navbar navbar-expand-sm navbar-dark bg-primary p-1">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">BW7</a>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-white navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">



          <li class="nav-item">
            <a class="nav-link" href="/BW7Teste/CadastroVeiculo.php">Cadastrar Veiculo</a>
          </li>

          <li class="nav-item">
            <a href="/BW7Teste/Logout.php" class="nav-link text-danger">Logout</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <div class="container-fluid">

    <h4>
      Lista de Veículos
    </h4>

    <div class="form-group">
      <label class="form-label">Pesquisar</label>
      <div class="form-group">
        <form action="/BW7Teste/Index.php" method="get">
          <div class="input-group mb-3">
            <input type="text" name="Pesquisa" class="form-control" placeholder="Nome,Marca,Placa" aria-label="Pesquisa" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="submit" id="button-addon2">Pesquisar</button>
          </div>
        </form>
      </div>
    </div>


    <ul class="nav nav-tabs ">
      <li class="nav-item mx-auto">
        <a class="nav-link" data-bs-toggle="tab" href="#Todos">Todos</a>
      </li>
      <li class="nav-item mx-auto">
        <a class="nav-link" data-bs-toggle="tab" href="#Alugado">Alugado</a>
      </li>
      <li class="nav-item mx-auto">
        <a class="nav-link" data-bs-toggle="tab" href="#Disponivel">Disponível</a>
      </li>


    </ul>
    <div id="myTabContent" class="tab-content ">
      <div class="tab-pane fade active show " id="Todos">
        <div class='row justify-content-between'>
          <?php
          foreach ($veiculos as $veiculo) {
            $estado = "";
            if ($veiculo->getDisponivel() == 1) {
              $estado = "Disponível";
            } else {
              $estado = "Alugado";
            }

            echo ("<div class='col-12 col-sm-6 p-1'>
            <div class='card'>
            <div class='card-body'>
            <h4 class='card-title'>{$estado}</h4>
            <h6 class='card-subtitle mb-2 text-muted'>{$veiculo->getMarca()} - {$veiculo->getNome()} | Placa: {$veiculo->getPlaca()}</h6>
            <a href='/BW7Teste/EditarVeiculo.php?IDVeiculo={$veiculo->getId()}'    ' class='card-link'>Editar</a>
            <a href='/BW7Teste/ExcluirVeiculo.php?IDVeiculo={$veiculo->getId()}'' class='card-link'>Excluir</a>
            <a href='/BW7Teste/AlterarDisponibilidadeVeiculo.php?IDVeiculo={$veiculo->getId()}' class='card-link'>Alterar disponibilidade</a>
            </div>
            </div>
            </div>");
          }
          ?>
        </div>
      </div>

      <div class="tab-pane fade" id="Alugado">
        <div class='row justify-content-between'>
          <?php
          foreach ($alugados as $veiculo) {
            echo ("<div class='col-12 col-sm-6 p-1'>
            <div class='card'>
            <div class='card-body'>
            <h4 class='card-title'>Alugado</h4>
            <h6 class='card-subtitle mb-2 text-muted'>{$veiculo->getMarca()} - {$veiculo->getNome()} | Placa: {$veiculo->getPlaca()}</h6>
            <a href='/BW7Teste/EditarVeiculo.php?IDVeiculo={$veiculo->getId()}'    ' class='card-link'>Editar</a>
            <a href='/BW7Teste/ExcluirVeiculo.php?IDVeiculo={$veiculo->getId()}'' class='card-link'>Excluir</a>
            <a href='/BW7Teste/AlterarDisponibilidadeVeiculo.php?IDVeiculo={$veiculo->getId()}' class='card-link'>Alterar disponibilidade</a>
            </div>
            </div>
            </div>");
          }
          ?>
        </div>
      </div>

      <div class="tab-pane fade " id="Disponivel">
        <div class='row justify-content-between'>
          <?php
          foreach ($disponiveis as $veiculo) {

            echo ("<div class='col-12 col-sm-6 p-1'>
            <div class='card'>
            <div class='card-body'>
            <h4 class='card-title'>Disponível</h4>
            <h6 class='card-subtitle mb-2 text-muted'>{$veiculo->getMarca()} - {$veiculo->getNome()} | Placa: {$veiculo->getPlaca()}</h6>
            <a href='/BW7Teste/EditarVeiculo.php?IDVeiculo={$veiculo->getId()}'    ' class='card-link'>Editar</a>
            <a href='/BW7Teste/ExcluirVeiculo.php?IDVeiculo={$veiculo->getId()}'' class='card-link'>Excluir</a>
            <a href='/BW7Teste/AlterarDisponibilidadeVeiculo.php?IDVeiculo={$veiculo->getId()}' class='card-link'>Alterar disponibilidade</a>
            </div>
            </div>
            </div>");
          }
          ?>
        </div>
      </div>

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>