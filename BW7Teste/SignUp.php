<?php
require_once  "Controller/UsuarioController.php";
require_once  "Model/Usuario.php";
$erros = "";

//Verifica se a requisão está completa
if (isset($_POST["password_confirmation"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["name"])) {
    //Válida se as senhas conferem
    if ($_POST["password_confirmation"] == $_POST["password"]) {
        //Válida o email
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            //Inicializa um objeto usuário
            $usuario = new Usuario();
            //Popula o objeto usuário com os dados da requisição post
            $usuario->constructParcial($_POST["name"], $_POST["email"], $_POST["password"]);
            //Executa o cadastro e exibe uma mensagem relacionada ao sucesso do cadastro
            if (UsuarioController::CadastroUsuario($usuario)) {
                $erros = "<p class='text-success'>Cadastro realizado com sucesso</p>";
            } else {
                $erros = "<p class='text-danger'>Cadastro não realizado!</p>";
            }
        } else {
            $erros = "<p class='text-danger'>Email não é válido! </p>";
        }
    } else {
        $erros = "<p class='text-danger'>Senhas não confirmam!</p>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>BW7 - Cadastro</title>
</head>

<body class="container-fluid vh-100 p-0 my-auto">

    <div class="p-3 h-100">


        <div class="row d-flex h-100 justify-content-center align-content-center">

            <form action="/BW7Teste/SignUp.php" method="post" class=" row col-12 col-md-8 mx-md-0 ">

                <h3 class="text-start">Cadastro</h3>
                <div class="form-group input-group-sm col-12">
                    <label for="inputName">Name:</label>
                    <input type="text" class="form-control  border-1 border-primary" name="name" id="inputName" aria-describedby="helpName" placeholder="Ex: Jon Doe" value="">
                    <small id="helpNamename" class="form-text text-muted">Seu nome</small>
                    
                </div>

                <div class="form-group input-group-sm col-12">
                    <label for="inputEmail">Email:</label>
                    <input type="email" class="form-control border-1 border-primary " name="email" id="inputEmail" aria-describedby="helpEmail" placeholder="Ex: email@email.com" value="">
                    <small id="helpEmail" class="form-text text-muted">Seu email</small>
                    

                </div>

                <div class="form-group input-group-sm col-12 col-md-6">
                    <label for="inputPassword">Senha:</label>
                    <input type="password" class="form-control border-1 border-primary" name="password" id="inputPassword" aria-describedby="helpPassword" value="">
                    <small id="helpPassword" class="form-text text-muted">Sua senha</small>
                    

                </div>

                <div class="form-group input-group-sm col-12 col-md-6">
                    <label for="inputPasswordConfirmation">Confirmação de senha:</label>
                    <input type="password" class="form-control border-1 border-primary " name="password_confirmation" id="inputPasswordConfirmation" aria-describedby="helpPasswordConfirmation" value="">
                    <small id="helpPasswordConfirmation" class="form-text text-muted">Confirme sua senha</small>
                    
                </div>
                <?php
                echo $erros;
                ?>
                <div class="d-grid gap-2 col-12 mt-3">
                    <button type="submit" class="btn btn-primary" type="button">Registre</button>
                </div>
                <a href="/BW7Teste/Login.php">Já possui uma conta? Entre agora!</a>
            </form>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>