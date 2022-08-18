<?php
require_once  "Controller/UsuarioController.php";
require_once  "Model/Usuario.php";
$erros = "";


if (isset($_POST["password"]) && isset($_POST["email"])) {
    //popula um objeto Usuario com as informações passadas pela requisição post.
    $usuario = new Usuario();
    $usuario->setSenha($_POST["password"]);
    $usuario->setEmail($_POST["email"]);
    //Redirecionamento para a tela index caso a método de login não retorne falso
    if (UsuarioController::LoginUsuario($usuario) != false) {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'Index.php';
        header("Location: http://$host$uri/$extra");
        exit;
    } else {
        $erros = "<p class='text-danger'>Login não realizado!</p>";
    }
}
//caso um dos campos não tenha sido passado porém outro sim
if(isset($_POST["password"]) != isset($_POST["email"])){
    $erros = "<p class='text-danger'>Preencha todos os campos!</p>";
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
    <title>BW7 - Login</title>
</head>

<body class="container-fluid vh-100 p-0 my-auto">

    <div class="p-3 h-100">


        <div class="row d-flex h-100 justify-content-center align-content-center">

            <form action="/BW7Teste/Login.php" method="post" class="row col-12 col-md-8 mx-md-0 ">

                <h3 class="text-start">Login</h3>

                <div class="form-group input-group-sm col-12">
                    <label for="inputEmail">Email:</label>
                    <input type="email" class="form-control border-1 border-primary " name="email" id="inputEmail" aria-describedby="helpEmail" placeholder="Ex: email@email.com" value="<?php echo $_POST["email"] ?>" required>
                    <small id="helpEmail" class="form-text text-muted">Seu email.</small>

                </div>

                <div class="form-group input-group-sm col-12">
                    <label for="inputPassword">Senha:</label>
                    <input type="password" class="form-control border-1 border-primary" name="password" id="inputPassword" aria-describedby="helpPassword" value="<?php echo $_POST["password"] ?>" required>
                    <small id="helpPassword" class="form-text text-muted">Sua senha</small>


                </div>
                <?php
                echo $erros;
                ?>
                <div class="d-grid gap-2 col-12 mt-3">
                    <button type="submit" class="btn btn-primary" type="button">Entrar</button>
                </div>
                <a href="/BW7Teste/SignUp.php">Não Possui uma conta? Cadastre-se agora!</a>
            </form>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>