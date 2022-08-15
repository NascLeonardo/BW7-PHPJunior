<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="BW7" content="Gerenciamento de veículos" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.0/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>BW7 - Login</title>
</head>

<body class="container-fluid vh-100 p-0 my-auto">

    <div class="p-3 h-100">


        <div class="row d-flex h-100 justify-content-center align-content-center">

        <form action="/Login.php" method="post" class=" row col-12 col-md-8 mx-md-0 ">
       
            <h3 class="text-start">Login</h3>
        
            <div class="form-group input-group-sm col-12">
                <label for="inputEmail">Email:</label>
                <input type="email" class="form-control border-1 border-primary " name="email" id="inputEmail"
                    aria-describedby="helpEmail" placeholder="Ex: email@email.com" value="">
                <small id="helpEmail" class="form-text text-muted">Seu email.</small>
                <!--

                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                -->
            </div>
        
            <div class="form-group input-group-sm col-12">
                <label for="inputPassword">Senha:</label>
                <input type="password" class="form-control border-1 border-primary" name="password"
                    id="inputPassword" aria-describedby="helpPassword" >
                <small id="helpPassword" class="form-text text-muted">Sua senha</small>
                <!--

                    <span class="invalid-feedback is-invalid" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                -->
                
            </div>
            <div class="d-grid gap-2 col-12 mt-3">
                <button type="submit" class="btn btn-primary" type="button">Entrar</button>
            </div>
            <a href="/BW7Teste/SignUp.php">Não Possui uma conta? Cadastre-se agora!</a>
        </form>

        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
<?php
?>