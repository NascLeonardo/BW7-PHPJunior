<?php
require_once  "Controller/VeiculoController.php";
require_once  "Model/Veiculo.php";
session_start();
$erros = "";
//Verifica se há algum usuário autenticado durante a requsição, caso não, retorna para a tela de login
if (!isset($_SESSION["UserId"])) {
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $extra = 'Login.php';
  header("Location: http://$host$uri/$extra");
  exit;
} else {
  //Verifica se a requisição post está completa
  if (isset($_POST["Nome"]) && isset($_POST["Marca"]) && isset($_POST["Placa"])) {
    //Verifica se a placa é válida em relação ao padrão solicitado pelo sistema
    if (strlen(str_replace("_", "", $_POST["Placa"])) != 7) {
      $erros = "<p class='text-danger'>Placa não confere com o padrão Mercosul</p>";
    } else {
      // Inicializa um objeto Veículo e o popula com as informações passada pelo usuário
      $veiculo = new Veiculo();
      $veiculo->setNome($_POST["Nome"]);
      $veiculo->setMarca($_POST["Marca"]);
      $veiculo->setPlaca($_POST["Placa"]);

      //Executa a função de cadastro e em caso de sucesso redireciona para a tela de index
      if (VeiculoController::CadastroVeiculo($veiculo) != false) {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'Index.php';
        header("Location: http://$host$uri/$extra");
        exit;
      } else {
        $erros = "<p class='text-danger'>Cadastro não realizado</p>";
      }
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="BW7" content="Gerenciamento de veículos" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>BW7 - Cadastro</title>
</head>

<body class="container-fluid vh-100 clearfix p-0">

  <nav class="navbar navbar-expand-sm navbar-dark bg-primary p-1">
    <div class="container-fluid">
      <a class="navbar-brand" href="/BW7Teste/Index.php">BW7</a>
      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-white navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">

          <li class="nav-item">
            <a href="/BW7Teste/Logout.php" class="nav-link text-danger">Logout</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <div class="container-fluid">

    <h4>
      Cadastre um novo veículo
    </h4>
    <div class="row">

      <form action="/BW7Teste/CadastroVeiculo.php" method="post" class=" row col-12 col-md-6 mx-auto mx-md-0">
        <div class="form-group input-group-sm col-12 col-md-6">
          <label for="inputNome">Nome:</label>
          <input required type="text" class="form-control" name="Nome" id="inputNome" aria-describedby="helpName" placeholder="Ex: Uno" value="">
          <small id="helpNome" class="form-text text-muted">Nome do veículo</small>
        </div>
        <div class="form-group input-group-sm col-12 col-md-6">
          <label for="inputMarca">Marca:</label>
          <input required type="text" class="form-control " name="Marca" id="inputMarca" aria-describedby="helpMarca" placeholder="Ex: Fiat" value="">
          <small id="helpMarca" class="form-text text-muted">Marca do veículo</small>
        </div>

        <div class="form-group input-group-sm col-12">
          <label for="inputPlaca">Placa:</label>
          <input minlength="7" maxlength="7" required type="text" class="form-control" name="Placa" id="inputPlaca" aria-describedby="helpPlaca" placeholder="Placas Mercosul" value="" onkeyup="nospaces(this)">
          <small id="helpPlaca" class="form-text text-muted">Placa do veículo.</small>
        </div>

        <?php
        echo $erros;
        ?>
        <div class="d-grid gap-2 col-4 mt-3">
          <button type="submit" class="btn btn-primary" type="button">Cadastrar</button>
        </div>

      </form>
      <script>
        $(document).ready(function() {
          $('#inputPlaca').inputmask('AAA9A99');
        });
      </script>

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>